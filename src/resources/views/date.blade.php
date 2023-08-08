<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Management</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/date.css') }}">
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a href="/" class="header__logo">Atte</a>
            <nav class="header__nav">
                <ul class="header__ul">
                    <li class="header__li"><a href="/">ホーム</a></li>
                    <li class="header__li"><a href="/date">日付一覧</a></li>
                    <li class="header-nav__button">
                        <form action="/logout" method="post">
                            @csrf
                            <button class="logout-button" type="submit">ログアウト</button>
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
    </header>


    <main>
        <div class="datelist">
            <div class="datelist__date">
                <a class="datelist__date-sub" href="{{ route('date.index', ['back' => 1, 'date' => $carbonDate->format('Y-m-d')]) }}">&lt;</a>
                <span class="date">{{ $carbonDate->format('Y-m-d') }}</span>
                <a class="datelist__date-add" href="{{ route('date.index', ['forward' => 1, 'date' => $carbonDate->format('Y-m-d')]) }}">&gt;</a>
            </div>
            <table class="datelist__table">
                <tr class="datelist__row">
                    <th>名前</th>
                    <th>勤務開始</th>
                    <th>勤務終了</th>
                    <th>休憩時間</th>
                    <th>勤務時間</th>
                </tr>
                @foreach ($workhours as $workhour)
                <tr class="datelist__row">
                    <td>
                        @foreach ($users as $user)
                        @if ($user->id === $workhour->user_id)
                        {{ $user->name }}
                        @endif
                        @endforeach
                    </td>
                    <td>{{ $workhour->start_time }}</td>
                    <td>{{ $workhour->end_time }}</td>
                    <td>
                        {{ $workhour->breaktime }}
                    </td>
                    <td>{{ $workhour->worktime }}</td>
                </tr>
                @endforeach
            </table>
            <div class="datelist__paginate">
                {{ $workhours->links('pagination::bootstrap-4') }}
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