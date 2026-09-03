@extends('layouts.auth')

@section('title', 'パスワード再設定')

@section('content')
    <h1>パスワード再設定</h1>

    <p style="font-size: 14px; color: #555;">
        登録済みのメールアドレスを入力してください。パスワード再設定用のリンクを送信します。
    </p>

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="form-group">
            <label for="email">メールアドレス</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
        </div>

        <button type="submit">再設定リンクを送信</button>
    </form>

    <div class="links">
        <a href="{{ route('login') }}">ログイン画面に戻る</a>
    </div>
@endsection