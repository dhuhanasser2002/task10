@extends('layouts.app')

@section('title' , 'view')

@section('content')

<div class="card" style="width: 18rem;">
   
   
    <div class="card-body">

      
      <h5 class="card-title"> Id:</h5> <p>{{$post->id}}</p>
      <h5 class="card-title">Title: </h5> <p>{{$post->title}}</p>
      <h5 class="card-text">Description: </h5> <p>{{$post->description}}</p>
      <h5 class="card-text">Created_at: </h5> <p>{{$post->created_at}}</p>
      <h5 class="card-text">Updated_at: </h5> <p>{{$post->updated_at}}</p>


      @if ($post->image)
      <h5 class="card-text">Image: </h5>
      <img src="{{asset('images/' . $post->image)}}" class="card-img-top" alt="post image"> 
      @endif

    </div>
  </div>
<br>
<div>
  <a href="{{route('index')}}" class="btn btn-secondary">Back to Post</a>
</div>


 
@endsection