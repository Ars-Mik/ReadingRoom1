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
                </nav>
        @endif

        <main class="py-4">
            @yield('content')
        </main>


    </div>
</body>
</html>
