@extends('layouts.app')　　　　　　　　　　　　　　　　　　・・・　２

@section('content')
    <style>
    .coupon_get{
        size:A4;
        text-align: center;
    }    
    </style>
    <div class="coupon_get">
        <img src='{{ asset('/coupon.png') }}' alt='写真'>
        <h1>クーポンGET!</h1>
    </div>
    <div class='back'><p>[<a href="/posts/{{$post->id}}">戻る</a>]</p></div>
@endsection