@section('title', 'Dashboard')

<x-app-layout>  
    
    @foreach($posts as $post)
    <div class="py-4">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 bg-white border-b border-gray-200">

    {{-- name and avatar of the post poster dw --}}
    <div>
        <a class="nametag" href="{{route('users.show',['id'=>$post->user['id']])}}">
            <img style="border-radius: 50%;display:inline;margin:10px;" src="{{ Storage::disk('public')->url($post->user['avatar'])}}" width="50px" height="50px">
            <h5 style="display: inline;">{{$post->user['username']}}</h5>
        </a>
    </div>
      <div id="carousela{{$post['id']}}" class="carousel slide" data-bs-interval="false" >
        <div class="carousel-inner">
            <?php
                $media= $post->media;
                $count=count($media);
            ?>
            {{-- one carousel phote must be active at a time so we set the first one to active then loop through the rest --}}
             
            <div class="carousel-item active">
                <img style="mx-auto width: 300px;" src="{{ Storage::disk('public')->url($media[0]['media'])}}" class="d-block w-100">
            </div>
            @for ($i =1 ; $i <$count ; $i++)
                <div class="carousel-item">
                    <img style="mx-auto width: 300px;" src="{{ Storage::disk('public')->url($media[$i]['media'])}}" class="d-block w-100">
                </div>
            @endfor
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousela{{$post['id']}}" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousela{{$post['id']}}" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
    </div>
    {{-- making the like logic --}}
    <div >
        @if(null !==$post->likes()->find(Auth::id()))
        <form style="display: inline" method="POST" action="{{route('posts.unlike',['postId'=>$post['id']])}}">
            @csrf
            <button type="submit" style="background-color: transparent;"><img src="{{asset('images\liked.png')}}" width="20px" height="20px"></button>
        </form>
        @else
        <form style="display: inline" method="POST" action="{{route('posts.like',['postId'=>$post['id']])}}">
            @csrf
            <button type="submit" style="background-color: transparent;"><img src="{{asset('images\like.png')}}" width="20px" height="20px"></button>
        </form>
        @endif
        <form style="display: inline" method="GET" action="{{route('posts.show',['id'=>$post['id']])}}">
          @csrf
          <button type="submit" style="background-color: transparent;"><img src="{{asset('images\comment.png')}}" width="20px" height="20px"></button>
      </form>
    </div>
    <ul>
      <li>
        
      </li>
  
      <li>{{ count($post->likes) }} Likes</li>

      {{-- TODO make tags clickable --}}


      {{-- @php($postbody=$post['body'])
        @foreach($post->tags as $tag){
          {{$tagrout=route('tag.show',['id'=>$tag['id']])}}
          {{$postbody=str_replace($tag['tagName'],"<a href={{route('tag.show',['id'=>$tag['id']])}}>{{$tag['tagName']}}</a>",$postbody)}}
        }
       --}}
      <li style="font-size: 20px">
        {{ Str::limit($post['body'], 300, $end='.......'); }}
        {{-- @foreach ($tagarr as $index )
            
        @endforeach --}}
      </li>
      <li style="font-size: 11px">Created at: {{ $post['created_at'] }}</li>
  
      <hr>
      <li>Comments:</li>
      @php($count=0)
      @foreach($post->comments as $comment)
        @if($count==3)
        @break
        @endif
        @php($count++)
        <li>
            <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;height:fit-content;">
                <div class="card-header" style="margin: 0px;height:fit-content;">
                    <a href="{{route('users.show',['id'=>$comment['id']])}}">
                        <img style="border-radius: 50%;display:inline;margin:10px;" 
                             src="{{ Storage::disk('public')->url($comment['avatar'])}}" width="20px" height="=20px">
                             {{$comment['username']}}
                    </a>
                </div>
                <div class="card-body" style="margin: 0px;height:fit-content;">
                <p class="card-text">{{$comment->pivot->body}}</p>
                </div>
            </div>
        </li>
      
      @endforeach
      
      <li><form method="POST" action="{{ route('posts.storeComment') }}" enctype="multipart/form-data">
        @csrf
        <div class="comment-wrapper">
          <input style="display: inline;" type="text" name='body' class="comment-box" placeholder="Comment">
          <button style="display: inline;" type="comment-btn" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded">Post</button> 
        </div>
        <input  type="hidden" value="{{ $post['id'] }}" name="postId">
        
      </form></li>  
      
    </ul>
    </div>
    </div>
    </div>
    </div>
  
    @endforeach
      
                
  </x-app-layout>
  