@extends('admin.layout')

@section('title', 'ダッシュボード')

@section('content')
    <div class="page-header">
        <h1>ダッシュボード</h1>
    </div>

    <div style="display: flex; gap: 16px;">
        <div style="background: #fff; padding: 20px; border-radius: 8px; flex: 1;">
            <div style="font-size: 13px; color: #666;">ユーザー数</div>
            <div style="font-size: 28px; font-weight: bold;">{{ $stats['users'] }}</div>
        </div>
        <div style="background: #fff; padding: 20px; border-radius: 8px; flex: 1;">
            <div style="font-size: 13px; color: #666;">お知らせ件数</div>
            <div style="font-size: 28px; font-weight: bold;">{{ $stats['announcements'] }}</div>
        </div>
        <div style="background: #fff; padding: 20px; border-radius: 8px; flex: 1;">
            <div style="font-size: 13px; color: #666;">未対応の問い合わせ</div>
            <div style="font-size: 28px; font-weight: bold; color: #dc2626;">{{ $stats['inquiries_unhandled'] }}</div>
        </div>
    </div>
@endsection