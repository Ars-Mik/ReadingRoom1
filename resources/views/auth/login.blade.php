@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 6rem">
        <div class="row offset-3">
            <div class="col-md-12">
                <div class="card border-0 bg-white">
                    <div class="card-body">
                        <div class="mb-3 fw-light" style="font-size: 32px; font-family: Poppins,sans-serif">Авторизация</div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-4">
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

                            <div class="row mb-1">
                                <label for="password" class="col-form-label-sm" style="color: #666666">Пароль</label>

                                <div class="col-md-8">
                                    <input id="password" style="height: 3rem;" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label pt-1" style="font-size: 12px; font: -webkit-small-control" for="remember">{{ __('Remember Me') }}</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-4 offset-6">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Забыли пароль?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <button type="submit" class="btn btn-primary" style="height: 3rem; font-size: 22px; width: 65%; margin-left: 0.5rem;">
                                    {{ __('Войти') }}
                                </button>
                            </div>

                            <div class="row justify-content-center mt-2">
                                <div class="row text-center">
                                    <p class="col-md-3 text-end p-0 col-form-label-sm mt-1" style="color: #666666">Нет аккаунта?</p>
                                    <a class="col-md-3 text-start p-0" style="color: #111111" href="/register">Зарегистрироваться</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
