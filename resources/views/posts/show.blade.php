@extends('layouts.app')　　　　　　　　　　　　　　　　　　・・・　２

@section('content')
    <h1>投稿詳細ページ</h1>
    <h2 class="title">
        タイトル：{{ $post->title }}
    </h2>
    <div class="content">
        <div class="content__post">
            <p>本文：{{ $post->body }}</p>    
        </div>
        <div class="good_points">
            <p>** Good Points **
            <br>
                @foreach($post->good_points as $good_point)
                    {{ $good_point->point }}<br>
                @endforeach
            </p>
        </div>
        <div class='comment_reading'>
            <h3>コメント</h3>
            @foreach($comments as $comment)
                <p>・{{$comment->comment}}</p>
            @endforeach
            <p>いいね：{{$good}}</p>
        </div>
        @if(Auth::check())
        <div class='comment_writing'>
            <form action="/posts/comment/{{$post->id}}" method="POST">
                @csrf
                <div class="comment">
                    <h4>Review</h4>
                    <textarea name="comment" cols='40' rows='5' placeholder="Comment"></textarea>
                    <h4>Like</h4>
                    <select name='good'>
                        <option value=''>--</option>
                        <option value='5'>5</option>
                        <option value='4'>4</option>
                        <option value='3'>3</option>
                        <option value='2'>2</option>
                        <option value='1'>1</option>
                    </select>
                    <input type="submit" value="送信"/>
                </div>
    </form>
        </div>
        @endif
    </div>
    @if (Auth::check() && $user->host_flg == '1')
        <div class="footer">
            <p class="edit">[<a href="/posts/{{ $post->id }}/edit">編集</a>]</p>
            <a href="/">一覧ページへ戻る</a>
        </div>
    @endif
    <div class="back"><p>[<a href="/">戻る</a>]</p>
@endsection