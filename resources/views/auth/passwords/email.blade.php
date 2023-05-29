@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('password.email') }}" class="container mt-5">
    @csrf
    <div class="row col-md-6 offset-3 justify-content-center">
        <span class="p-0" style="
        font: caption;
        font-size: 32px;
        font-weight: 500;
        margin-left: 5rem;
        ">Восстановление пароля</span>
        <div class="mt-5">
            <label for="email" class="col-form-label-sm" style="margin-left: 2rem">Email*</label>

            <input
                id="email"
                type="email"
                class="form-control @error('email') is-invalid @enderror"
                name="email"
                value="{{ old('email') }}"
                required autocomplete="email"
                autofocus
                style="width: 540px; margin-left: 2rem"
            >

            @error('email')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
        <p
            class="text-center mt-5"
            style="font-size: 20px; font-weight: 500; font: caption">
            Укажите адрес электронной почты на который<br>
            зарегистрирован аккаунт и мы отправим вам ссылку<br>
            для восстановления пароля.
        </p>
    </div>
    <div class="row col-md-6 offset-3 mt-5">
        <button
            type="submit"
            class="btn btn-primary"
            style="width: 540px; margin-left: 3rem"
        >Получить ссылку для восстановления</button>
    </div>
    <div class="row mt-5 col-md-6 offset-3 text-center">
        <a href="login">Войти</a>
    </div>
</form>

@endsection
