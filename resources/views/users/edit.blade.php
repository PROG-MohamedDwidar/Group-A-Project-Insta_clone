@section('title', 'View user ')

<x-app-layout>
    <x-slot name="slot">

        <form action="{{route('users.update',['id'=>$user['id']])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <img src="{{ Storage::disk('public')->url($user['avatar'])}}">
            upload a file only if you want to change ur avatar
            <input type="file" name='avatar' value="{{$user['avatar']}}">
            username
            <input type="text" name="username" value="{{$user['username']}}">
            bio
            <input type="text" name="bio" value="{{$user['bio']}}">
            
            <input type="hidden" name="id" value="{{$user['id']}}">
            
            <button type="submit">change</button>
            
        </form>
        <a href="{{route('dashboard')}}"><button>cancel</button></a>

    </x-slot>
</x-app-layout>