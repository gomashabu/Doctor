@extends('layouts.app')

@section('content')
    <h1>レバテックチーム開発</h1>
    <h2>投稿作成ページ</h2>
    @if (Auth::check() && $user->host_flg == '1')
    <form action="/posts" method="POST">
        @csrf
        <div class="title">
            <h2>Title</h2>
            <input type="text" name="post[title]" placeholder="タイトル"/>
            <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
        </div>
        <div class="body">
            <h2>Body</h2>
            <textarea name="post[body]" placeholder="今日も1日お疲れさまでした。"></textarea>
            <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
        </div>
        <div class="category">
            <h2>Category</h2>
            <select name="post[category_id]">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="保存"/>
    </form>
    @else
    <h1 "color:#ff0000">投稿の新規作成は許可されていません</h1>
    @endif
    <div class="back">[<a href="/">戻る</a>]</div>
@endsection