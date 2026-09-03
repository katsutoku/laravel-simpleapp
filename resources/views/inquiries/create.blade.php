<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>お問い合わせ</title>
    <style>
        body { font-family: sans-serif; background: #f5f5f5; margin: 0; }
        .container { max-width: 600px; margin: 60px auto; background: #fff; padding: 32px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        h1 { font-size: 22px; margin-bottom: 24px; }
        .form-group { margin-bottom: 16px; }
        label { display: block; margin-bottom: 4px; font-size: 14px; }
        input[type="text"], textarea {
            width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; font-family: inherit;
        }
        textarea { height: 160px; resize: vertical; }
        button { padding: 10px 24px; background: #2563eb; color: #fff; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #1d4ed8; }
        .errors { background: #fee2e2; color: #b91c1c; padding: 10px; border-radius: 4px; margin-bottom: 16px; font-size: 14px; }
        .back { display: inline-block; margin-top: 24px; color: #555; text-decoration: none; }
    </style>
</head>
<body>
    <div class="container">
        <h1>お問い合わせ</h1>

        @if ($errors->any())
            <div class="errors">
                <ul style="margin:0; padding-left: 18px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('inquiries.store') }}">
            @csrf

            <div class="form-group">
                <label for="subject">件名</label>
                <input type="text" id="subject" name="subject" value="{{ old('subject') }}" required>
            </div>

            <div class="form-group">
                <label for="body">お問い合わせ内容</label>
                <textarea id="body" name="body" required>{{ old('body') }}</textarea>
            </div>

            <button type="submit">送信する</button>
        </form>

        <a class="back" href="{{ route('mypage') }}">← マイページに戻る</a>
    </div>
</body>
</html>