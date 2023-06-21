<div class="header_about text-dark">
    <div class="row">
        <div class="col">
            <header class="header_menu_about">
                <h3 class="float-md-start mb-0"><img src="{{ Vite::asset('resources/img/logo_about.svg') }}" alt="logo">Электронный каталог архивных документов Астраханской области</h3>
                <nav class="nav nav-style-about">
                    <a class="nav-link text-dark fw-bold py-1 px-0" aria-current="page" href="/">Главная</a>
                    <a class="nav-link text-dark fw-bold py-1 px-0" href="/funds">Фонды</a>
                    <a class="nav-link text-dark fw-bold py-1 px-0" href="/documents">Документы</a>
                    <a class="nav-link text-dark fw-bold py-1 px-0" href="/about">Помощь</a>
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
                                <li><a class="dropdown-item" href="/" id="logout" disabled>
                                        <img style="width: 2rem; margin-right: 1rem;" src="{{ Vite::asset('resources/img/svg/log-out.svg') }}" alt="">
                                        Выйти
                                    </a></li>
                            </ul>
                        </div>
                    @else
                        <a class="nav-link text-dark fw-bold py-1 px-0 link-auth"  href="/login">Войти</a>
                    @endauth
                    <a class="nav-link text-dark fw-bold py-1 px-0 burger" id="burger" href="javascript://"><i class="bi bi-list"></i></a>
                </nav>
                <div class="burger-menu burger-menu-hidden">
                    <a href="/admin"><img src="{{ Vite::asset('resources/img/admin_panel.svg') }}" alt="admin_panel"> Вход для администратора</a>
                </div>
            </header>
            @if(!Route::is(['client.edit', 'client.orders']))
                <div class="logo_banner">
                    <div class="box-text">
                        <h4>Поиск документов</h4>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
