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
    <div class="header_cover_about text-bg-dark">
        <x-header title="Электронный читальный зал архивных документов Московской области" : search="true"/>
    </div>
  
  
    <div class="container-fluid">
        <div class="row">
            <div class="col">

				<div class="Case-Block">
					<h3 class="fs-3">Дело</h3>
					<form class="options" action="" method="get">

							
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


						<div class="function_button mx-4">
							<input class="btn btn-outline-primary btn-lg btn-category" id="add_category" type="submit" value="Добавить новый критерий">
							<input class="btn btn-primary btn-lg btn-search" id="search" type="submit" value="Поиск">
						</div>


						
					</form>
				</div>


            </div>
        </div>
    </div>

  <footer class="footer">
    <x-footer/>
  </footer>

  </body>
</html>