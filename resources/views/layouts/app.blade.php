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
        @guest
            @if (Route::is(['login', 'password.request']))
                <nav class="navbar navbar-light bg-white border-bottom">
                    <div class="container justify-content-start">
                        <a class="navbar-brand col-md-2" href="/">&larr;</a>
                        <p class="navbar-brand col-md-4 offset-2">Электронный архив Астраханской области</p>
                    </div>
                </nav>
            @endif
        @endguest


        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
