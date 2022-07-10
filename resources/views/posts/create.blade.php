@extends('layouts.app')　　　　　　　　　　　　　　　　　　・・・　２

@section('content')
    <h1>レバテックチーム開発</h1>
    <h2>投稿作成ページ</h2>
    @if (Auth::check() && $user->host_flg == '1')
    <!--  -->
    <form onsubmit="return false;">
        <p>施設の所在地にピンを合わせてください</p>
        <input type="text" value="東京ドーム" id="address">
        <button type="button" value="検索" id="map_button">位置情報検索</button>
        <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
    </form>
    <!-- 地図を表示させる要素 -->
    <div class="map_box01">
        <div id="map-canvas" style="width: 500px;height: 350px;">
        </div>
    </div>
    <script src="{{ asset('js/create.js') }}" defer></script>
    <!-- APIを取得 -->
    <script type="text/javascript" src="https://maps.google.com/maps/api/js?key={{ $api_key }}" async defer></script>
    
    <form action="/posts" method="POST">
        @csrf
        <div class="title">
            <h2>Title</h2>
            <input type="text" name="post[title]" placeholder="タイトル"/>
            <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
        </div>
        
        <input type="text" name="post[lat]" id="lat" value="" style="display: none">
　　　　<input type="text" name="post[lng]" id="lng" value="" style="display: none">
        <div class="body">
            <h2>Body</h2>
            <textarea name="post[body]" placeholder="今日も1日お疲れさまでした。"></textarea>
            <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
        </div>
        <div class="areas">
            <h2>地域</h2>
            <select name="post[area_id]">
                @foreach($areas as $area)
                    <option value="{{ $area->id }}">{{ $area->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="goodPoints">
            <h2>施設の特徴</h2>
            <select name="post[goodPoint_id]">
                @foreach($goodPoints as $goodPoint)
                    <option value="{{ $goodPoint->id }}">{{ $goodPoint->point }}</option>
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