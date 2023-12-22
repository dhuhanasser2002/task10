<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts=Post::all();
        return view('Posts.index' , compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>'image|mimes:jpeg,png,jpg,gif'
        ]);

        $post = new Post();
        $post->title = $request->input('title');
        $post->description = $request->input('description');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageNew = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images') , $imageNew);
            $post->image = $imageNew;
        }
        $post->save();
        return redirect()->route('index')->with('success' , 'post created successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show' , compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit' , compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'image'=>'image|mimes:jpeg,png,jpg,gif'
        ]);

        $post->title = $request->input('title');
        $post->description = $request->input('description');

        if ($request->hash_file('image')) {
            $image = $request->file('image');
            $imageNew = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images') , $imageNew);
            $post->image = $imageNew;
        }
        $post->save();
        return redirect()->route('index')->with('success' , 'post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('index')->with('success' , 'post deleted successfully');
    }
}
