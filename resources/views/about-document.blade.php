@extends('layouts.app-about')

@section('content')

    <div class="row">
        <div class="col">
            <ul class="breadcrumb container">
                <li><a href="/documents">Дело</a></li>
                <li><?php if ($documentSelect) {
                        echo 'Ф. ' . $documentSelect[0]->Numberfund . ' Оп. ' . $documentSelect[0]->numberInventory . ' Д. ' . $documentSelect[0]->caseNumber . ' ' . $documentSelect[0]->documentName;
                    } ?></li>
            </ul>
            {{-- Ф. 719 Оп. 1 Д. 1 Пример “Актовые записи о рождении, браке и смерти” --}}
            <div class="container-fluid container_about">
                <div class="container container-body">
                    <button id="btn" class="btn btn-primary btn-lg" style="width: 316px; height: 53px;">Читать
                        документ
                    </button>

                    <div class="table_info">
                        <span>Общая информация</span>
                        <table style="width: 100%;">
                            <tr>
                                <td>Архив</td>
                                <td>Фонд</td>
                                <td>Номер фонда</td>
                                <td>Номер описи</td>
                                <td>Номер дела</td>
                                <td>Заголовок</td>
                                <td>Географический указатель</td>
                                <td>Тематический указатель</td>
                                <td class="test">Именной указатель</td>
                                <td>Дата появления</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="orderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="/orders" method="POST" class="modal-content">
                @csrf
                <input type="hidden" name="id" value="{{ $id }}">
                <div class="modal-header bg-black text-white">
                    <h5 class="modal-title" id="exampleModalLongTitle">Заявка на просмотр документа</h5>
                    <button type="button" class="close" data-dismiss="orderModal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">Отправить</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(window).on("load", function () {
            var arr = <?php echo json_encode($documentSelect) ?>

            var arr_personeName = [];

            var arr_geoName = [];

            var arr_typeName = [];

            for (let i = 0; i < arr.length; i++) {

                arr_personeName.push(arr[i]['personName']);

                arr_geoName.push(arr[i]['geoName']);

                arr_typeName.push(arr[i]['typeName']);

            }
            arr_geoName = Array.from(new Set(arr_geoName));
            arr_typeName = Array.from(new Set(arr_typeName));
            arr_personeName = Array.from(new Set(arr_personeName));

            function test(id, array) {
                for (let i = 0; i < array.length; i++) {
                    (array.length > 1) ? (i == array.length - 1) ? $(`#${id}`).append(`${array[i]}`) : $(`#${id}`).append(`${array[i]}, `) : $(`#${id}`).append(array[i]);
                }
            }

            if (arr.length) {
                $('.table_info table tbody').append(`
        <tr>
            <td>Государственный архив Астраханской области</td>
            <td>${arr[0]['fundName']}</td>
            <td>${arr[0]['Numberfund']}</td>
            <td>${arr[0]['numberInventory']}</td>
            <td>${arr[0]['caseNumber']}</td>
            <td>${arr[0]['documentName']}</td>
            <td id="geoName"></td>
            <td id="typeName"></td>
            <td id="personeName"></td>
            <td>1943г.</td>
        </tr>
      `);

                $('#btn').attr('onclick', 'openDocument(' + arr[0]['id'] + ');');
            } else {
                $('.container-body').html('Вы вышли за пределы библиотеки');
            }


            if (!arr[0]['access']) {
                let btn = $('#btn')
                btn.text('Отправить заявку');
                btn.removeClass('btn-primary');
                btn.addClass('btn-black');
                btn.attr('data-toggle', 'orderModal');
                btn.attr('data-target', '#exampleModalLong');
                btn.attr('id', 'myModal');

                btn.on('click', function () {
                    $('#orderModal').modal('show')
                })
            }

            test('geoName', arr_geoName);
            test('typeName', arr_typeName);
            test('personeName', arr_personeName);

        });
    </script>
@endsection
