<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogPost;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Tag;
// use App\Models\Comment;
use App\Models\Media;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;


class   PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(){
        $user = User::find(Auth::id());
        $posts = $user->feed()->sortByDesc('created_at');
        
        


        // $user=User::first();
        // $user2=User::find(2);
        // $user->follows()->attach($user2);
        // $post=Post::first();
        // $post->comments()->attach($user,['body'=>':> it worked']);
        // dd(($post->likes)[0]);
        // foreach ($post->likes as $key) {
            
        // }

        return view('dashboard')->with([
            'posts' => $posts,
    ]);  
    }

    public function deleted(){

        $posts = Post::onlyTrashed()->paginate(10);

        return view('posts.deleted')->with(['posts' => $posts]);
    }
    public function create(){
        
        return view('posts.create');  
    }

    public function store(StoreBlogPost $request){

        $validatedData = $request->validated();
        $id = Auth::id();
        $body=$validatedData['body'];
        
        $isTag=0;
        $tag="";
        $post = Post::create([
            'body' =>$body ,
            'user_id' => $id,
        ]);
        foreach (str_split($body) as $char) {
            
            if($isTag==0){
                if($char=="#"){
                   
                    $isTag=1;
                    continue;
                }
            }
            
            if($isTag==1){
                if($char=="#" || $char==" "){
                    $extag=Tag::where('tagName','=',$tag)->get();
                    if(count($extag)==0){
                        $Tag=Tag::create(['tagName'=>$tag]);
                        $post->tags()->attach($Tag);
                    }
                    else{
                        $post->tags()->attach($extag[0]);
                    }
                    
                    
                    $tag="";
                    $isTag=0;
                }
                else{
                    $tag=$tag.$char;
                }
            }

        }
        if($tag!==""){
            $extag=Tag::where('tagName','=',$tag)->get();
                    if(count($extag)==0){
                        $Tag=Tag::create(['tagName'=>$tag]);
                        $post->tags()->attach($Tag);
                    }
                    else{
                        $post->tags()->attach($extag[0]);
                    }
                    
        }
        
        $pid=$post['id'];
         foreach ($validatedData['img'] as $img) 
        {
            $path = $img->store('postImages', 'public');

            Media::create([
                'post_id' =>$pid ,
                'media' => $path
            ]);
        }
        return redirect()->route('dashboard');
    }
    public function storeComment(Request $request){

        $postId = $request->input('postId');
        $post=Post::find($postId);
        $body = $request->input('body');



        $user =User::find(Auth::id());

        $post->comments()->attach($user,['body'=>$body]);

        return redirect()->route('dashboard');
    }

    public function like(Request $request){

        $postId = $request['postId'];
        $post = Post::find($postId);
        $user = User::find(Auth::id());
        
        $post->likes()->attach($user);

        // dd($post->likes);

        return redirect()->route('dashboard');
    }
    public function unlike(Request $request){

        $postId = $request['postId'];
        $post = Post::find($postId);
        
        
        $post->likes()->detach(Auth::id());

        // dd($post->likes);

        return redirect()->route('dashboard');
    }

    public function show($id){

        $post = Post::find($id);

        return view('posts.view')->with(['post'=> $post]);  
    }

    public function edit($id){

        $post = Post::find($id);

        if(Auth::id() != $post->user['id']){
            return redirect()->route('posts.index');
        }

        return view('posts.edit')->with(['post'=> $post]);  
    }

    public function update(StoreBlogPost $request, $id){
        
        $validatedData = $request->validated();

        Post::find($id)->update([
            'title' => $validatedData['title'],
            'body' => $validatedData['body']
        ]);

        return redirect()->route('posts.index');           
    }
    
    public function delete($id){

        $post = Post::find($id);

        if(Auth::id() != $post->user['id']){
            return redirect()->route('posts.index');
        }

        Post::where('id', $id)->delete();

        return redirect()->route('posts.index');      
    }
}
