@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('password.update') }}" class="container mt-5">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <input type="hidden" name="email" value="{{ $email ?? old('email') }}">

    <div class="row col-md-6 offset-3 justify-content-center">
        <span class="p-0" style="
        font: caption;
        font-size: 32px;
        font-weight: 500;
        margin-left: 5rem;
        ">Придумайте новый пароль</span>
        <div class="mt-5">
            <label for="password" class="col-form-label-sm" style="margin-left: 2rem">Введите новый пароль</label>

            <input
                id="password"
                type="password"
                class="form-control @error('password') is-invalid @enderror"
                name="password"
                required autocomplete="new-password"
                style="width: 540px; margin-left: 2rem"
            >

            @error('password')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
        <div class="mt-5">
            <label for="password_confirmation" class="col-form-label-sm" style="margin-left: 2rem">Подтвердите пароль</label>

            <input
                id="password_confirmation"
                type="password"
                class="form-control @error('password_confirmation') is-invalid @enderror"
                name="password_confirmation"
                required autocomplete="password_confirmation"
                style="width: 540px; margin-left: 2rem"
            >
        </div>
    </div>
    <div class="row col-md-6 offset-3 mt-5">
        <button
            type="submit"
            class="btn btn-primary"
            style="width: 540px; margin-left: 3rem"
        >Сохранить</button>
    </div>
</form>

@endsection
