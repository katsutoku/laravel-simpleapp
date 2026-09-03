@extends('admin.layout')

@section('title', '問い合わせ管理')

@section('content')
    <div class="page-header">
        <h1>問い合わせ管理</h1>
    </div>

    <div style="margin-bottom: 16px;">
        <a href="{{ route('admin.inquiries.index') }}" class="btn {{ !request('status') ? 'btn-primary' : 'btn-secondary' }}">全て</a>
        <a href="{{ route('admin.inquiries.index', ['status' => 'unhandled']) }}" class="btn {{ request('status') === 'unhandled' ? 'btn-primary' : 'btn-secondary' }}">未対応</a>
        <a href="{{ route('admin.inquiries.index', ['status' => 'in_progress']) }}" class="btn {{ request('status') === 'in_progress' ? 'btn-primary' : 'btn-secondary' }}">対応中</a>
        <a href="{{ route('admin.inquiries.index', ['status' => 'done']) }}" class="btn {{ request('status') === 'done' ? 'btn-primary' : 'btn-secondary' }}">完了</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>件名</th>
                <th>送信者</th>
                <th>状態</th>
                <th>受付日時</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($inquiries as $inquiry)
                <tr>
                    <td>{{ $inquiry->subject }}</td>
                    <td>{{ $inquiry->name }}</td>
                    <td>
                        <span class="badge badge-{{ $inquiry->status }}">
                            @switch($inquiry->status)
                                @case('unhandled') 未対応 @break
                                @case('in_progress') 対応中 @break
                                @case('done') 完了 @break
                            @endswitch
                        </span>
                    </td>
                    <td>{{ $inquiry->created_at->format('Y/m/d H:i') }}</td>
                    <td>
                        <a href="{{ route('admin.inquiries.show', $inquiry) }}" class="btn btn-secondary">詳細</a>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5">問い合わせはありません。</td></tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 16px;">
        {{ $inquiries->links() }}
    </div>
@endsection