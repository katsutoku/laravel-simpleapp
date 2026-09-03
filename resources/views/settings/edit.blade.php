<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>設定</title>
    <style>
        body { font-family: sans-serif; background: #f5f5f5; margin: 0; }
        .container { max-width: 600px; margin: 60px auto; background: #fff; padding: 32px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        h1 { font-size: 22px; margin-bottom: 24px; }
        .form-group { margin-bottom: 20px; }
        label { font-size: 14px; display: flex; align-items: center; gap: 8px; }
        button { padding: 8px 24px; background: #2563eb; color: #fff; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #1d4ed8; }
        .status { background: #dcfce7; color: #166534; padding: 10px; border-radius: 4px; margin-bottom: 16px; font-size: 14px; }
        .back { display: inline-block; margin-top: 24px; color: #555; text-decoration: none; }
    </style>
</head>
<body>
    <div class="container">
        <h1>設定</h1>

        @if (session('status') === 'settings-updated')
            <div class="status">設定を更新しました。</div>
        @endif

        <form method="POST" action="{{ route('settings.update') }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>
                    <input type="checkbox" name="notify_email" value="1" {{ $setting->notify_email ? 'checked' : '' }}>
                    お知らせや重要な通知をメールで受け取る
                </label>
            </div>

            <button type="submit">保存する</button>
        </form>

        <a class="back" href="{{ route('mypage') }}">← マイページに戻る</a>
    </div>
</body>
</html>