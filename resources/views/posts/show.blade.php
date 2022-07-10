@extends('layouts.app')　　　　　　　　　　　　　　　　　　・・・　２

@section('content')
    <h1>投稿詳細ページ</h1>
    <h2 class="title">
        タイトル：{{ $post->title }}
    </h2>
    <div><p id="route-time{{ $post->id }}"></p></div>
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
                <p>・{{$comment}}</p>
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
<script src="https://maps.googleapis.com/maps/api/js?key={{ $api_key }}&callback=test" async defer></script>  
                <script>
                    function showErr(err) {
                        switch (err.code) {
                            case 1 :
                                alert("位置情報の利用が許可されていません");
                                break;
                            case 2 :
                                alert("デバイスの位置が判定できません");
                                break;
                            case 3 :
                                alert("タイムアウトしました");
                                break;
                            default :
                                alert(err.message);
                        }
                    }
            
                    function test() {
                        if ("geolocation" in navigator) {
                            var opt = {
                                "enableHighAccuracy": true,
                                "timeout": 10000,
                                "maximumAge": 0,
                            };
                        navigator.geolocation.getCurrentPosition(initMap);
                        
                        } else {
                            alert("ブラウザが位置情報取得に対応していません");
                        }
                    }
            
                    function initMap(position) {
                        distanceMatrixservice = new google.maps.DistanceMatrixService();
                        setLocation(position.coords.latitude, position.coords.longitude);
                    }
                            
                            
                    function setLocation(lat, lng){
                        var latDes ='{{ $post->lat }}';
                        var lngDes ='{{ $post->lng }}';
                         distanceMatrixservice.getDistanceMatrix({
                          origins: [lat +"," + lng], // 出発地
                          destinations: [latDes + "," + lngDes], // 目的地
                          travelMode: google.maps.TravelMode.DRIVING, // 移動手段
                        }, timeRequired)
                    }
                        
                    function timeRequired(response, status) {
                            if(status == "OK") {
                              var origins = response.originAddresses;
                              var destinations = response.destinationAddresses;
                    
                                  for (var i = 0; i < origins.length; i++) {
                                    var results = response.rows[i].elements;
                                    for (var j = 0; j < results.length; j++) {
                                      var element = results[j];
                                      var distance = element.distance.text;
                                      var duration = element.duration.text;
                                      var from = origins[i];
                                      var to = destinations[j];
                                   }
                                 }
                              var routeTime = document.getElementById("route-time{{ $post->id }}");
                              routeTime.innerHTML = "-およそ" + duration + "で到着します"
                            }
                    }
                </script>
@endsection