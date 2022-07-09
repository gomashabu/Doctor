<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequest;
use App\Post;
use App\Category;


class PostController extends Controller
{
    public function index(Post $post)
    {
        $user = Auth::user();
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit(), 'user' => $user]);
    }
    
    public function show(Post $post)
    {
        $user = Auth::user();
        return view('posts/show')->with(['post' => $post, 'user' => $user]);
    }
    
    public function create(Category $category)
    {
        return view('posts/create')->with(['categories' => $category->get()]);;
    }
    
    public function store(PostRequest $request, Post $post)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post)
    {
        return view('posts/edit')->with(['post' => $post]);
    }
    
    public function update(PostRequest $request, Post $post)
    {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
        
        return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
    
}
