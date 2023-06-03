<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @vite(['resources/js/app.js'])
    <title>Электронный архив</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body class="text-center h-100">
    <x-header-about></x-header-about>

    @yield('content')

    <footer class="footer">
        <x-footer/>
    </footer>

    @yield('script')

    <script>
        $('#logout').on('click', (e) => {
            axios('/logout', {method: "POST"})
        })
    </script>

</body>

</html>
