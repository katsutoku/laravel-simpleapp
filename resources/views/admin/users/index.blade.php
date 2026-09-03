@extends('admin.layout')

@section('title', 'ユーザー管理')

@section('content')
    <div class="page-header">
        <h1>ユーザー管理</h1>
    </div>

    <form method="GET" action="{{ route('admin.users.index') }}" style="margin-bottom: 16px;">
        <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="名前・メールアドレスで検索" style="width: 300px; padding: 6px 10px; border: 1px solid #ccc; border-radius: 4px;">
        <button type="submit" class="btn btn-secondary">検索</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>名前</th>
                <th>メールアドレス</th>
                <th>権限</th>
                <th>状態</th>
                <th>登録日</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->is_admin ? '管理者' : '一般' }}</td>
                    <td>
                        <span class="badge badge-{{ $user->status === 'active' ? 'active' : 'suspended' }}">
                            {{ $user->status === 'active' ? '有効' : '停止中' }}
                        </span>
                    </td>
                    <td>{{ $user->created_at->format('Y/m/d') }}</td>
                    <td>
                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-secondary">編集</a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6">ユーザーが存在しません。</td></tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 16px;">
        {{ $users->links() }}
    </div>
@endsection