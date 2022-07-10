<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\GoodPoint;

class GoodPointController extends Controller
{
    public function search(Request $request, GoodPoint $good_point)
    {
        $user = Auth::user();
        $input = $request->input('key_words');
        $input_converted = mb_convert_kana($input, 's');
        $ls_words = explode(" ", $input_converted);
        //$post = $post->find(1);
        //dd($ls_words);
        return view('posts/search')->with(['posts' => $good_point->andSearch($ls_words), 
                                            'user' => $user, 
                                            'input' => $input_converted]);
    }
}
