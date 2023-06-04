@extends('layouts.app-about')

@section('content')
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
                            <div class="search-dictionary">
                                <input name="documentName" type="search" placeholder="Поиск...">
                            </div>
                            <div class="function">
                                <a href="javascript://" id="btn-clear" class="btn btn-outline-primary"><i class="bi bi-plus-lg"></i></a>
                                <a href="javascript://" id="btn-trash" class="btn btn-outline-primary"><i class="bi bi-trash3"></i></a>
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
                            <div class="search-dictionary">
                                <input name="documentName" type="search" placeholder="Поиск...">
                            </div>
                            <div class="function">
                                <a href="javascript://" id="btn-clear" class="btn btn-outline-primary"><i class="bi bi-plus-lg"></i></a>
                                <a href="javascript://" id="btn-trash" class="btn btn-outline-primary"><i class="bi bi-trash3"></i></a>
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
                            <div class="search-dictionary">
                                <input name="documentName" type="search" placeholder="Поиск...">
                            </div>
                            <div class="function">
                                <a href="javascript://" id="btn-clear" class="btn btn-outline-primary"><i class="bi bi-plus-lg"></i></a>
                                <a href="javascript://" id="btn-trash" class="btn btn-outline-primary"><i class="bi bi-trash3"></i></a>
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


@endsection

@section('script')
    <script>
        $(window).on("load", function() {
            var count = 3;
            var line_search = $('.line_search');
            const from_container = $('.block-form-container');
            var Isline_search = $('.line_search');

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
					<div class="search-dictionary">
						<input name="documentName" type="search" placeholder="Поиск...">
					</div>
					<div class="function">
						<a href="javascript://" id="btn-clear" class="btn btn-outline-primary"><i class="bi bi-plus-lg"></i></a>
						<a href="javascript://" id="btn-trash" class="btn btn-outline-primary"><i class="bi bi-trash3"></i></a>
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
                        let search = $(line_search[i]).find('div')[2];
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
							<input name="documentName[]" type="search" placeholder="Поиск...">
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
                            let appendDictionary = $($($(line_search)[i]).find('div')[2]);
                            let select = $($($(line_search)[i]).find('div')[2]).find('select');
                            if (valueSelected !== 'value1') {
                                $($($(line_search)[i]).find('div')[2]).find('input').remove();
                                let templateSelect = '';

                                if (valueSelected == 'value2') {
                                    templateSelect = `
										<select name="fundName[]" required>
											<option value="" disabled selected>- Выбрать -</option>
											@foreach ($funds as $fund)
                                    <option value='{{$fund->fundName}}'>{{$fund->fundName}}</option>
											@endforeach
                                    </select>
`;
                                    $($($(line_search)[i]).find('div')[2]).find('select').remove();
                                } else if (valueSelected == 'value3') {
                                    templateSelect = `
										<select name="geoName[]" required>
											<option value="" disabled selected>- Выбрать -</option>
											@foreach ($geo_indices as $geo)
                                    <option value='{{$geo->geoName}}'>{{$geo->geoName}}</option>
											@endforeach
                                    </select>
`;
                                    $($($(line_search)[i]).find('div')[2]).find('select').remove();
                                } else if (valueSelected == 'value4'){
                                    templateSelect = `
										<select name="themeName[]" required>
											<option value="" disabled selected>- Выбрать -</option>
											@foreach ($theme_indices as $theme)
                                    <option value='{{$theme->themeName}}'>{{$theme->themeName}}</option>
											@endforeach
                                    </select>
`;
                                    $($($(line_search)[i]).find('div')[2]).find('select').remove();
                                } else if(valueSelected == 'value5'){
                                    templateSelect = `
										<select name="personName[]" required>
											<option value="" disabled selected>- Выбрать -</option>
											@foreach ($person_indices as $person)
                                    <option value='{{$person->personName}}'>{{$person->personName}}</option>
											@endforeach
                                    </select>
`;
                                    $($($(line_search)[i]).find('div')[2]).find('select').remove();
                                }

                                $(appendDictionary).append(templateSelect);
                            }else{
                                if (select.length > 0) {
                                    $($($(line_search)[i]).find('div')[2]).find('select').remove();
                                    $(appendDictionary).append(`
									<input name="documentName[]" type="search" placeholder="Поиск...">
								`);
                                }

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
                    let search = $(line_search[i]).find('div')[2];
                    $(search).find('input').val('');

                    let select_fond = $(line_search[i]).find('div')[2];
                    $(select_fond).find('select').val('value1');

                    let select = $(line_search[i]).find('div')[0];
                    $(select).find('select').val('value1');
                    // if ($(select).find('select').val() == 'value1') {
                    // 	$($($(line_search)[i]).find('div')[3]).find('select').remove();
                    // 	$($($(line_search)[i]).find('div')[3]).append(dictionaryNameDocument);
                    // }

                    let appendDictionary = $($($(line_search)[i]).find('div')[2]);
                    let test = $($($(line_search)[i]).find('div')[2]).find('input');
                    if (test.length == 0) {
                        $($($(line_search)[i]).find('div')[2]).find('select').remove();
                        $(appendDictionary).append(`
						<input name="documentName[]" type="search" placeholder="Поиск...">
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
                        let appendDictionary = $($($(line_search)[i]).find('div')[2]);
                        let select = $($($(line_search)[i]).find('div')[2]).find('select');

                        if (valueSelected !== 'value1') {
                            $($($(line_search)[i]).find('div')[2]).find('input').remove();
                            let templateSelect = '';

                            if (valueSelected == 'value2') {
                                templateSelect = `
										<select name="fundName[]" required>
											<option value="" disabled selected>- Выбрать -</option>
											@foreach ($funds as $fund)
                                <option value='{{$fund->fundName}}'>{{$fund->fundName}}</option>
											@endforeach
                                </select>
`;
                                $($($(line_search)[i]).find('div')[2]).find('select').remove();
                            } else if (valueSelected == 'value3') {
                                templateSelect = `
										<select name="geoName[]" required>
											<option value="" disabled selected>- Выбрать -</option>
											@foreach ($geo_indices as $geo)
                                <option value='{{$geo->geoName}}'>{{$geo->geoName}}</option>
											@endforeach
                                </select>
`;
                                $($($(line_search)[i]).find('div')[2]).find('select').remove();
                            } else if (valueSelected == 'value4'){
                                templateSelect = `
										<select name="themeName[]" required>
											<option value="" disabled selected>- Выбрать -</option>
											@foreach ($theme_indices as $theme)
                                <option value='{{$theme->themeName}}'>{{$theme->themeName}}</option>
											@endforeach
                                </select>
`;
                                $($($(line_search)[i]).find('div')[2]).find('select').remove();
                            } else if(valueSelected == 'value5'){
                                templateSelect = `
										<select name="personName[]" required>
											<option value="" disabled selected>- Выбрать -</option>
											@foreach ($person_indices as $person)
                                <option value='{{$person->personName}}'>{{$person->personName}}</option>
											@endforeach
                                </select>
`;
                                $($($(line_search)[i]).find('div')[2]).find('select').remove();
                            }

                            $(appendDictionary).append(templateSelect);
                        }else{
                            $($($(line_search)[i]).find('div')[2]).find('select').remove();
                            $(appendDictionary).append(`
								<input name="documentName[]" type="search" placeholder="Поиск...">
							`);
                        }
                    });
                }
            }
        });

    </script>
@endsection

