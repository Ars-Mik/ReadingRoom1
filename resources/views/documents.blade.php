<!DOCTYPE html>
<html lang="en" class="h-100">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <meta name="csrf-token" content="{{ csrf_token() }}" />
      @vite(['resources/js/app.js'])
      <title>Электронный архив</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
	  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  </head>

  <body class="text-center h-100">
    <div class="header_about text-dark">
		<div class="row">
			<div class="col">
			<header class="header_menu_about">
				<h3 class="float-md-start mb-0"><img src="{{ Vite::asset('resources/img/logo_about.svg') }}" alt="logo">Электронный каталог архивных документов Московская область</h3>
				<nav class="nav nav-style-about">
					<a class="nav-link text-dark fw-bold py-1 px-0" aria-current="page" href="/">Главная</a>
					<a class="nav-link text-dark fw-bold py-1 px-0" href="documents">Документы</a>
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
				<form name="form" class="options" action="/documents" method="get">
					<div class="block-form-container">
						<div class="line_search" id="line_1">
							<div class="select">
								<div class="custom-arrow">
									<select name="" id="select_1">
										<option value="value1" selected>Название документа </option>
										<option value="value2" >Фонд</option>
										<option value="value3" >Географический индекс</option>
										<option value="value4" >Тематический индекс</option>
										<option value="value5" >Именной индекс</option>
									</select>
								</div>
							</div>
							<div class="dictionary">
								<div class="custom-arrow">
									<select name="select1" id="">
										<option value="value1" selected>Содержит</option>
										<option value="value2" >Не содержит</option>
										<option value="value3" >Слово начинается</option>
										<option value="value4" >Не заполнено</option>
									</select>
								</div>
							</div>
							<div class="search-dictionary">
								<input name="documentName" type="search" placeholder="Поиск...">
							</div>
							<div class="function">
								<a id="btn-clear" class="btn btn-outline-primary"><i class="bi bi-plus-lg"></i></a>
								<a id="btn-trash" class="btn btn-outline-primary"><i class="bi bi-trash3"></i></a>
							</div>
						</div>

						<div class="line_search" id="line_2">
							<div class="select">
								<div class="custom-arrow">
									<select name="" id="select_1">
										<option value="value1" selected>Название документа </option>
										<option value="value2" >Фонд</option>
										<option value="value3" >Географический индекс</option>
										<option value="value4" >Тематический индекс</option>
										<option value="value5" >Именной индекс</option>
									</select>
								</div>
							</div>
							<div class="dictionary">
								<div class="custom-arrow">
									<select name="select1" id="">
										<option value="value1" selected>Содержит</option>
										<option value="value2" >Не содержит</option>
										<option value="value3" >Слово начинается</option>
										<option value="value4" >Не заполнено</option>
									</select>
								</div>
							</div>
							<div class="search-dictionary">
								<input name="documentName" type="search" placeholder="Поиск...">
							</div>
							<div class="function">
								<a id="btn-clear" class="btn btn-outline-primary"><i class="bi bi-plus-lg"></i></a>
								<a id="btn-trash" class="btn btn-outline-primary"><i class="bi bi-trash3"></i></a>
							</div>
						</div>


						<div class="line_search" id="line_3">
							<div class="select">
								<div class="custom-arrow">
									<select name="" id="select_1">
										<option value="value1" selected>Название документа </option>
										<option value="value2" >Фонд</option>
										<option value="value3" >Географический индекс</option>
										<option value="value4" >Тематический индекс</option>
										<option value="value5" >Именной индекс</option>
									</select>
								</div>
							</div>
							<div class="dictionary">
								<div class="custom-arrow">
									<select name="select1" id="">
										<option value="value1" selected>Содержит</option>
										<option value="value2" >Не содержит</option>
										<option value="value3" >Слово начинается</option>
										<option value="value4" >Не заполнено</option>
									</select>
								</div>
							</div>
							<div class="search-dictionary">
								<input name="documentName" type="search" placeholder="Поиск...">
							</div>
							<div class="function">
								<a id="btn-clear" class="btn btn-outline-primary"><i class="bi bi-plus-lg"></i></a>
								<a id="btn-trash" class="btn btn-outline-primary"><i class="bi bi-trash3"></i></a>
							</div>
						</div>
					</div>

					<div class="function_button mx-5">
						<a href="#" class="btn btn-outline-primary btn-lg btn-category" id="add_category">Добавить новый критерий</a>
						<input class="btn btn-primary btn-lg btn-search" id="search" type="submit" value="Поиск">
					</div>
				</form>
			</div>


		</div>
	</div>


	<div class="row">
		<div class="col">
			<div class="pagination-result">
				<p>Найдено объектов: <span>0</span></p>

				<div class="pagination">
					<span class="previous-pagination number"><img src="{{ Vite::asset('resources/img/left.svg') }}" alt="left"></span>
					<div class="pagination-number">
						<a href="#" class="number active">1</a>
						<a href="#" class="number">2</a>
						<a href="#" class="number">3</a>
						<a href="#" class="number">4</a>
						<a href="#" class="number">5</a>
						<span class="dots number">...</span>
						<a href="{{$documentFilter->url($documentFilter->lastPage())}}" class="number">{{ $documentFilter->lastPage()}}</a>
					</div>
					<a href="#" class="next-pagination number"><img src="{{ Vite::asset('resources/img/right.svg') }}" alt="right"></a>
				</div>
			</div>
			<x-table :json="array($documentFilter)"/>
		</div>
	</div>


  <footer class="footer">
    <x-footer/>
  </footer>

  <script>
	$(window).on("load", function() {
		var count = 3;
		var line_search = $('.line_search');
		const from_container = $('.block-form-container');
		var Isline_search = $('.line_search');
		var dictionaryNameDocument = `
		<select name="" id="">
			<option value="value1" selected>Содержит</option>
			<option value="value2" >Не содержит</option>
			<option value="value3" >Слово начинается</option>
			<option value="value4" >Не заполнено</option>
		</select>`;

		var dictionaryOtherСriteria = `
		<select name="" id="">
			<option value="value2" >Равно</option>
			<option value="value3" >Не равно</option>
		</select>`;

		//добавление новых критерий
		$('#add_category').click((e) =>{
			e.preventDefault();
			from_container.find('span').remove();
			count++;
			from_container.append(
				`
				<div class="line_search" id="line_${count}">
					<div class="select">
						<div class="custom-arrow">
							<select name="" id="select_${count}">
								<option value="value1" selected>Название документа </option>
								<option value="value2" >Фонд</option>
								<option value="value3" >Географический индекс</option>
								<option value="value4" >Тематический индекс</option>
								<option value="value5" >Именной индекс</option>
							</select>
						</div>
					</div>
					<div class="dictionary">
						<div class="custom-arrow">
							<select name="" id="">
								<option value="value1" selected>Содержит</option>
								<option value="value2" >Не содержит</option>
								<option value="value3" >Слово начинается</option>
								<option value="value4" >Не заполнено</option>
							</select>
						</div>
					</div>
					<div class="search-dictionary">
						<input name="documentName" type="search" placeholder="Поиск...">
					</div>
					<div class="function">
						<a id="btn-clear" class="btn btn-outline-primary"><i class="bi bi-plus-lg"></i></a>
						<a id="btn-trash" class="btn btn-outline-primary"><i class="bi bi-trash3"></i></a>
					</div>
				</div>
				`
			);


			// удаление критерии по одному
			var line_search = $('.line_search');
			for (let i = 0; i < line_search.length; i++) {
				const btn_trush = $(line_search[i]).find('a');
				$(btn_trush[1]).click(function (e) {
					e.preventDefault();

					$(line_search[i]).remove();
					count = 0;
					let Isline_search = $('.line_search');
					if (Isline_search.length == 0) {
						from_container.append('<span>Нажмите на кнопку "Добавить новый критерий" чтобы появилось поле выбора.</span>');
					}
				});

			}

			//очистка поля критерий
			for (let i = 0; i < line_search.length; i++) {
				const btn_trush = $(line_search[i]).find('a');
				$(btn_trush[0]).click(function (e) {
					e.preventDefault();
					let search = $(line_search[i]).find('div')[4];
					$(search).find('input').val('');
				});
			}

			//очистка поля критерий
			for (let i = 0; i < line_search.length; i++) {
				const btn_trush = $(line_search[i]).find('a');
				$(btn_trush[0]).click(function (e) {
					e.preventDefault();
					let search = $(line_search[i]).find('div')[4];
					$(search).find('input').val('');

					let select_fond = $(line_search[i]).find('div')[2];
					$(select_fond).find('select').val('value1');

					let select = $(line_search[i]).find('div')[0];
					$(select).find('select').val('value1');
					if ($(select).find('select').val() == 'value1') {
						$($($(line_search)[i]).find('div')[3]).find('select').remove();
						$($($(line_search)[i]).find('div')[3]).append(dictionaryNameDocument);
					}

					let appendDictionary = $($($(line_search)[i]).find('div')[4]);
					let test = $($($(line_search)[i]).find('div')[4]).find('input');
					if (test.length == 0) {
						$($($(line_search)[i]).find('div')[4]).find('select').remove();
						$(appendDictionary).append(`
							<input name="documentName" type="search" placeholder="Поиск...">
						`);
					}
				});
			}

			//добавление пуктов с базы данных в поле Фонды, Географисекий индекс и тд
			for (let i = 0; i < $(line_search).length; i++) {
				let search_dictionary = $(line_search[i]).find('div');
				if ($(search_dictionary).attr('class') == 'select') {
					var select = $(search_dictionary).find('select');

					$(select[0]).change(function (e) {
						e.preventDefault();

						var optionSelected = $(this).find("option:selected");
						var valueSelected  = optionSelected.val();
						let appendDictionary = $($($(line_search)[i]).find('div')[4]);
						let select = $($($(line_search)[i]).find('div')[4]).find('select');
						if (valueSelected !== 'value1') {
							$($($(line_search)[i]).find('div')[4]).find('input').remove();
								let templateSelect = '';

								if (valueSelected == 'value2') {
									templateSelect = `
										<select name="fundName[]" id="">
											@foreach ($funds as $fund)
												<option value='{{$fund->fundName}}'>{{$fund->fundName}}</option>
											@endforeach
										</select>
									`;
									$($($(line_search)[i]).find('div')[4]).find('select').remove();
								} else if (valueSelected == 'value3') {
									templateSelect = `
										<select name="geoName[]" id="">
											@foreach ($geo_indices as $geo)
												<option value='{{$geo->geoName}}'>{{$geo->geoName}}</option>
											@endforeach
										</select>
									`;
									$($($(line_search)[i]).find('div')[4]).find('select').remove();
								} else if (valueSelected == 'value4'){
									templateSelect = `
										<select name="themeName[]" id="">
											@foreach ($theme_indices as $theme)
												<option value='{{$theme->themeName}}'>{{$theme->themeName}}</option>
											@endforeach
										</select>
									`;
									$($($(line_search)[i]).find('div')[4]).find('select').remove();
								} else if(valueSelected == 'value5'){
									templateSelect = `
										<select name="personName[]" id="">
											@foreach ($person_indices as $person)
												<option value='{{$person->personName}}'>{{$person->personName}}</option>
											@endforeach
										</select>
									`;
									$($($(line_search)[i]).find('div')[4]).find('select').remove();
								}

								$(appendDictionary).append(templateSelect);
						}else{
							if (select.length > 0) {
								$($($(line_search)[i]).find('div')[4]).find('select').remove();
								$(appendDictionary).append(`
									<input name="documentName[]" type="search" placeholder="Поиск...">
								`);
							}

						}
					});
				}
			}

			for (let i = 0; i < $(line_search).length; i++) {
				let search_dictionary = $(line_search[i]).find('div');
				if ($(search_dictionary).attr('class') == 'select') {
					var select = $(search_dictionary).find('select');

					$(select[0]).change(function (e) {
						e.preventDefault();

						var optionSelected = $(this).find("option:selected");
						var valueSelected  = optionSelected.val();
						let appendDictionary = $($($(line_search)[i]).find('div')[4]);
						let select = $($($(line_search)[i]).find('div')[4]).find('select');

						if (valueSelected == 'value1') {
							$($($(line_search)[i]).find('div')[3]).find('select').remove();
							$($($(line_search)[i]).find('div')[3]).append(dictionaryNameDocument);
						}else{
							$($($(line_search)[i]).find('div')[3]).find('select').remove();
							$($($(line_search)[i]).find('div')[3]).append(dictionaryOtherСriteria);
						}
					});
				}
			}
		});

		// удаление критерии по одному
		for (let i = 0; i < line_search.length; i++) {

			const btn_trush = $(line_search[i]).find('a');
			$(btn_trush[1]).click(function (e) {
				e.preventDefault();

				$(line_search[i]).remove();
				count = 0;
				var Isline_search = $('.line_search');
				console.log(Isline_search);
				if (Isline_search.length == 0 && Isline_search != false) {
					from_container.append('<span>Нажмите на кнопку "Добавить новый критерий" чтобы появилось поле выбора.</span>');
					Isline_search = false;
					console.log(Isline_search.length);
				}
			});
		}

		//очистка поля критерий
		for (let i = 0; i < line_search.length; i++) {
			const btn_trush = $(line_search[i]).find('a');
			$(btn_trush[0]).click(function (e) {
				e.preventDefault();
				let search = $(line_search[i]).find('div')[4];
				$(search).find('input').val('');

				let select_fond = $(line_search[i]).find('div')[2];
				$(select_fond).find('select').val('value1');

				let select = $(line_search[i]).find('div')[0];
				$(select).find('select').val('value1');
				if ($(select).find('select').val() == 'value1') {
					$($($(line_search)[i]).find('div')[3]).find('select').remove();
					$($($(line_search)[i]).find('div')[3]).append(dictionaryNameDocument);
				}

				let appendDictionary = $($($(line_search)[i]).find('div')[4]);
				let test = $($($(line_search)[i]).find('div')[4]).find('input');
				if (test.length == 0) {
					$($($(line_search)[i]).find('div')[4]).find('select').remove();
					$(appendDictionary).append(`
						<input name="documentName" type="search" placeholder="Поиск...">
					`);
				}
			});
		}

		//добавление пуктов с базы данных в поле Фонды, Географисекий индекс и тд
		for (let i = 0; i < $(line_search).length; i++) {
			let search_dictionary = $(line_search[i]).find('div');
				if ($(search_dictionary).attr('class') == 'select') {
					var select = $(search_dictionary).find('select');

					$(select[0]).change(function (e) {
						e.preventDefault();

						var optionSelected = $(this).find("option:selected");
						var valueSelected  = optionSelected.val();
						let appendDictionary = $($($(line_search)[i]).find('div')[4]);
						let select = $($($(line_search)[i]).find('div')[4]).find('select');

						if (valueSelected !== 'value1') {
							$($($(line_search)[i]).find('div')[4]).find('input').remove();
								let templateSelect = '';

								if (valueSelected == 'value2') {
									templateSelect = `
										<select name="fundName[]" id="">
											@foreach ($funds as $fund)
												<option value='{{$fund->fundName}}'>{{$fund->fundName}}</option>
											@endforeach
										</select>
									`;
									$($($(line_search)[i]).find('div')[4]).find('select').remove();
								} else if (valueSelected == 'value3') {
									templateSelect = `
										<select name="geoName[]" id="">
											@foreach ($geo_indices as $geo)
												<option value='{{$geo->geoName}}'>{{$geo->geoName}}</option>
											@endforeach
										</select>
									`;
									$($($(line_search)[i]).find('div')[4]).find('select').remove();
								} else if (valueSelected == 'value4'){
									templateSelect = `
										<select name="themeName[]" id="">
											@foreach ($theme_indices as $theme)
												<option value='{{$theme->themeName}}'>{{$theme->themeName}}</option>
											@endforeach
										</select>
									`;
									$($($(line_search)[i]).find('div')[4]).find('select').remove();
								} else if(valueSelected == 'value5'){
									templateSelect = `
										<select name="personName[]" id="">
											@foreach ($person_indices as $person)
												<option value='{{$person->personName}}'>{{$person->personName}}</option>
											@endforeach
										</select>
									`;
									$($($(line_search)[i]).find('div')[4]).find('select').remove();
								}

								$(appendDictionary).append(templateSelect);
						}else{
							$($($(line_search)[i]).find('div')[4]).find('select').remove();
							$(appendDictionary).append(`
								<input name="documentName[]" type="search" placeholder="Поиск...">
							`);
						}
					});
				}
		}


		for (let i = 0; i < $(line_search).length; i++) {
			let search_dictionary = $(line_search[i]).find('div');
			if ($(search_dictionary).attr('class') == 'select') {
				var select = $(search_dictionary).find('select');

				$(select[0]).change(function (e) {
					e.preventDefault();

					var optionSelected = $(this).find("option:selected");
					var valueSelected  = optionSelected.val();
					let appendDictionary = $($($(line_search)[i]).find('div')[4]);
					let select = $($($(line_search)[i]).find('div')[4]).find('select');

					if (valueSelected == 'value1') {
						$($($(line_search)[i]).find('div')[3]).find('select').remove();
						$($($(line_search)[i]).find('div')[3]).append(dictionaryNameDocument);
					}else{
						$($($(line_search)[i]).find('div')[3]).find('select').remove();
						$($($(line_search)[i]).find('div')[3]).append(dictionaryOtherСriteria);
					}
				});
			}
		}


	});
  </script>


  </body>
</html>
