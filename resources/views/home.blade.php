<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Электронный архив</title>
     <!-- <link rel="stylesheet" href="/css/app.css">  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

    <style>

      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>


</head>

<body class="text-center h-100">

<div class="header_cover h-100 text-bg-dark">
  <div class="container-fluid pt-5">
    <div class="row">
      <div class="col">
        <header class="header_menu">
          <h3 class="float-md-start mb-0"><img src="{{ Vite::asset('resources/img/logo.svg') }}" alt="logo">Электронный архив</h3>
          <nav class="nav nav-masthead justify-content-center float-md-end nav-style">
            <a class="nav-link fw-bold py-1 px-0" aria-current="page" href="/">Главная</a>
            <a class="nav-link fw-bold py-1 px-0" href="about">Документы</a>
            <a class="nav-link fw-bold py-1 px-0" href="about">FAQ</a>
            <a class="nav-link fw-bold py-1 px-0" href="#">Контакты</a>
          </nav>
      </header>
      </div>
    </div>
  </div>

  <div class="container-fluid no-padding">
    <div class="row" style="position: relative;">
      <div class="col">
        <h1 class="fs-1 m-auto mb-5">Электронный читальный зал архивных документов Московской области</h1>
        <!-- <p class="lead">Cover is a one-page template for building simple and beautiful home pages. Download, edit the text, and add your own fullscreen background photo to make it your own.</p> -->
        <p class="lead btn-center">
          <a href="about" class="btn btn-lg rounded-pill btn-size btn-primary">Перейти к просмотру документов</a>
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
      <span>13 Фондов</span>
    </div>
  </div>

</div>


<div class="container">
  <div class="row">
    <div class="col">
        
      <section class="search-document-block">
          <h2>Поиск миллионов документов</h2>
          <p>
            Откройте для себя огромную коллекцию исторических записей - введите название документа, номер фонда или другие данные, чтобы найти необходимую информацию. Наши точные результаты помогут Вам найти больше информации, чем Вы могли себе представить.
          </p>
          <div class="img-document">
              <img src="{{ Vite::asset('resources/img/img_document/photo1.png') }}" alt="img_document">
              <img src="{{ Vite::asset('resources/img/img_document/docsphoto2.png') }}" alt="img_document">
              <img src="{{ Vite::asset('resources/img/img_document/letters3.png') }}" alt="img_document">
              <img src="{{ Vite::asset('resources/img/img_document/paperold4.png') }}" alt="img_document">
              <img src="{{ Vite::asset('resources/img/img_document/passport5.png') }}" alt="img_document">
              <img src="{{ Vite::asset('resources/img/img_document/letter 1.png') }}" alt="img_document">
              <img src="{{ Vite::asset('resources/img/img_document/doc6.png') }}" alt="img_document">
          </div>
      </section>


    </div>
  </div>
</div>
    
    {{-- <div class=" d-flex w-100 h-100 flex-column">

      <main class="px-3">
        
      </main>
    </div> --}}
</body>


<footer class="mt-auto text-white-50">
</footer>


</html>