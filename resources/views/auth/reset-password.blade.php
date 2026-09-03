@extends('layouts.auth')

@section('title', '新しいパスワードの設定')

@section('content')
    <h1>新しいパスワードの設定</h1>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group">
            <label for="email">メールアドレス</label>
            <input type="email" id="email" name="email" value="{{ old('email', $email) }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="password">新しいパスワード</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">新しいパスワード（確認）</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>

        <button type="submit">パスワードを更新</button>
    </form>
@endsection