@extends('layouts.app')

@section('link', 'active')

@section('title', 'Create Post')

@section('content')
@if($post['img'])

<p><img style="width: 300px;  " src="{{ Storage::disk('public')->url($post['img']); }}"></p>

@endif
<form method="POST" action="{{ route('posts.update', ['id' =>  $post['id']])  }}">
    @csrf
    @method('PUT')
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Title</label>
    <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$post['title']}}">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Body</label>
    <textarea name='body' class="form-control">{{$post['body']}}</textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
    
</form>
@endsection