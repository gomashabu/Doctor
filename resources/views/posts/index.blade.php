@extends('layouts.app')

@section('content')
    <p>[<a href='/apply'>新規ユーザ登録</a>]</p>
    <form action="/posts/search" method="POST">
        @csrf
        <div class="key_words">
            <input type="text" name="key_words" placeholder="Key words"/>
            <input type="submit" value="Search"/>
        </div>
    </form>
    
    <h2>投稿一覧ページ</h2>
    <div class='posts'>
        @foreach($posts as $post)
            <div class='post'>
                <h2 class='title'>
                    タイトル：<a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                </h2>
                <p class='body'>本文：{{ $post->body}}</p>
                @if (Auth::check() && $user->host_flg == '1')
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}"  method="post" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" onClick="deletePost({{$post->id}});">削除</button> {{--script内に定義したdeletePostを使用している--}}
                    </form>
                @endif
            </div>
        @endforeach
    </div>
    <!--<div class='paginate'>
        
    </div>-->
    @if (Auth::check() && $user->host_flg == '1')
        <div>
            [<a href='/posts/create'>新規作成</a>]
        </div>
    @endif
    <script>
        function deletePost(post_id) {
            form = document.getElementById('form_' + post_id);  //各投稿ごとのdeleteのformを取得
            is_submit = confirm('本当に削除してもよろしいですか？'); //はいの場合true,いいえの場合falseをis_submitに格納
            
            if(is_submit) {  //is_submitがtrueの場合のみ、{}の中の処理が行われる
                form.submit();  //deleteするformをsubmitする（投稿を削除している）
            }
        }
    </script>
@endsection