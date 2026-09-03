<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>お知らせ一覧</title>
    <style>
        body { font-family: sans-serif; background: #f5f5f5; margin: 0; }
        .container { max-width: 700px; margin: 60px auto; background: #fff; padding: 32px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        h1 { font-size: 22px; margin-bottom: 24px; }
        .item { border-bottom: 1px solid #eee; padding: 16px 0; }
        .item:last-child { border-bottom: none; }
        .item a { text-decoration: none; color: #2563eb; font-size: 16px; }
        .item .date { font-size: 13px; color: #888; margin-top: 4px; }
        .back { display: inline-block; margin-top: 24px; color: #555; text-decoration: none; }
        .pagination { margin-top: 24px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>お知らせ</h1>

        @forelse ($announcements as $announcement)
            <div class="item">
                <a href="{{ route('announcements.show', $announcement) }}">{{ $announcement->title }}</a>
                <div class="date">
                    {{ ($announcement->published_at ?? $announcement->created_at)->format('Y/m/d') }}
                </div>
            </div>
        @empty
            <p>お知らせはまだありません。</p>
        @endforelse

        <div class="pagination">
            {{ $announcements->links() }}
        </div>

        <a class="back" href="{{ route('mypage') }}">← マイページに戻る</a>
    </div>
</body>
</html>