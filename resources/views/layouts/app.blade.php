<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.bunny.net/css?family=Poppins" rel="stylesheet">
    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css” />

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-white" style="text-shadow: none; font-family: Poppins,sans-serif">
    <div id="app">
        @if (Route::is(['login', 'password.request']))
            <nav class="navbar navbar-light bg-white border-bottom">
                <div class="container justify-content-start">
                    <a class="navbar-brand col-md-2" href="/">&larr;</a>
                    <p class="navbar-brand col-md-4 offset-2">Электронный архив Астраханской области</p>
                </div>
            </nav>
        @endif

        @if(Route::is('client.edit'))
                <nav class="navbar container-fluid bg-white border-bottom" style="height: 5rem">
                    <div class="row col-md-4 bg-black p-1" style="height: 100%; border-top-right-radius: 27px; border-bottom-right-radius: 27px">
                        <img class="col-md-2 mb-3" style="height: 100%; margin-left: 2rem;" src="{{ Vite::asset('resources/img/logo_about.svg') }}" alt="logo">
                        <p class="col-md-7 text-white mt-2" style="margin-left: 1rem; height: 2rem; display: inline-block">Электронный каталог архивных документов Астраханской области </p>
                    </div>
                    <div class="right" style="margin-right: 2rem;">
                        @auth()
                            <div class="dropdown">
                                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: rgba(98, 98, 98, 0.15)">
                                    {{ Auth::user()->name . ' ' . mb_substr(Auth::user()->second_name, 0, 1). '.'}}
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="left: -5rem">
                                    <li><a class="dropdown-item" href="/client/edit">
                                            <img style="width: 2rem; margin-right: 1rem;" src="{{ Vite::asset('resources/img/svg/user.svg') }}" alt="">
                                            Личный кабинет
                                        </a></li>
                                    <li><a class="dropdown-item" href="javascript:;" onclick="fetch.fetch('post', '/logout')">
                                            <img style="width: 2rem; margin-right: 1rem;" src="{{ Vite::asset('resources/img/svg/log-out.svg') }}" alt="">
                                            Выйти
                                        </a></li>
                                </ul>
                            </div>
                        @endauth
                    </div>
                </nav>
        @endif

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
