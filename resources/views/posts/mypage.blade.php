@extends('layouts.app')

@section('content')
    <div class='content'>
        <h1>hello {{Auth::user()->name}} !</h1>
        <p>コメントリスト
        <table border="1">
            <tr>
                <th>コメント</th>
                <th>いいね</th>
                <th>記事</th>
                <th>削除</th>
            </tr>
            @foreach($comments as $comment)
                <tr>
                    <th>{{$comment->comment}}</th>
                    <th>{{$comment->good}}</th>
                    <th><a href='/posts/{{$comment->post_id}}'>{{$comment->post->title}}</th>
                    <th>
                        <form action="/comment/{{ $comment->id }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit">削除</button> 
                         </form>
                    </th>
                </tr>
            @endforeach
        </table>
        <div class="mycoupon">
            <p>クーポン：{{Auth::user()->coupon}}</p>
        </div>
    </div>
    <div class='back'><p>[<a href="/">戻る</a>]</p></div>
@endsection