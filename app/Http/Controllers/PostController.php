<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
  public function index()
  {
    $posts = Post::all();
    return view('post.index', compact('posts'));
  }
  
  public function create()
  {
    return view('post.create');
  }
  
  public function store(Request $request)
  {
    $request->validate([
      'title' => 'required|string|max:255',
      'content' => 'required'
    ]);
    
    Post::create($request->only(['title', 'content']));
    
    return redirect()->route('posts.index');
  }
  
  public function edit(Post $post)
  {
    return view('post.edit', compact('post'));
  }
  
  public function update(Request $request, Post $post)
  {
    $request->validate([
      'title' => 'required|string|max:255',
      'content' => 'required'
    ]);
    
    $post.update($request->all());
    
    return redirect()->route('posts.index');
  }
  
  public function destroy(Post $post)
  {
    $post->delete();
    return redirect()->route('posts.index');
  }
}
