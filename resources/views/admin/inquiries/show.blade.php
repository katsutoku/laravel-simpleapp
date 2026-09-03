@extends('admin.layout')

@section('title', '問い合わせ詳細')

@section('content')
    <h1>問い合わせ詳細</h1>

    <table style="margin-bottom: 24px;">
        <tr>
            <th style="width: 140px;">件名</th>
            <td>{{ $inquiry->subject }}</td>
        </tr>
        <tr>
            <th>送信者</th>
            <td>{{ $inquiry->name }}（{{ $inquiry->email }}）</td>
        </tr>
        <tr>
            <th>受付日時</th>
            <td>{{ $inquiry->created_at->format('Y/m/d H:i') }}</td>
        </tr>
        <tr>
            <th>内容</th>
            <td style="white-space: pre-wrap;">{{ $inquiry->body }}</td>
        </tr>
    </table>

    <form method="POST" action="{{ route('admin.inquiries.updateStatus', $inquiry) }}">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="status">対応状況</label>
            <select name="status" id="status">
                <option value="unhandled" {{ $inquiry->status === 'unhandled' ? 'selected' : '' }}>未対応</option>
                <option value="in_progress" {{ $inquiry->status === 'in_progress' ? 'selected' : '' }}>対応中</option>
                <option value="done" {{ $inquiry->status === 'done' ? 'selected' : '' }}>完了</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">更新する</button>
        <a href="{{ route('admin.inquiries.index') }}" class="btn btn-secondary">一覧に戻る</a>
    </form>
@endsection