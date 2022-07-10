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
    
    function search($key_word, int $limit_count = 5)
    {
        //dd($this->where('point', 'like', $key_word));
        return $this->where('point', 'like', $key_word)->first()
                    ->posts()
                    ->orderBy('updated_at', 'DESC')
                    ->paginate($limit_count);
    }
}
