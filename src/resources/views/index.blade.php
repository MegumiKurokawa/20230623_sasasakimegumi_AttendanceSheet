<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Management</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a href="/" class="header__logo">Atte</a>
            <nav class="header__nav">
                <ul class="header__ul">
                    <li class="header__li"><a href="/">ホーム</a></li>
                    <li class="header__li"><a href="/attendance">日付一覧</a></li>
                    <form action="/logout" class="form" method="post">
                        @csrf
                        <button class="header-nav__button">ログアウト</button>
                    </form>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <div class="clockin">
            <div class="clockin__inner">
                <div class="clockin__header"></div>
                @if ($user)
                <h2 class="clockin__title">
                    {{ $user['name'] }}さんお疲れ様です！
                </h2>
                @endif
            </div>
            <div class="clockin__items">
                <form class="form" action="/" method="post">
                    @csrf
                    <button class="clockin-workhours" type="submit" value="startWork">勤務開始</button>
                    <button class="clockin-workhours" type="submit" value="endWork">勤務終了</button>
                    <button class="clockin-breaktimes" type="submit" value="startBreak">休憩開始</button>
                    <button class="clockin-breaktimes" type="submit" value="endBreak">休憩終了</button>
                </form>
            </div>
        </div>
    </main>
    <footer class="footer">
        <div class="footer__inner">
            <small class="footer__small">Atte, inc.</small>
        </div>
    </footer>
</body>

</html>