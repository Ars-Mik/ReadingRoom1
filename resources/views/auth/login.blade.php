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
                                    <svg onclick="togglePassword()" style="position: absolute; top: 12rem; right: 22rem; cursor: pointer" width="29" height="28" viewBox="0 0 29 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M24.0247 5.69501L23.1354 4.83641C22.8841 4.59376 22.4201 4.6311 22.1301 4.96704L19.0365 7.935C17.6445 7.3564 16.1173 7.0764 14.5125 7.0764C9.73705 7.09499 5.59998 9.78296 3.60851 13.6472C3.49248 13.8899 3.49248 14.1884 3.60851 14.3938C4.53643 16.2231 5.92851 17.7352 7.66852 18.8738L5.13586 21.3564C4.84586 21.6364 4.80718 22.0844 5.00057 22.327L5.88984 23.1856C6.14116 23.4283 6.60514 23.391 6.89514 23.055L23.8697 6.66581C24.2371 6.38597 24.2757 5.93801 24.0244 5.69533L24.0247 5.69501ZM15.5372 11.3322C15.2085 11.2575 14.8606 11.1642 14.5319 11.1642C12.8885 11.1642 11.574 12.4336 11.574 14.0202C11.574 14.3375 11.6513 14.6734 11.7479 14.9908L10.4524 16.2228C10.0658 15.5696 9.85318 14.8414 9.85318 14.0202C9.85318 11.5376 11.9219 9.54021 14.4932 9.54021C15.3439 9.54021 16.0979 9.74552 16.7745 10.1188L15.5372 11.3322Z" fill="#666666" fill-opacity="0.8"/>
                                        <path d="M25.4166 13.6471C24.74 12.3404 23.8506 11.1644 22.7487 10.2124L19.1527 13.6471V14.0204C19.1527 16.503 17.084 18.5004 14.5127 18.5004H14.126L11.8447 20.703C12.6955 20.871 13.5847 20.983 14.4547 20.983C19.2302 20.983 23.3673 18.295 25.3588 14.4122C25.5327 14.1508 25.5327 13.8896 25.4167 13.6469L25.4166 13.6471Z" fill="#666666" fill-opacity="0.8"/>
                                    </svg>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="custom-checkbox">
                                        <input class="form-check-input" onFocus="this.blur()" onchange='blur();' type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

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

    <script>
        function togglePassword() {
            let input = $('#password')

            if (input.attr('type') === 'password') {
                input.attr('type', 'text')
                input.next().remove()
                input.after(`<svg onclick="togglePassword()" style="position: absolute; top: 12.5rem; right: 22rem; cursor: pointer" width="24" height="16" viewBox="0 0 24 16" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M12 0.25C7.03481 0.25 2.7735 3.14874 0.910611 7.29004C0.803401 7.52837 0.803401 7.80117 0.910611 8.03951C2.7735 12.1808 7.03481 15.0795 12 15.0795C16.9652 15.0795 21.2265 12.1808 23.0894 8.03951C23.1966 7.80117 23.1966 7.52837 23.0894 7.29004C21.2265 3.14874 16.9652 0.25 12 0.25ZM12 12.608C9.17727 12.608 6.88636 10.3934 6.88636 7.66477C6.88636 4.93614 9.17727 2.72159 12 2.72159C14.8227 2.72159 17.1136 4.93614 17.1136 7.66477C17.1136 10.3934 14.8227 12.608 12 12.608ZM12 4.69886C10.3023 4.69886 8.93182 6.02364 8.93182 7.66477C8.93182 9.30591 10.3023 10.6307 12 10.6307C13.6977 10.6307 15.0682 9.30591 15.0682 7.66477C15.0682 6.02364 13.6977 4.69886 12 4.69886Z" fill="#666666"/>
</svg>`)
            } else {
                input.attr('type', 'password')
                input.next().remove()
                input.after(`<svg onclick="togglePassword()" style="position: absolute; top: 12rem; right: 22rem; cursor: pointer" width="29" height="28" viewBox="0 0 29 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M24.0247 5.69501L23.1354 4.83641C22.8841 4.59376 22.4201 4.6311 22.1301 4.96704L19.0365 7.935C17.6445 7.3564 16.1173 7.0764 14.5125 7.0764C9.73705 7.09499 5.59998 9.78296 3.60851 13.6472C3.49248 13.8899 3.49248 14.1884 3.60851 14.3938C4.53643 16.2231 5.92851 17.7352 7.66852 18.8738L5.13586 21.3564C4.84586 21.6364 4.80718 22.0844 5.00057 22.327L5.88984 23.1856C6.14116 23.4283 6.60514 23.391 6.89514 23.055L23.8697 6.66581C24.2371 6.38597 24.2757 5.93801 24.0244 5.69533L24.0247 5.69501ZM15.5372 11.3322C15.2085 11.2575 14.8606 11.1642 14.5319 11.1642C12.8885 11.1642 11.574 12.4336 11.574 14.0202C11.574 14.3375 11.6513 14.6734 11.7479 14.9908L10.4524 16.2228C10.0658 15.5696 9.85318 14.8414 9.85318 14.0202C9.85318 11.5376 11.9219 9.54021 14.4932 9.54021C15.3439 9.54021 16.0979 9.74552 16.7745 10.1188L15.5372 11.3322Z" fill="#666666" fill-opacity="0.8"/>
                                        <path d="M25.4166 13.6471C24.74 12.3404 23.8506 11.1644 22.7487 10.2124L19.1527 13.6471V14.0204C19.1527 16.503 17.084 18.5004 14.5127 18.5004H14.126L11.8447 20.703C12.6955 20.871 13.5847 20.983 14.4547 20.983C19.2302 20.983 23.3673 18.295 25.3588 14.4122C25.5327 14.1508 25.5327 13.8896 25.4167 13.6469L25.4166 13.6471Z" fill="#666666" fill-opacity="0.8"/>
                                    </svg>`)
            }
        }
    </script>
@endsection
