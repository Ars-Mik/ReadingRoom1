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

              <section class="does-electronic-archive">
                <h3>Как работает электронный архив?</h3>

                <div class="container does-container">
                  <div class="does_block">
                    <h4 class="fs-4">Оцифровка документов</h4>
                    <p>Egestas id pretium phasellus ante ac facilisis ut massa. Enim risus integer nulla fermentum. Ac aliquet vitae sem quis turpis neque. Nec ut urna consectetur vitae nunc sed elit lacus.</p>
                    <a href="#">ПОДРОБНЕЕ >></a>
                  </div>
                  <div class="does_block">
                    <h4 class="fs-4">Поиск документов</h4>
                    <p>Egestas id pretium phasellus ante ac facilisis ut massa. Enim risus integer nulla fermentum. Ac aliquet vitae sem quis turpis neque. Nec ut urna consectetur vitae nunc sed elit lacus.</p>
                    <a href="#">ПОДРОБНЕЕ >></a>
                  </div>
                  <div class="does_block">
                      <h4 class="fs-4">Закрытые документы</h4>
                      <p>Egestas id pretium phasellus ante ac facilisis ut massa. Enim risus integer nulla fermentum. Ac aliquet vitae sem quis turpis neque. Nec ut urna consectetur vitae nunc sed elit lacus.</p>
                      <a href="#">ПОДРОБНЕЕ >></a>
                  </div>
                </div>

              </section>
            </div>
        </div>
    </div>

  <footer class="footer">
    <x-footer/>
  </footer>

  </body>
</html>
