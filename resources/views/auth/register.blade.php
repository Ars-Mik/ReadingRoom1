@extends('layouts.app')

@section('content')
<img class="position-fixed" style="width: auto; height: 110vh; margin-top: -4rem" src="{{ Vite::asset('resources/img/registration.jpg') }}">
<div class="container" style="margin-right: -4rem">
    <div class="row offset-3">
        <div class="col-md-12">
            <div class="card border-0 bg-white">
                <div class="card-body">
                    <div class="mb-3 fw-light" style="font-size: 32px; font-family: Poppins,sans-serif">Регистрация</div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="second_name" class="col-form-label-sm" style="color: #666666">Фамилия</label>

                            <div class="col-md-8">
                                <input style="height: 3rem;" id="second_name" type="text" class="form-control @error('second_name') is-invalid @enderror" name="second_name" value="{{ old('second_name') }}" required autocomplete="second_name" autofocus>

                                @error('second_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="first_name" class="col-form-label-sm" style="color: #666666">Имя</label>

                            <div class="col-md-8">
                                <input style="height: 3rem;" id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="third_name" class="col-form-label-sm" style="color: #666666">Отчество</label>

                            <div class="col-md-8">
                                <input style="height: 3rem;" id="third_name" type="text" class="form-control @error('third_name') is-invalid @enderror" name="third_name" value="{{ old('third_name') }}" required autocomplete="third_name" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-form-label-sm" style="color: #666666">Email</label>

                            <div class="col-md-8">
                                <input style="height: 3rem;" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-form-label-sm" style="color: #666666">Пароль</label>

                            <div class="col-md-8">
                                <input style="height: 3rem;" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-8">
                                <div class="form-check">
                                    <input class="form-check-input" onFocus="this.blur()" required type="checkbox" name="personal_data" id="personal_data" {{ old('personal_data') ? 'checked' : '' }}>

                                    <label class="form-check-label pt-1" style="font-size: 12px; font: -webkit-small-control" for="remember">Нажимая кнопку «Зарегистрироваться»,<br>
                                        вы даете согласие на обработку персональных данных. </label>
                                </div>
                                @error('personal_data')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-5">
                            <button style="height: 3rem; font-size: 22px; width: 65%; margin-left: 0.5rem;" type="submit" class="btn btn-primary mt-4">
                                {{ __('Зарегистрироваться') }}
                            </button>
                        </div>

                        <div class="row justify-content-center mt-2" style="padding-left: 6rem">
                            <div class="row">
                                <p class="col-md-4 pt-2 col-form-label-sm mt-1 text-end" style="vertical-align: middle; font-size: 18px;">У вас уже есть аккаунт?</p>
                                <a class="col-md-2 btn border-1" style="height: 3rem; border-radius: 32px; border-color: #0e161b; font-size: 20px;" href="/login">Войти</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
