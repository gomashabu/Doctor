<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'comment', 
        'post_id',
        'user_id',
        'good',
    ];
    
    public function user()
    {
        return $this->belongsTo('App\user');
    }
    
    public function post()
    {
        return $this->belongsTo('App\post');
    }
}
