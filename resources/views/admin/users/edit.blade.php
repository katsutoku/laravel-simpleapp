@extends('admin.layout')

@section('title', 'ユーザー編集')

@section('content')
    <h1>ユーザー編集</h1>

    <form method="POST" action="{{ route('admin.users.update', $user) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">名前</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="form-group">
            <label for="email">メールアドレス</label>
            <input type="text" id="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>

        @if (auth()->id() === $user->id)
            <p style="font-size: 13px; color: #888; margin-bottom: 16px;">
                ※ご自身のアカウントの権限・状態は変更できません。
            </p>
        @else
            <div class="form-group">
                <label>
                    <input type="checkbox" name="is_admin" value="1" {{ old('is_admin', $user->is_admin) ? 'checked' : '' }}>
                    管理者権限を付与する
                </label>
            </div>

            <div class="form-group">
                <label for="status">アカウント状態</label>
                <select name="status" id="status">
                    <option value="active" {{ $user->status === 'active' ? 'selected' : '' }}>有効</option>
                    <option value="suspended" {{ $user->status === 'suspended' ? 'selected' : '' }}>停止</option>
                </select>
            </div>
        @endif

        <button type="submit" class="btn btn-primary">更新する</button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">一覧に戻る</a>
    </form>
@endsection