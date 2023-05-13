<!DOCTYPE html>
<html lang="en" class="h-100">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      @vite(['resources/js/app.js'])
      <title>Электронный архив</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
	  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  </head>

  <body class="text-center h-100">
    <div class="header_about text-dark">
		<div class="row">
			<div class="col">
			<header class="header_menu_about">
				<h3 class="float-md-start mb-0"><img src="{{ Vite::asset('resources/img/logo_about.svg') }}" alt="logo">Электронный каталог архивных документов Московской области</h3>
				<nav class="nav nav-style-about">
					<a class="nav-link text-dark fw-bold py-1 px-0" aria-current="page" href="/">Главная</a>
					<a class="nav-link text-dark fw-bold py-1 px-0" href="about">Документы</a>
					<a class="nav-link text-dark fw-bold py-1 px-0" href="about">Помощь</a>
					<a class="nav-link text-dark fw-bold py-1 px-0 link-auth" href="#">Войти</a>
				</nav>
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

			<div class="Case-Block">
				<h3 class="fs-3">Дело</h3>
				<form class="options" action="" method="get">
					<div class="block-form-container">
						<div class="line_search">
							<div class="select">
								<div class="custom-arrow">
									<select name="" id="">
										<option value="value1" selected>Фонд</option>
									</select>
								</div>
							</div>
							<div class="dictionary">
								<div class="custom-arrow">
									<select name="" id="">
										<option value="value1" selected>Содержит слово</option>
									</select>
								</div>
							</div>
							<div class="search-dictionary">
								<input type="search" placeholder="Поиск...">
							</div>
							<div class="function">
								<button class="btn btn-outline-primary"><i class="bi bi-plus-lg"></i></button>
								<button class="btn btn-outline-primary"><i class="bi bi-trash3"></i></button>
							</div>
						</div>

						<div class="line_search">
							<div class="select">
								<div class="custom-arrow">
									<select name="" id="">
										<option value="value1" selected>Фонд</option>
									</select>
								</div>
							</div>
							<div class="dictionary">
								<div class="custom-arrow">
									<select name="" id="">
										<option value="value1" selected>Содержит слово</option>
									</select>
								</div>
							</div>
							<div class="search-dictionary">
								<input type="search" placeholder="Поиск...">
							</div>
							<div class="function">
								<button class="btn btn-outline-primary"><i class="bi bi-plus-lg"></i></button>
								<button class="btn btn-outline-primary"><i class="bi bi-trash3"></i></button>
							</div>
						</div>
					</div>
					
					<div class="function_button mx-4">
						<input class="btn btn-outline-primary btn-lg btn-category" id="add_category" type="submit" value="Добавить новый критерий">
						<input class="btn btn-primary btn-lg btn-search" id="search" type="submit" value="Поиск">
					</div>
				</form>
			</div>


		</div>
	</div>


	<div class="row">
		<div class="col">
			<div class="pagination-result">
				<p>Найдено объектов: <span>100</span></p>

				<div class="pagination">
					<span class="previous-pagination number"><img src="{{ Vite::asset('resources/img/left.svg') }}" alt="left"></span>
					<div class="pagination-number">
						<a href="#" class="number active">1</a>
						<a href="#" class="number">2</a>
						<a href="#" class="number">3</a>
						<a href="#" class="number">4</a>
						<a href="#" class="number">5</a>
						<span href="#" class="dots number">...</span>
						<a href="#" class="number">99</a>
					</div>
					<a href="#" class="next-pagination number"><img src="{{ Vite::asset('resources/img/right.svg') }}" alt="right"></a>
				</div>
			</div>
			<x-table/>
		</div>
	</div>

	

  <footer class="footer">
    <x-footer/>
  </footer>

  </body>
</html>