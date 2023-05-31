@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row col-md-6 offset-3 justify-content-center">
        <span class="text-center p-0" style="
        font: caption;
        font-size: 32px;
        font-weight: 500;
        ">Подтверждение электронной почты</span>
            <p
                class="text-center mt-5"
                style="font-size: 20px; font-weight: 500; font: caption">
                Мы отправили письмо с подтверждением на адрес <br>
                <b>{{ $email }}</b> <br>
                Пройдите по ссылке в письме.
            </p>
        </div>
        <div class="row row col-md-6 offset-3 mt-5">
            <a
                href="/login"
                class="btn btn-primary"
                style="width: 540px; margin-left: 4rem"
            >Вернуться к авторизации</a>
        </div>
    </div>
@endsection
