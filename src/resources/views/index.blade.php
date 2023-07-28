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
                    <li class="header__li"><a href="/date">日付一覧</a></li>
                    <li class="header-nav__button"><a href="/login">ログアウト</a></li>
                    </form>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <div class="clockin">
            <div class="clockin__inner">
                <div class="clockin__header"></div>
                @if (Auth::check())
                <h2 class="clockin__title">
                    {{ Auth::user()->name }}さんお疲れ様です！
                </h2>
                @endif
            </div>
            <div class="clockin__items">
                <form class="form" method="post">
                    @csrf
                    <button class="clockin-workhours" type="submit" value="startWork" formaction="{{ route('work.start') }}">勤務開始</button>
                    <button class="clockin-workhours" type="submit" value="endWork" formaction="{{ route('work.end') }}">勤務終了</button>
                    <button class="clockin-breaktimes" type="submit" value="startBreak" formaction="{{ route('break.start') }}">休憩開始</button>
                    <button class="clockin-breaktimes" type="submit" value="endBreak" formaction="{{ route('break.end')}}">休憩終了</button>
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