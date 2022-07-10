@extends('layouts.app')

@section('content')
    <h1 class="title">編集画面</h1>
    @if (Auth::check() && $user->host_flg == '1')
    <div class="content">
        <form action="/posts/{{ $post->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class='content__title'>
                <h2>タイトル</h2>
                <input type='text' name='post[title]' value="{{ $post->title }}">
            </div>
            <div class='content__body'>
                <h2>本文</h2>
                <textarea name="post[body]">{{ $post->body }}</textarea>
            </div>
            <input type="submit" value="保存">
        </form>
    </div>
    @else
    <h1 style="color:#ff0000">投稿の編集は許可されていません</h1>
    @endif
    <div class="back">[<a href="/">戻る</a>]</div>
@endsection