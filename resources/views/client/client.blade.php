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
        <div class="card bg-white pb-5 pt-3" style="margin-bottom: 8rem; box-shadow: 1px 2px 10px 1px rgba(0, 0, 0, 0.25);">
            @yield('client')
        </div>
    </div>
@endsection
