@extends('layouts.app')　　　　　　　　　　　　　　　　　　・・・　２

@section('content')
    <h1>レバテックチーム開発</h1>
    
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
                <div><p id="route-time"></p></div>
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
                              var routeTime = document.getElementById("route-time");
                              routeTime.innerHTML = "およそ" + duration + "で到着します"
                            }
                    }
                </script>
  </div>
  
  

    

        

@endsection