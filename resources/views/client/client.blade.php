@extends('layouts.app-about')

@section('content')
    <div style="background-color: #F0F0F0; height: 3rem; margin-top: -2rem;">
        <div class="container">
            <div class="row">
                <p class="col-md-1 text-start mb-0" style="padding-top: 11px;">Главная</p>
                <div class="col-md-1 text-start" style="margin-left: -3rem">
                    <div class="mt-2" style="
                            width: 2rem;
                            height: 2rem;
                            border: solid #E0E0E0;
                            border-width: 0 3px 3px 0;
                            display: inline-block;
                            padding: 3px;
                            transform: rotate(-45deg);
                            margin-top: -4rem;
                        ">

                    </div>
                </div>
                <span class="col-md-3 text-start mb-0" style="
                            padding-top: 12px;
                            color: #B4B4B4;
                            text-shadow: none;
                            margin-left: -4rem
                        ">Личный кабинет</span>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <a class="col-md-2 pb-1" href="/client/edit">Персональные данные</a>
            <a class="col-md-2" href="/client/orders">Мои заявки</a>
        </div>
        <div class="card bg-white pb-5 pt-3" style="box-shadow: 1px 2px 10px 1px rgba(0, 0, 0, 0.25);">
            @yield('client')
        </div>
        @if(Route::is('client.orders'))
            <div class="col-md-7 offset-6 mt-3 pagination">
                @if($applications['current_page'] != 1)
                    <a href="{{ $applications['prev_page_url'] }}"  class="previous-pagination number"><</a>
                @else
                    <span class="previous-pagination number"><img src="{{ Vite::asset('resources/img/left.svg') }}" alt="left"></span>
                @endif

                <div class="pagination-number">
                    @if($applications['last_page'] < 8)
                        @for($i = 0; $i < $applications['last_page']; $i++)
                            <a href="/client/orders?page={{ $i + 1 }}" class="number @if($applications['current_page'] == $i + 1) active @endif ">{{ $i + 1 }}</a>
                        @endfor
                    @else
                        @for($i = 0; $i < ($applications['current_page'] > 5 ? 3 : 5); $i++)
                            <a href="/client/orders?page={{ $i + 1 }}" class="number @if($applications['current_page'] == $i + 1) active @endif ">{{ $i + 1 }}</a>
                        @endfor
                            @if($applications['current_page'] > 5 && $applications['current_page'] != $applications['last_page'])
                                <span class="dots number">...</span>
                                <a href="/client/orders?page={{ $applications['current_page'] }}" class="number active">{{ $applications['current_page'] }}</a>
                            @endif
                        <span class="dots number">...</span>
                        <a href="/client/orders?page={{ $applications['last_page'] }}" class="number @if($applications['current_page'] == $applications['last_page']) active @endif ">{{ $applications['last_page'] }}</a>
                    @endif
                </div>
                <a href="{{ $applications['next_page_url'] }}" class="next-pagination number"><img src="{{ Vite::asset('resources/img/right.svg') }}" alt="right"></a>
            </div>
        @endif
    </div>
@endsection
