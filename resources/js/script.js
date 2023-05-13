$(window).on("load", function() {
    var count = 3;
    var line_search = $('.line_search');



	//добавление новых критейкий
    $('#add_category').click((e) =>{
        e.preventDefault();
        
        const from_container = $('.block-form-container');
        
        count++;
        from_container.append(
            `
            <div class="line_search" id="line_${count}">
                <div class="select">
                    <div class="custom-arrow">
                        <select name="" id="">
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

                // console.log($(line_search[i]).find('div')[2]);

                let select_fond = $(line_search[i]).find('div')[2];
                $(select_fond).find('select').val('value1');

                let select = $(line_search[i]).find('div')[0];
                $(select).find('select').val('value1');
            });
        }
    });

    // удаление критерии по одному
    for (let i = 0; i < line_search.length; i++) {

        const btn_trush = $(line_search[i]).find('a');
        $(btn_trush[1]).click(function (e) { 
            e.preventDefault();
            
            $(line_search[i]).remove();
        });
        
    }

    //очистка поля критерий
    for (let i = 0; i < line_search.length; i++) {
        const btn_trush = $(line_search[i]).find('a');
        $(btn_trush[0]).click(function (e) { 
            e.preventDefault();
            let search = $(line_search[i]).find('div')[4];
            $(search).find('input').val('');

            // console.log($(line_search[i]).find('div')[2]);

            let select_fond = $(line_search[i]).find('div')[2];
            $(select_fond).find('select').val('value1');

            let select = $(line_search[i]).find('div')[0];
            $(select).find('select').val('value1');
        });
    }
});