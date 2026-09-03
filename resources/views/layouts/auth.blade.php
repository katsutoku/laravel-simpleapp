<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'App')</title>
    <style>
        body { font-family: sans-serif; background: #f5f5f5; margin: 0; }
        .auth-box { max-width: 400px; margin: 80px auto; background: #fff; padding: 32px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        .auth-box h1 { font-size: 20px; margin-bottom: 24px; }
        .form-group { margin-bottom: 16px; }
        label { display: block; margin-bottom: 4px; font-size: 14px; }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px;
        }
        button { width: 100%; padding: 10px; background: #2563eb; color: #fff; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #1d4ed8; }
        .errors { background: #fee2e2; color: #b91c1c; padding: 10px; border-radius: 4px; margin-bottom: 16px; font-size: 14px; }
        .status { background: #dcfce7; color: #166534; padding: 10px; border-radius: 4px; margin-bottom: 16px; font-size: 14px; }
        .links { margin-top: 16px; font-size: 14px; }
        .links a { color: #2563eb; text-decoration: none; }
    </style>
</head>
<body>
    <div class="auth-box">
        @if ($errors->any())
            <div class="errors">
                <ul style="margin:0; padding-left: 18px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('status'))
            <div class="status">{{ session('status') }}</div>
        @endif

        @yield('content')
    </div>
</body>
</html>