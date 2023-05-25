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
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/about_document.css') }}">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  </head>

  <body class="text-center h-100">
    <div class="header_about text-dark">
		<div class="row">
			<div class="col">
			<header class="header_menu_about">
				<h3 class="float-md-start mb-0"><img src="{{ Vite::asset('resources/img/logo_about.svg') }}" alt="logo">Электронный каталог архивных документов Астраханской области</h3>
				<nav class="nav nav-style-about">
					<a class="nav-link text-dark fw-bold py-1 px-0" aria-current="page" href="/">Главная</a>
					<a class="nav-link text-dark fw-bold py-1 px-0" href="documents">Документы</a>
					<a class="nav-link text-dark fw-bold py-1 px-0" href="about">Помощь</a>
					<a class="nav-link text-dark fw-bold py-1 px-0 link-auth"  href="#">Войти</a>
					<a class="nav-link text-dark fw-bold py-1 px-0 burger" id="burger" href="javascript://"><i class="bi bi-list"></i></a>
				</nav>
				<div class="burger-menu burger-menu-hidden">
					<a href="admin"><img src="{{ Vite::asset('resources/img/admin_panel.svg') }}" alt="admin_panel"> Вход для администратора</a>
				</div>
			</header>
			<div class="logo_banner">
				<div class="box-text">
					<h4>Поиск документов</h4>
				</div>
			</div>
			</div>
		</div>
    </div>


	<div class="row">
		<div class="col">
            <ul class="breadcrumb container">
                <li><a href="document">Дело</a></li>
                <li>Ф. 719 Оп. 1 Д. 1 Пример “Актовые записи о рождении, браке и смерти”</li>
            </ul>

            <div class="container-fluid container_about">
                <div class="container container-body">
                    <a class="btn btn-primary btn-lg" style="width: 316px; height: 53px;" href="{{ asset('/storage/pdf/') }}/">Читать документ</a>
                    {{-- кнопка для закрытого документа --}}
                    {{-- <a class="btn btn-black btn-lg" style="width: 316px; height: 53px;" href="">Отправить заявку</a>  --}}
                    {{$documentSelect}}
                    <div class="table_info">
                        <span>Общая информация</span>
                        <table style="width: 100%">
                            <tr>
                                <th>Архив</th>
                                <th>Фонд</th>
                                <th>Номер фонда</th>
                                <th>Номер описи</th>
                                <th>Номер дела</th>
                                <th>Заголовок</th>
                                <th>Географический указатель</th>
                                <th>Тематический указатель</th>
                                <th>Именной указатель</th>
                                <th>Дата появления</th>
                            </tr>
                            <script>

                            </script>
                            <tr>
                                <td>Государственный архив Астраханской области</td>
                                <td>Астраханский Фонд</td>
                                <td>2456</td>
                                <td>2</td>
                                <td>4</td>
                                <td>Пример “Актовые записи о рождении, браке и смерти”</td>
                                <td>г. Астрахань; Волгоградская обл.</td>
                                <td>Письма с фронта; Образование</td>
                                <td>Георгий Леонидович</td>
                                <td>1943г.</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
		</div>
	</div>


	

  <footer class="footer">
    <x-footer/>
  </footer>