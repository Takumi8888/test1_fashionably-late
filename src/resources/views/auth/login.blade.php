<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
    <title>FashionablyLate</title>
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <h1 class="header__logo">FashionablyLate</h1>
            <nav>
                <ul class="header-nav">
                    <li class="header-nav__item">
                        <form class="register-form" action="/register" method="GET">
                            @csrf
                            <button class="header-nav__button">register</button>
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <div class="login-form__content">
            <div class="login-form__heading">
                <h2>Login</h2>
            </div>
            <form class="login-form" action="/login" method="POST">
                @csrf
                <div class="login-form__group">
                    <div class="login-form__group-title">
                        <span class="login-form__label--item">メールアドレス</span>
                    </div>
                    <div class="login-form__group-content">
                        <div class="login-form__input--text">
                            <input type="email" name="email" placeholder="例: test@example.com" />
                        </div>
                        <div class="login-form__error">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="login-form__group">
                    <div class="login-form__group-title">
                        <span class="login-form__label--item">パスワード</span>
                    </div>
                    <div class="login-form__group-content">
                        <div class="login-form__input--text">
                            <input type="password" name="password" placeholder="例: coachtech1106" />
                        </div>
                        <div class="login-form__error">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="login-form__button">
                    <button class="login-form__button-submit" type="submit">ログイン</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>