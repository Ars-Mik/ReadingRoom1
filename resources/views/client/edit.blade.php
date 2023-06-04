@extends('client.client')

@section('client')
    <form class="container" action="/client" method="POST">
        @csrf
        <div class="row text-start">
            <div class="col-md-5 offset-1">
                <p class="mb-3">Основные данные</p>

                <div class="col-md-12">
                    <label for="second_name" class="col-form-label-sm">Фамилия</label>
                    <input id="second_name" type="text" class="form-control" name="second_name" value="{{ $second_name }}" required>
                </div>

                <div class="col-md-12">
                    <label for="name" class="col-form-label-sm">Имя</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ $name }}" required>
                </div>

                <div class="col-md-12">
                    <label for="third_name" class="col-form-label-sm">Отчество</label>
                    <input id="third_name" type="text" class="form-control" name="third_name" value="{{ $third_name }}" required>
                </div>

                <div class="col-md-12">
                    <label for="email" class="col-form-label-sm">Email</label>
                    <input id="email" type="text" class="form-control" name="email" value="{{ $email }}" disabled>
                </div>
            </div>
            <div class="col-md-5">
                <p class="mb-3">Пароль</p>

                <div class="col-md-12">
                    <label for="old_password" class="col-form-label-sm">Старый пароль</label>
                    <input id="old_password" type="text" class="form-control" name="old_password">
                </div>

                <div class="col-md-12">
                    <label for="password" class="col-form-label-sm">Новый пароль</label>
                    <input id="password" type="text" class="form-control" name="password">
                </div>

                <div class="col-md-12">
                    <label for="password_confirmation" class="col-form-label-sm">Подтверждение пароля</label>
                    <input id="password_confirmation" type="text" class="form-control" name="password_confirmation">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-5 col-md-3">Сохранить</button>
    </form>
@endsection
