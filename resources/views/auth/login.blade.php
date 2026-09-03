@extends('layouts.auth')

@section('title', 'ログイン')

@section('content')
    <h1>ログイン</h1>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <label for="email">メールアドレス</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="password">パスワード</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label>
                <input type="checkbox" name="remember"> ログイン状態を保持する
            </label>
        </div>

        <button type="submit">ログイン</button>
    </form>

    <div class="links">
        <a href="{{ route('password.request') }}">パスワードをお忘れですか？</a><br>
        <a href="{{ route('register') }}">新規登録はこちら</a>
    </div>
@endsection