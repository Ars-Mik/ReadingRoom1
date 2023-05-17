<div class="container-fluid pt-5">
    <div class="row">
      <div class="col">
        <header class="header_menu">
          <h3 class="float-md-start mb-0"><img src="{{ Vite::asset('resources/img/logo.svg') }}" alt="logo">{{ $title }}</h3>
          <nav class="nav nav-masthead justify-content-center float-md-end nav-style">
            <a class="nav-link fw-bold py-1 px-0" aria-current="page" href="/">Главная</a>
            <a class="nav-link fw-bold py-1 px-0" href="documents">Документы</a>
            <a class="nav-link fw-bold py-1 px-0" href="about">FAQ</a>
            <a class="nav-link fw-bold py-1 px-0" href="#">Контакты</a>
          </nav>
      </header>

      @if ($search == 'true')
        <div class="search">
          <form id="search" class="form-search">
            <input class="input-search" type="text" placeholder="Поиск..." value="">
            <button class="icon-search" type="submit" value=""><i class="bi bi-search"></i></button>
          </form>
          <button class="submit-search">Расширенный поиск</button>
        </div>
      @endif

      </div>
    </div>

   

  </div>



