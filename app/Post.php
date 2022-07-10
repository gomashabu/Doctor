<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'title',
        'body',
        'area_id',
        'user_id',
        ];
    
    /*function getPaginateByLimit(int $limit_count = 5)
    {
        return $this::with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }*/
    
    public function comments()
    {
        return $this->hasMany('App\Category');
    }
    
    public function user()
    {
        return $this->belongsTo('App\user');
    }
    
    public function area()
    {
        return $this->belongsTo('App\area');
    }
    
    public function good_points()
    {
        // 一つのpostに多数のGood points (自慢ポイント) が設定できる
        return $this->belongsToMany('App\GoodPoint');
    }
    
    /*
    function searchByGoodPoints($input, int $limit_count = 5)
    {
        dd($this->good_points()->get());
        return $this->good_points()->where('point', 'like', $input)->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    */  // GoodPointモデルにsearch functionを入れたため、削除
    
}
