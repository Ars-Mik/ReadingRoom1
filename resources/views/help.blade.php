@extends('layouts.app-about')
<link rel="stylesheet" href="{{ Vite::asset('resources/css/help.css') }}">
@section('content')

    <div class="row">
        <div class="col">
            <ul class="breadcrumb container">
                <li><a href="/">Главная</a></li>
                <li>Помощь</li>
            </ul>
            <div class="container">
                <h3 class="title_help">Ответы на часто задаваемые вопросы</h3>

                <div class="collapse_box">
                    <div class="paragraph_1">
                        <button class="btn btn-primary collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#paragraph_1" aria-expanded="true" aria-controls="collapseExample">
                            Что делать если я не нашел(ла) нужный мне документ? <img src="{{ Vite::asset('resources/img/down_blue.svg') }}" alt="cursor">
                        </button>
                        <div class="collapse" id="paragraph_1">
                            <div class="card card-body">
                                Пеля Дура бла бла бла
                            </div>
                        </div>
                    </div>
                    

                    <div class="paragraph_2">
                        <button class="btn btn-primary collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#paragraph_2" aria-expanded="true" aria-controls="collapseExample">
                            Что делать если я не нашел(ла) нужный мне документ? <img src="{{ Vite::asset('resources/img/down_blue.svg') }}" alt="cursor">
                        </button>
                        <div class="collapse" id="paragraph_2">
                            <div class="card card-body">
                                Пеля Дура бла бла бла
                            </div>
                        </div>
                    </div>


                    <div class="paragraph_3">
                        <button class="btn btn-primary collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#paragraph_3" aria-expanded="true" aria-controls="collapseExample">
                            Что делать если я не нашел(ла) нужный мне документ? <img src="{{ Vite::asset('resources/img/down_blue.svg') }}" alt="cursor">
                        </button>
                        <div class="collapse" id="paragraph_3">
                            <div class="card card-body">
                                Пеля Дура бла бла бла
                            </div>
                        </div>
                    </div>

                    <div class="paragraph_4">
                        <button class="btn btn-primary collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#paragraph_4" aria-expanded="true" aria-controls="collapseExample">
                            Что делать если я не нашел(ла) нужный мне документ? <img src="{{ Vite::asset('resources/img/down_blue.svg') }}" alt="cursor">
                        </button>
                        <div class="collapse" id="paragraph_4">
                            <div class="card card-body">
                                Пеля Дура бла бла бла
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="container">
                <h3 class="contact">Контактная информация</h3>

                <div class="contact_box">
                    <h2>Государственный архив Астраханской области:</h2>

                    <p>Личный прием граждан осуществляется по предварительной записи в рабочее время с понедельника по пятницу.
                        Контактный телефон для записи на прием 8 (8512) 66-62-40.</p>

                    <p>Официальная страница в социальной сети «ВКонтакте» - <a href="https://vk.com/astrgosarhiv">vk.com/astrgosarhiv</a></p>

                    <div class="contact_links">
                        <span><img src="{{ Vite::asset('resources/img/icon_contact/map.svg') }}" alt="map"> 414040, г. Астрахань, ул. Академика Королева ул., 39-А.</span>
                        <span><img src="{{ Vite::asset('resources/img/icon_contact/mail.svg') }}" alt="mail"> +7 (8512) 66-62-40</span>
                        <span><img src="{{ Vite::asset('resources/img/icon_contact/phone.svg') }}" alt="phone"> <a href="mailto:astrahanarhive@yandex.ru">astrahanarhive@yandex.ru</a></span>
                    </div>
                </div>
            </div>
            <hr class="line"/>
        </div>
    </div>


@endsection

@section('script')
    <script>
        $(".btn-primary").click(function(){
            $(this).find('img').toggleClass("down");
            console.log(this);
        })

    </script>
    
@endsection

