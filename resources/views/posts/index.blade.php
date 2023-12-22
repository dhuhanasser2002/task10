@extends('layouts.app')

@section('title' , 'posts')

@section('content')
   <div class="container">

    <h1 style="color:palevioletred">Posts</h1>

     <div class="row">

      @forelse ($posts as $post)
      <div class="card" style="width: 18rem;">
          @if ($post->image)
          <img src="{{asset('images/' . $post->image)}}" class="card-img-top" alt="post image"> 
          @endif
         
          <div class="card-body">
  
            <h5 class="card-title">{{$post->title}}</h5>
            <p class="card-text">{{$post->description}}</p>
  
            <a href="{{route('show' , $post->id)}}" class="btn btn-success">View</a>
  
            <a href="{{route('edit' , $post->id)}}" class="btn btn-primary">Edit</a>
  
            <form action="{{route('destroy' , $post->id)}}" method="POST" style="display: inline">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
  
            </form>
          </div>
        </div>
  
        @empty
        
        <marquee style="color:palevioletred" behavior="alternate" direction="" >
          <h4> there is no post to show</h4>
        </marquee>
      
        @endforelse

     </div>
   </div>
@endsection