<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostRequest;
use App\Post;
use App\Category;
use App\Comment;
use App\Area;
use App\GoodPoint;


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
    
    public function create(Area $area, GoodPoint $goodPoint)
    {
        $user = Auth::user();
        return view('posts/create')->with(['user' => $user, 'areas' => $area->get(), 'goodPoints' => $goodPoint->get()]);;
    }
    
    public function store(PostRequest $request, Post $post)
    {
        $input = $request->input('post');
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

