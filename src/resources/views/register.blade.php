<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Management</title>
    <title>Attendance Management</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a href="/" class="header__logo">Atte</a>
        </div>
    </header>

    <main>
        <div class="register">
            <div class="register__inner">
                <div class="register__inner-head">
                    <h1 class="register__title">会員登録</h1>
                </div>
                <form class="form" action="" method="post">
                    @csrf
                    <div class="form__row">
                        <input class="register__input" type="text" name="name" placeholder="名前" value="{{ old('name') }}">
                        <div class="form__error">
                            @error('name')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form__row">
                        <input class="register__input" type="text" name="email" placeholder="メールアドレス" value="{{ old('email') }}">
                        <div class="form__error">
                            @error('email')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form__row">
                        <input class="register__input" type="password" name="password" placeholder="パスワード">
                        <div class="form__error">
                            @error('password')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form__row">
                        <input class="register__input" type="password" name="confirmpassword" placeholder="確認用パスワード">
                        <div class="form__error">
                            @error('confirmpassword')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <button class="register__submit-button" type="submit">会員登録</button>
                </form>
                <span class="register__notice">アカウントをお持ちの方はこちらから</span><br>

                <a href="/login" class="register__login-button">ログイン</a>
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