<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>{{ $announcement->title }}</title>
    <style>
        body { font-family: sans-serif; background: #f5f5f5; margin: 0; }
        .container { max-width: 700px; margin: 60px auto; background: #fff; padding: 32px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        h1 { font-size: 20px; margin-bottom: 8px; }
        .date { font-size: 13px; color: #888; margin-bottom: 24px; }
        .body { line-height: 1.8; white-space: pre-wrap; }
        .back { display: inline-block; margin-top: 32px; color: #555; text-decoration: none; }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ $announcement->title }}</h1>
        <div class="date">
            {{ ($announcement->published_at ?? $announcement->created_at)->format('Y/m/d') }}
        </div>
        <div class="body">{{ $announcement->body }}</div>

        <a class="back" href="{{ route('announcements.index') }}">← お知らせ一覧に戻る</a>
    </div>
</body>
</html>