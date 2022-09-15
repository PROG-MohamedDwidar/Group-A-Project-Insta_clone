{{-- @extends('layouts.app')
@section('link2', 'active') --}}
@section('title', 'View user ')

<x-app-layout>
    <x-slot name="slot">
        {{-- <div class="container d-flex justify-content-center align-items-center" > --}}
        <div class="container">
            <div class="profile">
        <section class="bio">
            
            <div class="profile-photo"> 
                <img src="{{ Storage::disk('public')->url($user['avatar'])}}">
            </div>
    
            
           <div>
            <h1 class="profile-user-name">{{$user['username']}}</h1>

            @if($user['id']==Auth::id())
              <a href="{{ route('users.edit',['id'=> $user['id']]) }}"> <button class="btn profile-edit-btn">>edit</button></a>
                @else   
                    @if(null!==$user->followers()->find(Auth::id()))
                        <form action="{{route('users.unfollow',['id'=>$user['id']])}}" method="POST">
                            @csrf
                            <button type="submit" class="btn profile-edit-btn">Unfollow</button>
                        </form>
                    @else
                        @if(null!==$user->following()->find(Auth::id()))
                            <form action="{{route('users.follow',['id'=>$user['id']])}}" method="POST">
                                @csrf
                                <button type="submit" class="btn profile-edit-btn">follow back</button>
                            </form>
                        @else
                        <form action="{{route('users.follow',['id'=>$user['id']])}}" method="POST">
                            @csrf
                            <button type="submit" class="btn profile-edit-btn">follow</button>
                        </form>
                        @endif
                    @endif
                @endif
            {{-- <button class="btn profile-edit-btn">Edit Profile</button>  --}}
            {{-- <button class="btn profile-settings-btn" aria-label="profile settings"><i class="fas fa-cog" aria-hidden="true"></i></button> --}}
    
    
            
    
            <div class="profile-stats">
                <ul>
                    @php($noposts=count($user->Posts))
                    {{-- <span>{{$noposts}}</span> --}}
                    <li><span class="profile-stat-count">{{$noposts}}</span> posts</li>
                    <li><a href="{{route('users.followers',['id'=>$user['id']])}}"><span class="profile-stat-count">{{count($user->followers)}}</span> followers</a></li>
                    
                    <li><a href="{{route('users.following',['id'=>$user['id']])}}"><span class="profile-stat-count">{{count($user->following)}}</span> following</a></li>
                    
                </ul>
            </div>
    
            <div class="profile-bio"> 
                <p><span class="profile-real-name">{{$user['FullName']}}</span> </p>
                <p><span class="profile-real-name"></span> {{$user['bio']}}</p>
                <p><span class="profile-real-name"></span> {{$user['email']}}</p>
           </div>
    
            </div>
        
        </section>
    
        {{-- <section class="tabs">
            <button class="tabs__btn tabs__btn--active">
              <img class='tabs__btn__icon' src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/2053557/grid-icon.png" alt="grid icon">
            </button>
            <button class="tabs__btn">
              <img class='tabs__btn__icon' src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/2053557/igtv-icon.png" alt="igtv icon">
            </button>
            <button class="tabs__btn">
              <img class='tabs__btn__icon' src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/2053557/tagged-icon.png" alt="tagged icon">
            </button>
          </section> --}}
        
        <section class="gallery">
            @foreach($user->posts as $post)
                <div class="gallery-item" tabindex="0">
                <a href="{{route('posts.show',['id'=>$post['id']])}}">
                    <img src="{{ Storage::disk('public')->url($post->media[0]['media'])}}" class="gallery-image" alt="">
                
                    <div class="gallery-item-info">
        
                        <ul>
                            <li class="gallery-item-likes"><span class="visually-hidden">Likes:</span><span style="color:white"><i class="fas fa-heart" aria-hidden="true"></i> {{count($post->likes)}}</li></span>
                            <li class="gallery-item-comments"><span class="visually-hidden">Comments:</span><span style="color:white"><i class="fas fa-comment" aria-hidden="true"></i> {{count($post->comments)}}</li></span>
                        </ul>
                    </div>
                </a>
                </div>
            @endforeach
            
    
            
    
            
    
        
    
        </div>
    
        
        </section>
    
    </div>
        {{-- </div> --}}



    </x-slot>
</x-app-layout>





{{-- 

<div style="width: 70%;height:100%; background-color:yellow;margin:auto;">
    <div style="width:50%;background-color:blue;display:inline;margin:0px;">
        div1
    </div>
    <div style="width:50%;background-color:green;display:inline;margin:0px;">
        div2
    </div>
</div> --}}
{{-- <x-app-layout>
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
               <button class="btn profile-edit-btn">>edit</button>
                @else   
                    @if(null!==$user->followers()->find(Auth::id()))
                        <form action="{{route('users.unfollow',['id'=>$user['id']])}}" method="POST">
                            @csrf
                            <button type="submit" class="btn profile-edit-btn">>Unfollow</button>
                        </form>
                    @else
                        @if(null!==$user->following()->find(Auth::id()))
                            <form action="{{route('users.follow',['id'=>$user['id']])}}" method="POST">
                                @csrf
                                <button type="submit" class="btn profile-edit-btn">>follow back</button>
                            </form>
                        @else
                        <form action="{{route('users.follow',['id'=>$user['id']])}}" method="POST">
                            @csrf
                            <button type="submit" class="btn profile-edit-btn">>follow</button>
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
</x-app-layout> --}}
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