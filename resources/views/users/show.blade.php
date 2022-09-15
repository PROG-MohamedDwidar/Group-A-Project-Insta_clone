{{-- @extends('layouts.app')
@section('link2', 'active') --}}
@section('title', 'View user ')



<x-app-layout>
    <x-slot name="slot">
        <div class="container d-flex justify-content-center align-items-center" >
             
            <div class="card" style="height: 100%;width:50%;">

             <div class="upper">

               
               
             </div>

             <div class="user text-center">

               <div class="profile" style="margin-left: 6%">

                 <img src="{{ Storage::disk('public')->url($user['avatar'])}}" class="rounded-circle" width="120">
                 
               </div>

             </div>


             <div class="mt-5 text-center">

               <h4 class="mb-0">{{$user['username']}}</h4>
               <span class="text-muted d-block mb-2">{{$user['bio']}}</span>
                @if($user['id']==Auth::id())
               <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">>edit</button>
                @else   
                    @if(null!==$user->followers()->find(Auth::id()))
                        <form action="{{route('users.unfollow',['id'=>$user['id']])}}" method="POST">
                            @csrf
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">>Unfollow</button>
                        </form>
                    @else
                        @if(null!==$user->following()->find(Auth::id()))
                            <form action="{{route('users.follow',['id'=>$user['id']])}}" method="POST">
                                @csrf
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">>follow back</button>
                            </form>
                        @else
                        <form action="{{route('users.follow',['id'=>$user['id']])}}" method="POST">
                            @csrf
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">>follow</button>
                        </form>
                        @endif
                    @endif
                @endif

               <div class="d-flex justify-content-between align-items-center mt-4 px-4">

                 <div class="stats">
                   <a href=""><h6 class="mb-0">Followers</h6></a>
                   <span>{{count($user->followers)}}</span>

                 </div>


                 <div class="stats">
                    <a href=""><h6 class="mb-0">Following</h6></a>
                   <span>{{count($user->following)}}</span>

                 </div>


                 <div class="stats">
                    <a href=""><h6 class="mb-0">Posts</h6></a>
                   @php($noposts=count($user->Posts))
                    <span>{{$noposts}}</span>

                 </div>
                 
               </div>
               
             </div>
              

             <div class="mt-5 text-center">
             
            </div>

            @php($posts = $user->posts)
            @php($coun=0)
            <table>
            @foreach($posts as $post)
                @if($coun%3==0)
                    @if($coun==0)
                        <tr>
                    @else
                        @if ($coun==$noposts)
                            </tr>
                        @else
                            </tr>
                            <tr>
                        @endif
                    @endif
                    
                @endif
                <td>
                    <a href="{{route('posts.show',['id'=>$post['id']])}}"><img src="{{ Storage::disk('public')->url($post->media[0]['media'])}}" width="200px" height="200px"></a>
                </td>
            @php($coun++)
            @endforeach
            </table>



            </div>

          </div>
        
    </x-slot>
</x-app-layout>
{{-- <p>User ID: {{ $user['id'] }}</p>
        <p>Name: {{ $user['username'] }}</p>
        <p>Email: {{ $user['email'] }}</p>
        <p>Email Verified At: 
            @if(!is_null($user['email_verified_at']))
            {{ $user['email_verified_at'] }}
            @else
            {{ "Not Verified" }}
            @endif

        </p>
        <p>Posts:
            <ul>

            @foreach($user->posts as $post)
            <li> 
            <a href="{{ route('posts.show',['id' => $post['id']]) }}">{{$post['body'] }}</a>
            
            
            </li>
            @endforeach
            </ul>
        </p> --}}