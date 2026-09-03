<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>マイページ</title>
    <style>
        body { font-family: sans-serif; background: #f5f5f5; margin: 0; }
        .container { max-width: 600px; margin: 60px auto; background: #fff; padding: 32px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        h1 { font-size: 22px; margin-bottom: 24px; }
        h2 { font-size: 18px; margin-top: 32px; margin-bottom: 16px; border-top: 1px solid #eee; padding-top: 24px; }
        .info { margin-bottom: 8px; }
        .form-group { margin-bottom: 16px; }
        label { display: block; margin-bottom: 4px; font-size: 14px; }
        input[type="password"] {
            width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px;
        }
        button { padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer; }
        .btn-primary { background: #2563eb; color: #fff; }
        .btn-primary:hover { background: #1d4ed8; }
        .btn-danger { background: #dc2626; color: #fff; }
        .btn-danger:hover { background: #b91c1c; }
        .logout-form { margin-top: 24px; }
        .errors { background: #fee2e2; color: #b91c1c; padding: 10px; border-radius: 4px; margin-bottom: 16px; font-size: 14px; }
        .status { background: #dcfce7; color: #166534; padding: 10px; border-radius: 4px; margin-bottom: 16px; font-size: 14px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>マイページ</h1>
        @if (session('status') === 'inquiry-sent')
            <div class="status">お問い合わせを送信しました。</div>
        @endif

        <p class="info">ようこそ、{{ auth()->user()->name }} さん</p>
        <p class="info">メールアドレス: {{ auth()->user()->email }}</p>

        <p><a href="{{ route('announcements.index') }}">お知らせ一覧を見る</a></p>
        <p><a href="{{ route('inquiries.create') }}">お問い合わせする</a></p>
        <p><a href="{{ route('settings.edit') }}">設定を変更する</a></p>
        <p><a href="{{ route('mypage.password') }}">パスワードを変更する</a></p>
        
        <form class="logout-form" method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn-danger">ログアウト</button>
        </form>
    </div>
</body>
</html>