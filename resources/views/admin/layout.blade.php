<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', '管理画面')</title>
    <style>
        body { font-family: sans-serif; background: #f0f2f5; margin: 0; display: flex; }
        nav { width: 200px; background: #1e293b; color: #fff; min-height: 100vh; padding: 24px 0; flex-shrink: 0; }
        nav .brand { font-size: 16px; font-weight: bold; padding: 0 20px 20px; border-bottom: 1px solid #334155; margin-bottom: 12px; }
        nav a { display: block; padding: 10px 20px; color: #cbd5e1; text-decoration: none; font-size: 14px; }
        nav a:hover, nav a.active { background: #334155; color: #fff; }
        main { flex: 1; padding: 32px; }
        .page-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; }
        h1 { font-size: 20px; margin: 0; }
        table { width: 100%; border-collapse: collapse; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
        th, td { text-align: left; padding: 10px 14px; border-bottom: 1px solid #eee; font-size: 14px; }
        th { background: #f8fafc; font-weight: 600; }
        .btn { display: inline-block; padding: 6px 14px; border-radius: 4px; text-decoration: none; font-size: 13px; cursor: pointer; border: none; }
        .btn-primary { background: #2563eb; color: #fff; }
        .btn-danger { background: #dc2626; color: #fff; }
        .btn-secondary { background: #e2e8f0; color: #333; }
        .badge { display: inline-block; padding: 2px 8px; border-radius: 10px; font-size: 12px; }
        .badge-unhandled { background: #fee2e2; color: #b91c1c; }
        .badge-in_progress { background: #fef9c3; color: #854d0e; }
        .badge-done { background: #dcfce7; color: #166534; }
        .badge-active { background: #dcfce7; color: #166534; }
        .badge-suspended { background: #fee2e2; color: #b91c1c; }
        .status { background: #dcfce7; color: #166534; padding: 10px; border-radius: 4px; margin-bottom: 16px; font-size: 14px; }
        .errors { background: #fee2e2; color: #b91c1c; padding: 10px; border-radius: 4px; margin-bottom: 16px; font-size: 14px; }
        .form-group { margin-bottom: 16px; max-width: 500px; }
        label { display: block; margin-bottom: 4px; font-size: 14px; }
        input[type="text"], textarea, select {
            width: 100%; padding: 8px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; font-family: inherit;
        }
        textarea { height: 160px; resize: vertical; }
    </style>
</head>
<body>
    <nav>
        <div class="brand">管理画面</div>
        <a href="{{ route('admin.dashboard') }}">ダッシュボード</a>
        <a href="{{ route('admin.announcements.index') }}">お知らせ管理</a>
        <a href="{{ route('admin.inquiries.index') }}">問い合わせ管理</a>
        <a href="{{ route('admin.users.index') }}">ユーザー管理</a>
        <form method="POST" action="{{ route('logout') }}" style="margin-top: 24px; padding: 0 20px;">
            @csrf
            <button type="submit" class="btn btn-danger" style="width: 100%;">ログアウト</button>
        </form>
    </nav>
    <main>
        @if (session('status'))
            <div class="status">{{ session('status') }}</div>
        @endif
        @if ($errors->any())
            <div class="errors">
                <ul style="margin:0; padding-left: 18px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @yield('content')
    </main>
</body>
</html>