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
                {{-- <img src="{{ Storage::disk('public')->url($user['avatar'])}}"profile picture"> --}}
            </div>
    
            
           <div>
            <h1 class="profile-user-name">{{"#".$tag['tagName']}}</h1>

            {{-- @if($user['id']==Auth::id())
               <button class="btn profile-edit-btn">>edit</button>
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
                @endif --}}
            {{-- <button class="btn profile-edit-btn">Edit Profile</button>  --}}
            {{-- <button class="btn profile-settings-btn" aria-label="profile settings"><i class="fas fa-cog" aria-hidden="true"></i></button> --}}
    
    
            
    
            <div class="profile-stats">
                <ul>
                    @php($noposts=count($tag->Posts))
                    {{-- <span>{{$noposts}}</span> --}}
                    <li><span class="profile-stat-count">{{$noposts}}</span> posts</li>
                    
                    
                </ul>
            </div>
    
            {{-- <div class="profile-bio"> 
                <p><span class="profile-real-name">{{$user['FullName']}}</span> </p>
                <p><span class="profile-real-name"></span> {{$user['bio']}}</p>
                <p><span class="profile-real-name"></span> {{$user['email']}}</p>
           </div> --}}
    
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
            @foreach($tag->posts as $post)
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

