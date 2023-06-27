@php use App\Models\Document; @endphp
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
            @if($orderExists)
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <img class="col-md-6 offset-3" style="width: 15rem" src="{{ Vite::asset('resources/img/attention.svg') }}" alt="">
                        </div>
                        <div class="row">
                            <span style="
            font-size: 24px!important;
            color: gray;
            font-weight: 500;
            font: caption">Вы уже отправляли заявку!</span>
                        </div>
                        <div class="row mt-5">
                            <p class="col-md-10 offset-1" style="font-size: 18px; line-height: 23px; font: caption">
                                Вы уже отправляли заявку на просмотр этого документа.<br>Статус отправленной заявки вы можете просмотреть в личном кабинете, раздел Мои заявки.
                            </p>
                        </div>
                        <div class="row mt-5">
                            <a class="col-md-6 offset-3 btn btn-primary" href="/client/orders">Мои заявки</a>
                        </div>
                        <div class="row">
                            <span class="btn btn-link" onclick="closeOrderModal();" style="text-decoration: none">Закрыть</span>
                        </div>
                    </div>
                </div>
            @else
                <form class="modal-content">
                    <div class="modal-header bg-black text-white text-center p-2">
                        <h5 class="col-md-8 offset-2" id="exampleModalLongTitle" style="font-size: 18px;">Заявка на просмотр документа</h5>
                        <span aria-hidden="true" onclick="closeOrderModal()" style="font-size: 32px; cursor: grab">&times;</span>
                    </div>

                    <div class="modal-body">
                        <div class="col-md-10 offset-1 mt-2">
                            <div class="col-form-label-sm text-start" style="color: #0000004D; font: inherit; font-size: 12px;">ФИО</div>
                            <input id="fio" class="form-control" value="{{ Auth::user()?->fullName() }}" disabled>
                        </div>
                        <div class="col-md-10 offset-1 mt-2">
                            <div class="col-form-label-sm text-start" style="color: #0000004D; font: inherit; font-size: 12px;">Email</div>
                            <input id="email" class="form-control" value="{{ Auth::user()?->email }}" disabled>
                        </div>
                        <div class="col-md-10 offset-1 mt-2">
                            <div class="col-form-label-sm text-start" style="color: #0000004D; font: inherit; font-size: 12px;">Документ</div>
                            <input id="document" class="form-control" value="{{ $documentSelect[0]->documentName }}"
                                   disabled>
                        </div>
                        <div class="col-md-10 offset-1 mt-2">
                            <div class="col-form-label-sm text-start" style="color: #0000004D; font: inherit; font-size: 12px;">Шифр</div>
                            <input id="cifer" class="form-control"
                                   value="{{Document::cipher($documentSelect[0]->Numberfund, $documentSelect[0]->numberInventory, $documentSelect[0]->caseNumber)}}" disabled>
                        </div>

                        <div class="row mt-4 mb-4">
                            <span class="col-md-1 offset-1" style="color: #0a53be; font-size: 30px; padding-left: 1.5rem!important;">!</span>
                            <p class="col-md-8 text-start" style="font-size: 10px;">
                                Проверьте правильность заполненных данных перед<br> отправкой заявки. В случае необходимости, вы
                                можете<br> внести изменения в Личном кабинете.
                            </p>
                        </div>

                        <button type="button" onclick="saveOrder();" class="btn btn-primary mt-2 mb-4">Отправить</button>
                    </div>
                </form>
            @endif
        </div>
    </div>

    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
         aria-hidden="true" style="min-height: 40vh!important; top: 20vh">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="row mt-5">
                    <img class="col-md-6 offset-3" style="width: 15rem" src="{{ Vite::asset('resources/img/success.png') }}">
                </div>
                <div class="row">
                    <span class="mt-2" style="color: #252527B2; font: small-caption; font-size: 24px;">Заявка отправлена!</span>
                </div>
                <div class="row">
                    <span class="mt-5" style="
            font-size: 14px;
            font-weight: 500;
            font: caption">
                Ваша заявка была успешно отправлена.<br>
                    Статус отправленной заявки вы можете просмотреть<br>
                    в личном кабинете, раздел Мои заявки.
                </span>
                </div>
                <div class="row mt-5">
                    <a class="col-md-6 offset-3 btn btn-primary" href="/client/orders">Мои заявки</a>
                </div>

                <div class="row mb-5">
                    <span class="btn btn-link" style="text-decoration: none" href="#" onclick="closeSuccessModal();">Закрыть</span>
                </div>
            </div>
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
                btn.removeAttr('onclick');
                btn.attr('data-toggle', 'orderModal');
                btn.attr('data-target', '#exampleModalLong');
                btn.attr('id', 'myModal');

                btn.on('click', function () {
                    if ("{{ Auth()->id() }}") {
                        $('#orderModal').modal('show')
                    } else {
                        window.location.replace('/login')
                    }
                })
            }

            test('geoName', arr_geoName);
            test('typeName', arr_typeName);
            test('personeName', arr_personeName);

        });

        function saveOrder() {
            $.post('/orders', {
                id: {{ $id }},
                _token: "{{ csrf_token() }}"
            })
            $('#orderModal').modal('hide')
            $('#successModal').modal('show')
        }

        function closeSuccessModal() {
            $('#successModal').modal('hide')
        }

        function closeOrderModal() {
            $('#orderModal').modal('hide')
        }
    </script>
@endsection
