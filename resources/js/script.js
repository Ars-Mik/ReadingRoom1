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
                <div class="dictionary">
                    <div class="custom-arrow">
                        <select name="" id="">
                            <option value="value1" selected>Содержит</option>
                            <option value="value2" >Не содержит</option>
                            <option value="value2" >Равно</option>
                            <option value="value3" >Слово начинается</option>
                            <option value="value4" >Не заполнено</option>
                        </select>
                    </div>
                </div>
                <div class="search-dictionary">
                    <input type="search" placeholder="Поиск...">
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
                Isline_search = $('.line_search');
                if (Isline_search.length === 0) {
                    from_container.append('<span>Нажмите на кнопку "Добавить новый критерий" чтобы появилось поле выбора.</span>');
                    console.log(Isline_search.length);
                }

                return true;
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

                let appendDictionary = $($($(line_search)[i]).find('div')[4]);
                let test = $($($(line_search)[i]).find('div')[4]).find('input');
                if (test.length == 0) {
                    $($($(line_search)[i]).find('div')[4]).find('select').remove();
                    $(appendDictionary).append(`
                        <input id="search" type="search" placeholder="Поиск...">
                    `);
                }
            });
        }


        for (let i = 0; i < $(line_search).length; i++) {
            let search_dictionary = $(line_search[i]).find('div');
            if ($(search_dictionary).attr('class') == 'select') {
                var test = $(search_dictionary).find('select');
                
                $(test[0]).change(function (e) { 
                    e.preventDefault();
                    
                    var optionSelected = $(this).find("option:selected");
                    var valueSelected  = optionSelected.val();
                    let appendDictionary = $($($(line_search)[i]).find('div')[4]);
                    let test = $($($(line_search)[i]).find('div')[4]).find('select');
                    if (valueSelected !== 'value1') {
                        $($($(line_search)[i]).find('div')[4]).find('input').remove();
                        if (!test.length > 0) {
                            $(appendDictionary).append(`
                                <select name="" id="">
                                    <option value="value1" selected>Содержит</option>
                                    <option value="value2" >Не содержит</option>
                                    <option value="value2" >Равно</option>
                                    <option value="value3" >Слово начинается</option>
                                    <option value="value4" >Не заполнено</option>
                                </select>
                            `);
                        }
                    }else{
                        $($($(line_search)[i]).find('div')[4]).find('select').remove();
                        $(appendDictionary).append(`
                            <input id="search" type="search" placeholder="Поиск...">
                        `);
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
            var Isline_search = $('.line_search');
            if (Isline_search.length == 0) {
                from_container.append('<span>Нажмите на кнопку "Добавить новый критерий" чтобы появилось поле выбора.</span>');
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

            let appendDictionary = $($($(line_search)[i]).find('div')[4]);
            let test = $($($(line_search)[i]).find('div')[4]).find('input');
            if (test.length == 0) {
                $($($(line_search)[i]).find('div')[4]).find('select').remove();
                $(appendDictionary).append(`
                    <input id="search" type="search" placeholder="Поиск...">
                `);
            }
        });
    }

    for (let i = 0; i < $(line_search).length; i++) {
        let search_dictionary = $(line_search[i]).find('div');
			if ($(search_dictionary).attr('class') == 'select') {
				var test = $(search_dictionary).find('select');
				
				$(test[0]).change(function (e) { 
					e.preventDefault();
					
					var optionSelected = $(this).find("option:selected");
					var valueSelected  = optionSelected.val();
					let appendDictionary = $($($(line_search)[i]).find('div')[4]);
					let test = $($($(line_search)[i]).find('div')[4]).find('select');
					if (valueSelected !== 'value1') {
						$($($(line_search)[i]).find('div')[4]).find('input').remove();
						if (!test.length > 0) {
							let test2434 = `
								<select name="" id="">
									@foreach ($funds as $fund)
										<option value='{{$fund->id}}' selected>{{$fund->fundName}}</option>
									@endforeach	
								</select>
							`;
							$(appendDictionary).append(test2434);
						}
					}else{
						$($($(line_search)[i]).find('div')[4]).find('select').remove();
						$(appendDictionary).append(`
							<input id="search" type="search" placeholder="Поиск...">
						`);
					}
				});
			}
    	}
});