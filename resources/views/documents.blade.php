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
                                        <option value="value1" selected>Название документа</option>
                                        <option value="value3" >Географический указатель</option>
                                        <option value="value5" >Именной индекс</option>
                                        <option value="value6" >Номер дела</option>
                                        <option value="value7" >Номер описи</option>
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
                                        <option value="value2" selected>Фонд</option>
                                        <option value="value3" >Географический указатель</option>
                                        <option value="value5" >Именной индекс</option>
                                        <option value="value6" >Номер дела</option>
                                        <option value="value7" >Номер описи</option>
                                    </select>
                                </div>
                            </div>
                            <div class="search-dictionary">
                                <select name="fundName[]">
                                    <option value="" disabled selected>- Выбрать -</option>
                                    @foreach ($funds as $fund)
                                        <option value='{{$fund->fundName}}'>{{$fund->fundName}}</option>
                                    @endforeach
                                </select>
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
                                        <option value="value3">Географический указатель</option>
                                        <option value="value4" selected>Вид документа</option>
                                        <option value="value5" >Именной индекс</option>
                                        <option value="value6" >Номер дела</option>
                                        <option value="value7" >Номер описи</option>
                                    </select>
                                </div>
                            </div>
                            <div class="search-dictionary">
                                <select name="typeName[]">
                                        <option id="placeholder" value="" disabled selected>- Выбрать -</option>
                                    @foreach ($document_types as $type)
                                        <option value='{{$type->typeName}}'>{{$type->typeName}}</option>
                                    @endforeach
                                    </select>
                            </div>
                            <div class="function">
                                <a href="javascript://" id="btn-clear" class="btn btn-outline-primary"><i class="bi bi-plus-lg"></i></a>
                                <a href="javascript://" id="btn-trash" class="btn btn-outline-primary"><i class="bi bi-trash3"></i></a>
                            </div>
                        </div>




                        <div class="line_search" id="line_4">
                            <div class="select">
                                <div class="custom-arrow">
                                    <select name="" id="select_1">
                                        <option value="value3" >Географический указатель</option>
                                        <option value="value4" >Вид документа</option>
                                        <option value="value5" selected>Именной индекс</option>
                                        <option value="value6" >Номер дела</option>
                                        <option value="value7" >Номер описи</option>
                                    </select>
                                </div>
                            </div>
                            <div class="search-dictionary">
                                <select name="personName[]">
                                    <option value="" disabled selected>- Выбрать -</option>
                                    @foreach ($person_indices as $person)
                                         <option value='{{$person->personName}}'>{{$person->personName}}</option>
                                    @endforeach
                                </select>
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


            </div>
            <x-table :json="array($documentFilter)"/>
        </div>
    </div>


@endsection

@section('script')
    <script>
        const criteriaOptions = {
            value1: '<option value="value1">Название документа</option>',
            value2: '<option value="value2">Фонд</option>',
            value3: '<option value="value3">Географический указатель</option>',
            value4: '<option value="value4">Вид документа</option>',
            value5: '<option value="value5">Именной индекс</option>',
            value6: '<option value="value6">Номер дела</option>',
            value7: '<option value="value7">Номер описи</option>',
        }

        $(window).on("load", function() {
            var count = 3;
            var line_search = $('.line_search');
            const from_container = $('.block-form-container');
            var Isline_search = $('.line_search');
            var is_value = false;

            addEventListeners()

            //добавление новых критерий
            $('#add_category').click((e) =>{
                e.preventDefault();
                from_container.find('span').remove();
                count++;

                let selected = selectedCriteria()

                from_container.append(
                    '<div class="line_search" id="line_'+count+'">'+
                        '<div class="select">'+
                            '<div class="custom-arrow">'+
                                '<select name="" id="select_'+count+'">'+
                                    (selected.includes('value1') ? '' : '<option value="value1" selected>Название документа</option>')+
                                    (selected.includes('value2') ? '' : '<option value="value2" >Фонд</option>')+
                                    (selected.includes('value3') ? '' : '<option value="value3" >Географический указатель</option>')+
                                    (selected.includes('value4') ? '' : '<option value="value4" >Вид документа</option>')+
                                    '<option value="value5" >Именной индекс</option>'+
                                    (selected.includes('value6') ? '' : '<option value="value6" >Номер дела</option>')+
                                    (selected.includes('value7') ? '' : '<option value="value7" >Номер описи</option>')+
                                '</select>'+
                            '</div>'+
                        '</div>'+
                        '<div class="search-dictionary">'+
                            '<input name="documentName" type="search" placeholder="Поиск...">'+
                        '</div>'+
                        '<div class="function">'+
                            '<a href="javascript://" id="btn-clear" class="btn btn-outline-primary"><i class="bi bi-plus-lg"></i></a>'+
                            '<a href="javascript://" id="btn-trash" class="btn btn-outline-primary"><i class="bi bi-trash3"></i></a>'+
                        '</div>'+
                    '</div>'
                );

                // удаление критерии по одному
                var line_search = $('.line_search');
                for (let i = 0; i < line_search.length; i++) {
                    const btn_trush = $(line_search[i]).find('a');
                    $(btn_trush[1]).click(function (e) {
                        e.preventDefault();

                        $(line_search[i]).remove();

                        let Isline_search = $('.line_search');
                        if (Isline_search.length == 0) {
                            from_container.append('<span>Нажмите на кнопку "Добавить новый критерий" чтобы появилось поле выбора.</span>');
                        }
                        syncCriteria()
                    });

                }

                //очистка поля критерий
                for (let i = 0; i < line_search.length; i++) {
                    const btn_trush = $(line_search[i]).find('a');
                    $(btn_trush[0]).click(function (e) {
                        e.preventDefault();
                        let search = $(line_search[i]).find('div')[2];
                        $(search).find('input').val('');
                        syncCriteria()
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
                        syncCriteria()
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
                            if (valueSelected !== 'value1' && valueSelected !== 'value6' && valueSelected !== 'value7') {
                                $($($(line_search)[i]).find('div')[2]).find('input').remove();
                                let templateSelect = '';

                                if (valueSelected == 'value2') {
                                    templateSelect = `
										<select name="fundName[]">
											<option value="" disabled selected>- Выбрать -</option>
											@foreach ($funds as $fund)
                                    <option value='{{$fund->fundName}}'>{{$fund->fundName}}</option>
											@endforeach
                                    </select>`;
                                    $($($(line_search)[i]).find('div')[2]).find('select').remove();
                                } else if (valueSelected == 'value3') {
                                    templateSelect = `
										<select name="geoName[]">
											<option value="" disabled selected>- Выбрать -</option>
											@foreach ($geo_indices as $geo)
                                    <option value='{{$geo->geoName}}'>{{$geo->geoName}}</option>
											@endforeach
                                    </select>`;
                                    $($($(line_search)[i]).find('div')[2]).find('select').remove();
                                } else if (valueSelected == 'value4'){
                                    templateSelect = `
										<select name="typeName[]">
											<option value="" disabled selected>- Выбрать -</option>
											@foreach ($document_types as $type)
                                    <option value='{{$type->typeName}}'>{{$type->typeName}}</option>
											@endforeach
                                    </select>`;
                                    $($($(line_search)[i]).find('div')[2]).find('select').remove();
                                } else if(valueSelected == 'value5'){
                                    templateSelect = `
										<select name="personName[]">
											<option value="" disabled selected>- Выбрать -</option>
											@foreach ($person_indices as $person)
                                    <option value='{{$person->personName}}'>{{$person->personName}}</option>
											@endforeach
                                    </select>`;
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
                            syncCriteria()
                        });
                    }
                }
            });

            function addEventListeners() {
                // удаление критерии по одному
                for (let i = 0; i < line_search.length; i++) {

                    const btn_trush = $(line_search[i]).find('a');
                    $(btn_trush[1]).click(function (e) {
                        e.preventDefault();

                        $(line_search[i]).remove();

                        var Isline_search = $('.line_search');
                        if (Isline_search.length == 0 && Isline_search != false) {
                            from_container.append('<span>Нажмите на кнопку "Добавить новый критерий" чтобы появилось поле выбора.</span>');
                            Isline_search = false;
                            // console.log(Isline_search.length);
                        }
                        syncCriteria()
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
                        syncCriteria()
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

                            if (valueSelected !== 'value1' && valueSelected !== 'value6' && valueSelected !== 'value7') {
                                $($($(line_search)[i]).find('div')[2]).find('input').remove();
                                let templateSelect = '';

                                if (valueSelected == 'value2') {
                                    templateSelect = `
										<select name="fundName[]">
											<option value="" disabled selected>- Выбрать -</option>
											@foreach ($funds as $fund)
                                    <option value='{{$fund->fundName}}'>{{$fund->fundName}}</option>
											@endforeach
                                    </select>`;
                                    $($($(line_search)[i]).find('div')[2]).find('select').remove();
                                } else if (valueSelected == 'value3') {
                                    templateSelect = `
										<select name="geoName[]">
											<option value="" disabled selected>- Выбрать -</option>
											@foreach ($geo_indices as $geo)
                                    <option value='{{$geo->geoName}}'>{{$geo->geoName}}</option>
											@endforeach
                                    </select>`;
                                    $($($(line_search)[i]).find('div')[2]).find('select').remove();
                                } else if (valueSelected == 'value4'){
                                    templateSelect = `
										<select name="typeName[]">
											<option value="" disabled selected>- Выбрать -</option>
											@foreach ($document_types as $type)
                                    <option value='{{$type->typeName}}'>{{$type->typeName}}</option>
											@endforeach
                                    </select>`;
                                    $($($(line_search)[i]).find('div')[2]).find('select').remove();
                                } else if(valueSelected == 'value5'){
                                    templateSelect = `
										<select name="personName[]">
											<option value="" disabled selected>- Выбрать -</option>
											@foreach ($person_indices as $person)
                                    <option value='{{$person->personName}}'>{{$person->personName}}</option>
											@endforeach
                                    </select>`;
                                    $($($(line_search)[i]).find('div')[2]).find('select').remove();
                                }

                                $(appendDictionary).append(templateSelect);
                            }else{
                                $($($(line_search)[i]).find('div')[2]).find('select').remove();
                                $(appendDictionary).append(`
								<input name="documentName[]" type="search" placeholder="Поиск...">
							`);
                            }
                            syncCriteria()
                        });
                    }
                }
            }

            function syncCriteria() {
                let selected = selectedCriteria()

                jQuery.find('.line_search').forEach((criteria) => {
                    let values = []
                    let select = jQuery.find('.select select', criteria)

                    jQuery.find(".select option:not(:selected)", criteria).forEach((option) => {
                        values.push(option.value)
                        if (
                            selected.includes(option.value) &&
                            !['value5'].includes(option.value)
                        ) {
                            option.remove()
                        }
                    })

                    Object.keys(criteriaOptions).forEach((value) => {
                        if (!selected.concat(values).includes(value)) {
                            $(select).append(criteriaOptions[value])
                        }
                    })
                })
            }
            function selectedCriteria() {
                let selected = []
                jQuery.find('.line_search').forEach((criteria) => {
                    selected.push($(jQuery.find('.select', criteria)).find("option:selected").val())
                })
                return selected
            }
        });
    </script>
@endsection

