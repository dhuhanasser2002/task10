@extends('layouts.app')

@section('title' , 'create')

@section('content')
    
<div class="card">
    <div class="card-header">
      <h2>Create Post</h2>
    </div>
    <div class="card-body">
    <form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div  class="form-group">
            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title" required>
        </div>

        <div  class="form-group">
            <label for="des">Description:</label><br>
            <textarea name="description" id="des" required></textarea>
        </div>

        <div  class="form-group">
            <label for="img">Image:</label><br>
            <input type="file" id="img" name="image">
        </div><br>
        <button type="submit" class="btn btn-outline-primary">create Post</button>
    
    </form>
      
    </div>
  </div>    

@endsection