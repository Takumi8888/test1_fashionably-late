<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&display=swap" rel="stylesheet">
    @yield('link')
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/layouts/common.css') }}">
    @yield('css')
    @yield('livewire')
    <title>FashionablyLate</title>
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <h1 class="header__logo">FashionablyLate</h1>
            @if(Auth::check())
                <nav>
                    <ul class="header-nav">
                        <li class="header-nav__item">
                            <form class="logout-form" action="/logout" method="POST">
                                @csrf
                                <button class="header-nav__button">logout</button>
                            </form>
                        </li>
                    </ul>
                </nav>
            @else
                <nav>
                    <ul class="header-nav">
                        <li class="header-nav__item">
                            <form class="login-form" action="/login" method="GET">
                                @csrf
                                <button class="header-nav__button">login</button>
                            </form>
                        </li>
                    </ul>
                </nav>
            @endif
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>

</html>