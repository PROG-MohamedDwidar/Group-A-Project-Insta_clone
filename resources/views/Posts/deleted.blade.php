@extends('layouts.app')

@section('title', 'Posts list')

@section('link2', 'active')

@section('content')
<h1> Deleted Posts </h1>
<table class="table table-light table-striped table-bordered">
  <thead class="table-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Body</th>
      <th scope="col">Deleted At</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    @if(isset($posts))
    @foreach($posts as $post)
    <tr>
      <th scope="row">{{ $post['id'] }}</th>
      <td>{{ $post['title'] }}</td>
      <td>{{ $post['body'] }}</td>
      <td>{{ $post['deleted_at'] }}</td>
      <td>
      <form method="POST" action="{{ route('posts.restore', ['id' =>  $post['id']]) }}">
          @csrf
          @method('PUT')
          <button type="submit" class="btn btn-success">Restore</button>
        </form>
      </td>
    </tr>
    @endforeach
    @endif
  </tbody>
</table>

@endsection
