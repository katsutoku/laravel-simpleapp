@extends('layouts.auth')

@section('title', '新規登録')

@section('content')
    <h1>新規登録</h1>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group">
            <label for="name">名前</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="email">メールアドレス</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label for="password">パスワード</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">パスワード（確認）</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>

        <button type="submit">登録する</button>
    </form>

    <div class="links">
        <a href="{{ route('login') }}">すでにアカウントをお持ちの方はこちら</a>
    </div>
@endsection