<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, instal-scale=1.0">
	<meta http-equiv="X-UA-COmpatible" content="ie=edge">
	<meta name="robots" content="noindex">
	<title>Электронный читальный зал</title>
    @vite(['resources/css/reset.css', 'resources/js/app.js'])
	@vite(['resources/css/style.css', 'resources/js/app.js'])
	<link rel="stylesheet" href="./css/reset.css">
	<link rel="stylesheet" href="./css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="http://ваш_сайт/css/font-awesome.css">


</head>
<body>
	<header class="header">
		<div class="header_wrapper">
			<div class="wrapper">
				<div class="header_logo">
					<a href ="/" class="header_logo-link"></a>
						<img src="{{ Vite::asset('resources/img/logo.svg') }}" alt="Электронный читальный" class="header_logo-pic">
				</div>
				<h1 class="title1">Электронный читальный зал архивных документов Московской области</h1>
			</div>
			<div class="navigation">
				<nav class "header_nav">
				<tr>
					<td>
						<a href="/"  style="text-decoration: none; "class="header_link">ГЛАВНАЯ</a>
					</td>
					<td>
						<a href="#!"  style="text-decoration: none; " class="header_link">ДОКУМЕНТЫ</a>
					</td>
					<td>
						<a href="#!"  style="text-decoration: none; " class="header_link">FAQ</a>
					</td>
					<td>
						<a href="#!"  style="text-decoration: none; " class="header_link">Контакты</a>
					</td>
					<td>
						<button class="strochki"><img src="{{ Vite::asset('resources/img/svg/ara.svg') }}" alt="-"></button>
					</td>
				</tr>								
				</nav>
			</div>
		</div>
		
		<div class="d3">
			<form class="formd3">
						<input class="inputd3" type="text" placeholder="Поиск...">
						<button class="buttond3" type="submit"></button>
			</form>
		
						<button class="button32"><p class="colorW">Расширенный поиск</p></button>
		</div>
	</header>
	<div class="text1box">
		<h1 class="text1">Дело</h1>
	</div>
	<hr class="line">
	<div class="bottom_box">
		<table >
			<tr>
				<td class="optionn">
					<div class="select">	
						<select id="selectvalue" class="button1">
							<option>Фонд</option>
							<option>Фонд</option>
							<option>Фонд</option>
							<option>Фонд</option>
						</select>
					</div>
				</td>
				<td class="optionn">
					<div class="select">	
						<select id="selectvalue" class="button2" >
							<option>Содержит слово</option>
							<option>Содержит слово</option>
							<option>Содержит слово</option>
							<option>Содержит слово</option>
						</select>
					</div>
				</td>
				<td>
					<div class="d1">
					<form>
						<input type="text" class="find_box" placeholder="Поиск...">
						</form>
					</div>
				</td>
				<td>
					<button class="button_box">+</button>
				</td>
				<td>
					<button class="button_trash"><img src="{{ Vite::asset('resources/img/svg/trash.svg') }}" alt="-"></button>
				</td>
			</tr>
			<tr>
				<td class="optionn">
					<div class="select">	
						<select id="selectvalue" class="button1">
							<option>Фонд</option>
							<option>Фонд</option>
							<option>Фонд</option>
							<option>Фонд</option>
						</select>
					</div>
				</td>
				<td class="optionn">
					<div class="select">
						<select id="selectvalue" class="button2">
							<option>Содержит слово</option>
							<option>Содержит слово</option>
							<option>Содержит слово</option>
							<option>Содержит слово</option>
						</select>
					</div>
				</td>
				<td>
					<div class="d1">
						<form>
							<input type="text" class="find_box" placeholder="Поиск...">
						</form>
					</div>
					<td>
						<button class="button_box">+</button>
					</td>
					<td>
						<button class="button_trash"><img src="{{ Vite::asset('resources/img/svg/trash.svg') }}" alt="-" class="trash"></button>
					</td>
				</td>
			</tr>
			<tr>
				<td class="optionn">
					<div class="select">	
						<select id="selectvalue" class="button1">
							<option>Фонд</option>
							<option>Фонд</option>
							<option>Фонд</option>
							<option>Фонд</option>
						</select>
					</div>
				</td>
				<td class="optionn">
					<div class="select">	
						<select id="selectvalue" class="button2">
							<option>Содержит слово</option>
							<option>Содержит слово</option>
							<option>Содержит слово</option>
							<option>Содержит слово</option>
						</select>
					</div>
				</td>
				<td>
					<div class="d1">
						<form>
							<input type="text" class="find_box" placeholder="Поиск...">
						</form>
					</div>
				<td>
					<button class="button_box">+</button>
				</td>
				<td>
					<button class="button_trash"><img src="{{ Vite::asset('resources/img/svg/trash.svg') }}" alt="-" class="trash"></button>
				</td>
				</td>
			</tr>
			<td class="optionn">
					<button id="selectvalue" class="button4" style="background-color:white;">Добавить новый критерий</button>	
			</td>
				<div class="optionn2">
					<button class="button3"><p class="colorW">Поиск</p></button>
				</div>
		</table>
	</div>
	<hr class="line">
		
	<div class="table">	
		<iframe src="dist/table.html" width="100%" height="1150" frameborder="1"> </iframe>	
	</div>
		
		
	<hr class="line">
	<footer class="footer">
		<div>
		<table>
			<tr>
				<td>
					<div class="text2">
					электронный архив 
					</div>
					<div class="text3">
					какой-то крутой текст для описания архива в двух словах
					</div>	
				</td>
				<td class="info">
					<div class="text4">
					msk.archiv@mail.com
					</div>
					<div class="text5">
					Москва, улица какая-то там 25
					</div>
					<div>
							<a href="#!"  style="text-decoration: none; "class="text6">Vkontakte</a>
							<a href="#!"  style="text-decoration: none; "class="text6">Facebook</a>
							<a href="#!"  style="text-decoration: none; "class="text6">Instagram</a>
					</div>	
				</td>
			</tr>
		</table>
		</div>
			
			
	</footer>
</body>
</html>

