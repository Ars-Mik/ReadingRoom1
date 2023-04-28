<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	@vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/reset.css', 'resources/css/style.css'])
	<title>Электронный читальный зал</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>

<body class="h-100">
	<header class="header">
		<div class="header_wrapper">
			<x-header title="Электронный читальный зал архивных документов Московской области" : search=true/>
		</div>
	</header>

	<div class="text1box">
		<h1 class="text1">Дело</h1>
	</div>
	<hr class="line">
	<div class="container bottom_box">
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



  {{-- <body class="text-center h-100">

  

  
  
    <div class="container">
        <div class="row">
            <div class="col">
                
            </div>
        </div>
    </div>
  


  <footer class="footer">
    <x-footer/>
  </footer>

  </body>
</html> --}}