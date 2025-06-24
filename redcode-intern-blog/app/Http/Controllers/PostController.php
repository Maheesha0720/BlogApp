<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Inertia\Inertia;
use Illuminate\Http\Request;

class PostController extends Controller
{
   
public function index() {
    return Inertia::render('Posts/Index', [
        'posts' => Post::latest()->get()
    ]);
}

public function create() {
    return Inertia::render('Posts/Create');
}

public function store(Request $request) {
    $request->validate([
        'title' => 'required',
        'content' => 'required',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);
       $path = $request->hasFile('image')
        ? $request->file('image')->store('posts', 'public')
        : null;
        
    Post::create([
        'title' => $request->title,
        'content' => $request->content,
        'image' => $path,
    ]);

    return redirect()->route('posts.index');
}
public function edit(Post $post)
{
    return Inertia::render('Posts/Edit', [
        'post' => $post,
    ]);
}

public function update(Request $request, Post $post)
{
    $request->validate([
        'title' => 'required',
        'content' => 'required',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);
  if ($request->hasFile('image')) {
        $path = $request->file('image')->store('posts', 'public');
        $post->image = $path;
    }
    $post->update([
        'title' => $request->title,
        'content' => $request->content,
        'image'=>$path ?? $post->image,
    ]);

    return redirect()->route('posts.index');
}

public function destroy(Post $post)
{
    $post->delete();
    return redirect()->route('posts.index');
}
}
