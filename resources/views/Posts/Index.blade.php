
<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ "User Posts " }}
      </h2>
  </x-slot>
 

  @if(isset($posts))
  @foreach($posts as $post)
  <div class="py-4">
  <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
  <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
  <div class="p-6 bg-white border-b border-gray-200">

    <div id="carouselExampleControls" class="carousel slide" >
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img style="mx-auto width: 300px;" src="{{ Storage::disk('public')->url($post['img']); }}" class="d-block w-100">
        </div>
        <div class="carousel-item">
          <img src="..." class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="..." class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  <ul>
    <li>

      @foreach($post->media as $media)
        <div class="carousel-item active">
          <img style="mx-auto width: 300px;" src="{{ Storage::disk('public')->url($media['img']); }}" class="d-block w-100">
        </div>
      @endforeach
    </li>
    <li>
      <form method="POST" action="{{ route('posts.like') }}" enctype="multipart/form-data" >
        @csrf
        <input type="hidden" value="{{ $post['id'] }}" name="postId">
        <button type="submit">Like</button>
      </form> 
    </li>

    <li>Likes: {{ count($post->likes) }}</li>

    <li>{{ $post->user['username'] }}</li>
    <li>{{ Str::limit($post['body'], 70, $end='.......'); }}</li>
    <li>Created at: {{ $post['created_at'] }}</li>

    <hr>
    <li>Comments:</li>
    @foreach($post->comments as $comment)
    

    <li>{{  $comment->user['username']}}: {{$comment['body'] }}</li>
    @endforeach
    
    <li><form method="POST" action="{{ route('posts.storeComment') }}" enctype="multipart/form-data">
      @csrf
      <div class="comment-wrapper">
        <label for="body" class="form-label">Add a comment</label>
        <input type="text" name='body' class="comment-box"></textarea>
      </div>
      <input type="hidden" value="{{ $post['id'] }}" name="postId">
      <button type="comment-btn">Submit</button> 
    </form></li>  
    
  </ul>
  </div>
  </div>
  </div>
  </div>

  @endforeach
  @endif  
              
</x-app-layout>
