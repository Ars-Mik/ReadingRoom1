@extends('layouts.app-about')

@section('content')
    <div class="row">
        <div class="col">
            <ul class="breadcrumb container">
                <li><a href="/">Главная</a></li>
                <li>Архивные фонды</li>
            </ul>
            <div class="Case-Block-fond container">
                <form name="form" class="options" action="/funds" method="get">
                    <div class="block-form-container-fond">
                        <div class="label-block">
                            <label>Номер фонда</label>
                            <input name="numberFund" type="search" placeholder="Поиск...">
                        </div>
                        <div class="label-block">
                            <label>Название фонда</label>
                            <input name="fundName" type="search" placeholder="Поиск...">
                        </div>
                        <div class="label-block">
                            <label>Географический указатель</label>
                            <select name="geoName[]" id="select_fond">
                                <option value="" disabled selected>- Выбрать -</option>
                                @foreach ($geo_indices as $geo)
                                    <option value='{{$geo->geoName}}'>{{$geo->geoName}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="function_button fond mx-5">
                        <input class="btn btn-primary btn-lg btn-search" id="search" type="submit" value="Применить">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <x-tableFunds :json="array($fundFilter)"/>
        </div>
    </div>


@endsection

@section('script')
    
    
@endsection