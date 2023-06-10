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

    <div id="documentModal" style="position: absolute; z-index: 999; width: 100%; height: 100vh; margin-top: -10rem; display: none">
        <button type="button" class="btn btn-danger" style="position: absolute; top: 2rem; right: 8%; z-index: 999" onclick="closeDocument()">X</button>
        <iframe id="documentFileFrame" src="/documents/7/file" style="position: absolute; width: 80%; height: 90vh; left: 10%; margin-top: 4rem"></iframe>
    </div>

    <div class="modal fade" id="documentModal" tabindex="-1" role="dialog" aria-hidden="true">

    </div>

    @yield('content')

    <footer class="footer">
        <x-footer/>
    </footer>

    @yield('script')

    <script>
        $('#logout').on('click', (e) => {
            axios('/logout', {method: "POST"})
        })

        function openDocument(id) {
            $('#documentFileFrame').attr('src', '/documents/' + id + '/file')
            $('#documentModal').show()
        }

        function closeDocument() {
            $('#documentFileFrame').attr('src', '')
            $('#documentModal').hide()
        }
    </script>

</body>

</html>
