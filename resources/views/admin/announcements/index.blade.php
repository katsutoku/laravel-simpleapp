@extends('admin.layout')

@section('title', 'お知らせ管理')

@section('content')
    <div class="page-header">
        <h1>お知らせ管理</h1>
        <a href="{{ route('admin.announcements.create') }}" class="btn btn-primary">新規作成</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>タイトル</th>
                <th>公開状態</th>
                <th>公開日時</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($announcements as $announcement)
                <tr>
                    <td>{{ $announcement->title }}</td>
                    <td>
                        @if ($announcement->is_published)
                            <span class="badge badge-done">公開中</span>
                        @else
                            <span class="badge badge-unhandled">非公開</span>
                        @endif
                    </td>
                    <td>{{ $announcement->published_at?->format('Y/m/d H:i') ?? '-' }}</td>
                    <td>
                        <a href="{{ route('admin.announcements.edit', $announcement) }}" class="btn btn-secondary">編集</a>
                        <form method="POST" action="{{ route('admin.announcements.destroy', $announcement) }}" style="display: inline;" onsubmit="return confirm('削除してよろしいですか？');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">削除</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">お知らせがありません。</td></tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 16px;">
        {{ $announcements->links() }}
    </div>
@endsection