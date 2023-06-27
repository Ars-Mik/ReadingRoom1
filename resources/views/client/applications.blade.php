@extends('client.client')

@section('client')
    <table class="table" style="margin: -16px 0 0 0">
        <thead class="bg-black text-white" style="height: 3rem!important;">
        <tr>
            <th scope="col" style="vertical-align: middle!important;">№</th>
            <th scope="col" style="vertical-align: middle!important;">Шифр документа</th>
            <th scope="col" style="vertical-align: middle!important;">Заголовок</th>
            <th scope="col" style="vertical-align: middle!important;">Статус</th>
            <th scope="col" style="vertical-align: middle!important;">Действие</th>
        </tr>
        </thead>
        <tbody style="border: solid 2px #CDCDCD">
        @foreach($applications['data'] as $item)
            <tr>
                <th class="border-2" style="border: solid 2px #CDCDCD" scope="row">{{($count = ($count ?? (($applications['current_page'] - 1) * 5)) + 1) }}</th>
                <td class="border-2" style="border: solid 2px #CDCDCD">Ф. 719 Оп. 1. Д.1</td>
                <td class="border-2" style="border: solid 2px #CDCDCD">{{ $item['documentName'] }}</td>
                <td class="border-2" style="border: solid 2px #CDCDCD">{{ $statuses[$item['status']] }}</td>
                <td class="border-2" style="border: solid 2px #CDCDCD">
                    @if($item['status'] == 1)
                        <button class="btn btn-primary" type="button" onclick="openDocument('{{ $item['document_id'] }}');">Читать документ</button>
                    @else
                        <button class="btn btn-secondary" type="button" disabled>Читать документ</button>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
