@extends('layouts.app-about')

@section('content')
    <div class="row">
        <div class="col">
            <div class="Case-Block-fond container">
                <form name="form" class="options" action="/fond" method="get">
                    <div class="block-form-container-fond">
                        <div class="label-block">
                            <label>Номер фонда</label>
                            <input name="number-fond" type="search" placeholder="Поиск...">
                        </div>
                        <div class="label-block">
                            <label>Название фонда</label>
                            <input name="name-fond" type="search" placeholder="Поиск...">
                        </div>
                        <div class="label-block">
                            <label>Географический указатель</label>
                            <select name="geoName[]" id="select_fond" required>
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
            <x-tableFunds :json="array($funds)"/>
        </div>
    </div>


@endsection

@section('script')
    
    
@endsection

