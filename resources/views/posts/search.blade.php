@extends('layouts.app')

@section('content')
    <h1>レバテックチーム開発</h1>
    
    <form action="/posts/search" method="GET">
        @csrf
        <div class="key_words">
            <input type="text" name="key_words" placeholder="Key words" value="{{ $input }}"/>
            <input type="submit" value="検索"/>
        </div>
    </form>
    
    <h2>{{ $input }} の検索結果</h2>
    <div class='posts'>
        @foreach($posts as $post)
            <div class='post'>
                <h2 class='title'>
                    タイトル：<a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                </h2>
                <p class='body'>本文：{{ $post->body}}</p>
            </div>
        @endforeach
    </div>
    {{--
    <div class='paginate'>
        {{ $posts->links() }}
    </div> 
    --}}

    @if (Auth::check() && $user->host_flg == '1')
        <div>
            [<a href='/posts/create'>新規作成</a>]
        </div>
    @endif
    <div class="back"><p>[<a href="/">戻る</a>]</p>
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