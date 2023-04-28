<div class="container-fluid pt-5">
    <div class="row">
      <div class="col">
        <header class="header_menu">
          <h3 class="float-md-start mb-0"><img src="{{ Vite::asset('resources/img/logo.svg') }}" alt="logo">{{ $title }}</h3>
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

@if ($search == 'true')
  <div class="d3">
    <form class="formd3">
      <input class="inputd3" type="text" placeholder="Поиск...">
      <button class="buttond3" type="submit"></button>
    </form>
    <button class="button32"><p class="colorW">Расширенный поиск</p></button>
  </div>
@endif

