<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        <h1>投稿詳細ページ</h1>
        <h2 class="title">
            タイトル：{{ $post->title }}
        </h1>
        <div class="content">
            <div class="content__post">
                <p>本文：{{ $post->body }}</p>    
            </div>
        </div>
        <div class="good_points">
            <p>** Good Points **
            <br>
                @foreach($post->good_points as $good_point)
                    {{ $good_point->point }}<br>
                @endforeach
            </p>
        </div>
        <div class="footer">
            <p class="edit">[<a href="/posts/{{ $post->id }}/edit">編集</a>]</p>
            <a href="/">一覧ページへ戻る</a>
        </div>
    </body>
</html>