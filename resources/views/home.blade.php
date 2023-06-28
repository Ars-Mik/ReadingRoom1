<!DOCTYPE html>
<html lang="en" class="h-100">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      @vite(['resources/sass/app.scss', 'resources/js/app.js'])
      <title>Электронный архив</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  </head>

  <body class="text-center h-100">
    <div class="header_cover h-100 text-bg-dark">

        <x-header title="Электронный архив"/>

        <div class="container-fluid no-padding" style="position: absolute;top: 50%;right: 50%;transform: translate(50%,-50%);">
          <div class="row" style="position: relative;">
            <div class="col">
              <h1 class="fs-1 m-auto mb-5">Электронный читальный зал архивных документов Астраханской области</h1>
              <p class="lead btn-center">
                <a href="documents" class="btn btn-lg rounded-pill btn-size btn-primary">Перейти к просмотру документов</a>
              </p>
            </div>
          </div>
        </div>

        <div class="footer_header">
          <div class="fs-6 text_footer">
            <img src="{{ Vite::asset('resources/img/svg/icon_footer_header/dokumenty_o193ramc6pcf_512 1.svg') }}" alt="icon">
            <span>Более 2 миллионов различных документов</span>
          </div>
          <div class="fs-6 text_footer">
            <img src="{{ Vite::asset('resources/img/svg/icon_footer_header/documents_files_copy_paste_icon_132933 1.svg') }}" alt="icon">
            <span>Более 10000 описей</span>
          </div>
          <div class="fs-6 text_footer">
            <img src="{{ Vite::asset('resources/img/svg/icon_footer_header/mdi-light_chart-bar.svg') }}" alt="icon">
            <span>3502 Фондов</span>
          </div>
        </div>

    </div>
  </body>
</html>
