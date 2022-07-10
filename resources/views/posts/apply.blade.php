@extends('layouts.app')

@section('content')
    <h3>Masterへようこそ</h3>
    <p>ログインをするには、以下の情報の入力が必要です。送信されましたら、こちらからご連絡させていただきます。</p>
    <form action='/mail' method='GET'>
    @csrf
        <p>名前</p>
        <input type='text' name='name' placeholder="名前"/>
        <p>メールアドレス</p>
        <input type='email' name='email' placeholder='メールアドレス'>
        <p></p>
        <input type = "submit" value = "送信"/>
    </form>
@endsection