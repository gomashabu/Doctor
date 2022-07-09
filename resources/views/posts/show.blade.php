@extends('layouts.app')　　　　　　　　　　　　　　　　　　・・・　２

@section('content')
    <h1>投稿詳細ページ</h1>
    <h2 class="title">
        タイトル：{{ $post->title }}
    </h1>
    <div class="content">
        <div class="content__post">
            <p>本文：{{ $post->body }}</p>    
        </div>
    </div>
    @if (Auth::check() && $user->host_flg == '1')
        <div class="footer">
            <p class="edit">[<a href="/posts/{{ $post->id }}/edit">編集</a>]</p>
            <a href="/">一覧ページへ戻る</a>
        </div>
    @endif
@endsection