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
    
    public function search($posts, $column, $key_word)
    {
        $results = [];
        foreach ($posts as $post) {    // 各々のpostに対して処理を行う
            $elements = $post->$column;    // そのpostが持つgood_pointsの一覧
            foreach ($elements as $element) {   // 1個のpostが持つgood_point全てで繰り返す
                if (strpos($element->point, $key_word) !== false) {    // そのgood_pointがkey_wordを含んでいたらture
                    array_push($results, $post);    // そのpostを$resultsに格納して残す。一方、key_wordを含んでいるgood_pointが無い場合は、$resultsに格納されず除外される。
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
        $columns = ['good_points'];
        foreach ($columns as $column) {
            foreach ($key_words as $key_word) {  // AND検索のため繰り返す
            // 最初の全てのpostsから、key_wordを含むものを$posts_dstとして出力する。
            // その後、残ったpostsから、key_wordを含むものを%posts_dstとして出力。これをkey_wordsの数だけ繰り返す。
            $posts_dst = $this->search($posts_dst, $column, $key_word);    
            }
        }
        return $posts_dst;
    }
    
}
