<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class GoodPoint extends Model
{
    protected $fillable = [
        'point', 
    ];
    
    public function posts()
    {
        //1つのGood point (自慢ポイント) が多数のpostで引かれる。
        return $this->belongsToMany('App\Post');
    }
    
    
    // public function search($key_words, int $limit_count = 5)
    // {
    //     $post = new Post;
    //     $posts = Post::whereHas('good_points', function ($query) use($key_words) {
            
    //         // And検索で繰り返すためのfunction
    //         dd($query);
    //         function single_search($source, $column, $key_word) {
    //             return $source->where($column, 'like', '%'.$key_word.'%');  // comumn名にkey_wordが含まれるものを部分一致で取ってくる。
    //         }
            
    //         $posts_dst = $query;
    //         for ($i=0; $i<count($key_words); $i++) {  // AND検索のため繰り返す
    //             $posts_dst = single_search($posts_dst, 'point', $key_words[$i]);
    //             //dd($posts_dst);
    //         }
            
    //     })->orderBy('updated_at', 'DESC')->paginate($limit_count);
    //     return $posts;
    // }
    
    public function search($posts, $key_word)
    {
        $results = [];
        foreach ($posts as $post) {
            $good_points = $post->good_points;
            foreach ($good_points as $good_point) {
                if (strpos($good_point->point, $key_word) !== false) {
                    array_push($results, $post);
                    break;
                }
            }
        }
        return $results;
    }
    
    public function andSearch($key_words, int $limit_count = 5)
    {
        //
        // 最初はposts_dstにすべてのpostsを入れておいて、各々のkey_wordを含まないものを除いていく。
        //
        $posts_dst = Post::all();    // すべてのposts
        foreach ($key_words as $key_word) {  // AND検索のため繰り返す
            // 最初の全てのpostsから、key_wordを含むものを$posts_dstとして出力する。
            // その後、残ったpostsから、key_wordを含むものを%posts_dstとして出力。これをkey_wordsの数だけ繰り返す。
            $posts_dst = $this->search($posts_dst, $key_word);    
        }
        return $posts_dst;
    }
    
}
