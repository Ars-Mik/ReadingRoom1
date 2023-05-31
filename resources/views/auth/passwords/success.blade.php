@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row col-md-6 offset-3 justify-content-center">
            <img style="width: 15rem" src="{{ Vite::asset('resources/img/success.png') }}">
            <span class="text-center mt-5" style="
            font-size: 24px;
            font-weight: 500;
            font: caption"
            >{{ $text }}</span>
        </div>
        <div class="row col-md-4 offset-4 mt-5">
            <a
                href="/login"
                class="btn btn-primary"
            >Вернуться к авторизации</a>
        </div>
    </div>

@endsection
