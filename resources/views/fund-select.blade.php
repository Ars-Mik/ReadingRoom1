@extends('layouts.app-about')
<link rel="stylesheet" href="{{ Vite::asset('resources/css/fond-select.css') }}">
@section('content')
    <div class="row">
        <div class="col">
            <div class="blockFond container-fluid">
                <h3>Фонд №{{$Funds[0]->numberFund}}</h3>
                    <div class="blockFondInformation">

                       <div class="lineFond">
                            <span class="title">Название фонда:</span>
                            <span>{{$Funds[0]->fundName}}</span>
                       </div>
                       <div class="lineFond">
                            <span class="title">Начальная дата:</span>
                            <span>{{$Funds[0]->startDate}} год</span>
                       </div>
                       <div class="lineFond">
                            <span class="title">Конечная дата:</span>
                            <span>{{$Funds[0]->endDate}} год</span>
                       </div>
                       <div class="lineFond">
                            <span class="title">Географический указатель:</span>
                            <div class="geoPointer">
                                @foreach ($geoPointer as $item)
                                    <span>{{$item->geoName}}</span>
                                @endforeach
                            </div>
                       </div>
                       
                    </div>
                
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <x-table-fond-select :json="array($allDocument)" />
        </div>
    </div>


@endsection

