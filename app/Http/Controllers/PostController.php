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
        $user = Auth::user();
        return view('posts/create')->with(['categories' => $category->get(), 'user' => $user]);;
    }
    
    public function store(PostRequest $request, Post $post)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    
    public function edit(Post $post)
    {
        $user = Auth::user();
        return view('posts/edit')->with(['post' => $post, 'user' => $user]);
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
    
    public function search(Request $request, Post $post, GoodPoint $good_point)
    {
        $user = Auth::user();
        $input = $request->input('key_words');
        $input_converted = mb_convert_kana($input, 's');
        $ls_words = explode(" ", $input_converted);
        $post = $post->find(1);
        //dd($ls_words);
        return view('posts/search')->with(['posts' => $good_point->search($ls_words[0]), 
                                            'user' => $user, 
                                            'input' => $input_converted]);  // 作成途中
    }
    
}
