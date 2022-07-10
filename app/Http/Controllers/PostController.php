<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequest;
use App\Post;
use App\Category;
use App\Comment;


class PostController extends Controller
{
    public function index(Post $post)
    {
        $user = Auth::user();
        return view('posts/index')->with(['posts' => $post->get()/*->getPaginateByLimit()*/, 'user' => $user]);
    }
    
    public function show(Post $post, Comment $comment)
    {
        $user = Auth::user();
        $show_comment = [];
        $comment = $comment->where('post_id', '=', $post->id)->orderby('created_at','DESC')->limit(5)->get();
        for($i = 0; $i < count($comment) ; $i++){
            if(!empty($comment[$i]->comment)){
                $show_comment[] = $comment[$i]->comment;
            }
        }
        $good = 0.0;
        if(count($comment) !== 0){
            for($i=0; $i<count($comment); $i++){
                $good += $comment[$i]->good;
            }
            $good /= count($comment);
        }
        $good = round($good,1);
        return view('posts/show')->with(['post' => $post, 'user' => $user, 'comments' => $show_comment, 'good' => $good]);
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
    
    public function search(Request $request, Post $post)
    {
        $user = Auth::user();
        $input = $request['key_words'];
        $ls_words = explode("_", $input);
        //dd($input);
        //$post->fill($input)->save();
        // return view('posts/search')->with(['posts' => $post->searchByGoodPoints(), 'user' => $user]);
        return view('posts/search');  // 作成途中
    }
    
    public function comment_store(Request $request, Comment $comment, Post $post)
    {
        $random = mt_rand(0,100);
        $user = Auth::user();
        $input = $request->input();
        $comment->fill(['comment'=>$input['comment'], 'post_id'=>$post->id, 'user_id'=>$user->id, 'good'=>$input['good']])->save();
        if($random > 10){
            $user->coupon += 1;
            $user->save();
            return view('posts/coupon_get')->with(['post'=>$post]);
        }else{
            return redirect('/posts/'.$post->id);
        }
    }
}

