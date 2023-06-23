<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Management</title>
    <title>Attendance Management</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a href="/" class="header__logo">Atte</a>
        </div>
    </header>

    <main>
        <div class="login">
            <div class="login__inner">
                <div class="login__inner-head">
                    <h1 class="login__title">ログイン
                    </h1>
                </div>
                <form class="form" action="/login" method="post">
                    @csrf
                    <div class="login-form__row">
                        <input class="login__input" type="text" name="email" value="{{ old('emal') }}" placeholder="メールアドレス">
                        <div class="form__error">
                            @error('email')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="login-form__row">
                        <input class="login__input" type="password" name="password" placeholder="パスワード">
                        <div class="form__error">
                            @error('password')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <button class="login__submit-button" type="submit">ログイン</button>
                </form>
                <span class="login__notice">アカウントをお持ち出ない方はこちらから</span><br>
                <a href="/register" class="login__register-button">会員登録</a>
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