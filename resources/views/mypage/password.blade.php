<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>パスワード変更</title>
    <style>
        body { font-family: sans-serif; background: #f5f5f5; margin: 0; }
        .container { max-width: 500px; margin: 60px auto; background: #fff; padding: 32px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        h1 { font-size: 22px; margin-bottom: 24px; }
        .form-group { margin-bottom: 16px; }
        label { display: block; margin-bottom: 4px; font-size: 14px; }
        input[type="password"] {
            width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px;
        }
        button { padding: 8px 16px; background: #2563eb; color: #fff; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #1d4ed8; }
        .errors { background: #fee2e2; color: #b91c1c; padding: 10px; border-radius: 4px; margin-bottom: 16px; font-size: 14px; }
        .status { background: #dcfce7; color: #166534; padding: 10px; border-radius: 4px; margin-bottom: 16px; font-size: 14px; }
        .back { display: inline-block; margin-top: 24px; color: #555; text-decoration: none; }
    </style>
</head>
<body>
    <div class="container">
        <h1>パスワード変更</h1>

        @if ($errors->updatePassword->any())
            <div class="errors">
                <ul style="margin:0; padding-left: 18px;">
                    @foreach ($errors->updatePassword->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('status') === 'password-updated')
            <div class="status">パスワードを変更しました。</div>
        @endif

        <form method="POST" action="{{ route('user-password.update') }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="current_password">現在のパスワード</label>
                <input type="password" id="current_password" name="current_password" required>
            </div>

            <div class="form-group">
                <label for="password">新しいパスワード</label>
                <input type="password" id="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation">新しいパスワード（確認）</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>

            <button type="submit">パスワードを変更</button>
        </form>

        <a class="back" href="{{ route('mypage') }}">← マイページに戻る</a>
    </div>
</body>
</html>