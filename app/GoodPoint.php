<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoodPoint extends Model
{
    public function posts()
    {
        //1つのGood point (自慢ポイント) が多数のpostで引かれる。
        return $this->belongsToMany('App\Posts');
    }
}
