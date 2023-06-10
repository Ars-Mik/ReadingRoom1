@extends('client.client')

@section('client')
    <table class="table" style="margin: -16px 0 0 0">
        <thead class="bg-black text-white">
        <tr>
            <th scope="col">№</th>
            <th scope="col">Шифр документа</th>
            <th scope="col">Заголовок</th>
            <th scope="col">Статус</th>
            <th scope="col">Действие</th>
        </tr>
        </thead>
        <tbody>
        @foreach($applications['data'] as $item)
            <tr>
                <th class="border-2" scope="row">{{($count = ($count ?? (($applications['current_page'] - 1) * 5)) + 1) }}</th>
                <td class="border-2">Ф. 719 Оп. 1. Д.1</td>
                <td class="border-2">{{ $item['documentName'] }}</td>
                <td class="border-2">{{ $statuses[$item['status']] }}</td>
                <td class="border-2">
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
