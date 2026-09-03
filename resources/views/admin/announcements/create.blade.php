@extends('admin.layout')

@section('title', 'お知らせ新規作成')

@section('content')
    <h1>お知らせ新規作成</h1>

    <form method="POST" action="{{ route('admin.announcements.store') }}">
        @csrf

        <div class="form-group">
            <label for="title">タイトル</label>
            <input type="text" id="title" name="title" value="{{ old('title') }}" required>
        </div>

        <div class="form-group">
            <label for="body">本文</label>
            <textarea id="body" name="body" required>{{ old('body') }}</textarea>
        </div>

        <div class="form-group">
            <label>
                <input type="checkbox" name="is_published" value="1" {{ old('is_published') ? 'checked' : '' }}>
                公開する
            </label>
        </div>

        <button type="submit" class="btn btn-primary">作成する</button>
        <a href="{{ route('admin.announcements.index') }}" class="btn btn-secondary">キャンセル</a>
    </form>
@endsection