@extends('layouts.app-about')
<link rel="stylesheet" href="{{ Vite::asset('resources/css/fond-select.css') }}">
@section('content')
    <div class="row">
        <div class="col">
            <div class="blockFond container-fluid">
                <h3>Фонд №1015</h3>
                    <div class="blockFondInformation">

                       <div class="lineFond">
                            <span class="title">Название фонда:</span>
                            <span>ihriogjter</span>
                       </div>
                       <div class="lineFond">
                            <span class="title">Начальная дата:</span>
                            <span>ghfghfghfg</span>
                       </div>
                       <div class="lineFond">
                            <span class="title">Конечная дата:</span>
                            <span>fghfghfghfg</span>
                       </div>
                       <div class="lineFond">
                            <span class="title">Географический указатель:</span>
                            <div class="geoPointer"><span>Астраханская губерния</span> <span>Астраханская губерния</span> <span>Астраханская губерния</span></div>
                       </div>
                       
                    </div>
                
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <x-table-fond-select />
        </div>
    </div>


@endsection

@section('script')
    
    
@endsection

