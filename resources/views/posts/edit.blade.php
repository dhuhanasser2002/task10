@extends('layouts.app')

@section('title' , 'edit post')

@section('content')
    
<div class="card">
    <div class="card-header">
      <h2>Edit Post</h2>
    </div>
    <div class="card-body">
    <form action="{{route('update' , $post->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title" value="{{$post->title}}" required>
        </div>

        <div class="form-group">
            <label for="des">Description:</label><br>
            <textarea name="description" id="des"  required>{{$post->description}}</textarea>
        </div>

        <div class="form-group">
            <label for="img">Image:</label><br>
            <input type="file" id="img" name="image">
            @if ($post->image)
                
            @endif
        </div><br>
        <button type="button" class="btn btn-outline-primary">create Post</button>
    
    </form>
      
    </div>
  </div>  
  <br>
<div>
  <a href="{{route('index')}}" class="btn btn-secondary">Back to Post</a>
</div>  

@endsection