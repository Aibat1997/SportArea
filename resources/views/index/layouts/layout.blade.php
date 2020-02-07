<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width" />
    <title>Sport</title>
    <link rel="stylesheet" href="/index/css/libs.min.css">
    <link rel="stylesheet" href="/index/css/all.css">
    <link rel="stylesheet" href="/index/css/bootstrap-slider.min.css">
    <link rel="stylesheet" href="/index/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/index/css/main.css">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon.ico">
    <link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.1.0/dist/vue-multiselect.min.css">

    @yield('css')

</head>

<body>
    <div id="app">

        @include('index.layouts.header')
        @yield('content')

        <div class="question-popup login-popup">
            <div class="question-popup-head d-flex-justify">
                <h3>Вход</h3>
                <button class="btn-plain close-popup"><i class="fas fa-times"></i></button>
            </div>

            <form action="/login" method="POST" class="control-form">
                @csrf
                <input type="tel" class="enter_phone" name="phone" placeholder="Номер телефона">
                <input type="password" name="password" placeholder="Пароль">
                <button type="submit" class="btn-plain btn-blue">Войти</button>
                <button class="btn-plain btn-bluesub call-registration">Зарегистрироваться</button>
                <div class="recovery">
                    <span>Забыли пароль?</span>
                    <a href="#" class="recovery-link">
                        Восстановить
                    </a>
                </div>
            </form>
        </div>
        <div class="question-popup registration-popup">
            <div class="question-popup-head d-flex-justify">
                <h3>Регистрация</h3>
                <button class="btn-plain close-popup"><i class="fas fa-times"></i></button>
            </div>
            <form action="/login" method="POST" class="control-form">
                @csrf
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <input type="text" name="user_firstname" placeholder="Имя">
                <input type="tel" class="enter_phone reg_phone" name="phone" placeholder="Номер телефона">
                <span id="show_sms_code"></span>
                <input type="text" name="password" placeholder="СМС-код">
                <button type="submit" class="btn-plain btn-blue">Зарегистрироваться</button>
                <button class="btn-plain btn-bluesub" id="send_code">Выслать код</button>
            </form>
        </div>
        <div class="question-popup recovery-popup">
            <div class="question-popup-head d-flex-justify">
                <h3>Восстановление</h3>
                <button class="btn-plain close-popup"><i class="fas fa-times"></i></button>
            </div>
            <form action="#" class="control-form">
                <input type="text" placeholder="Номер телефона">
                <input type="text" placeholder="СМС-код">
                <button class="btn-plain btn-blue">Войти</button>
            </form>
        </div>
        <div class="overlay"></div>

        @include('index.layouts.footer')
    </div>

    <script src="https://unpkg.com/vue-multiselect@2.1.0"></script>
    <script src="/js/app.js"></script>
    <script src="/index/js/libs.min.js"></script>
    <script type="text/javascript" src="/index/js/moment.min.js"></script>
    <script type="text/javascript" src="/index/js/daterangepicker.js"></script>
    <script type="text/javascript" src="/index/js/jquery.datetimepicker.full.min.js"></script>
    <script src="/index/js/bootstrap-slider.min.js"></script>
    <script src="/index/js/common.js"></script>
    <script src="/js/index.js"></script>
    <script src="/index/js/jquery.inputmask.js"></script>
    <script>
        $(document).ready(function () {
            $('.enter_phone').inputmask('8 (999) 999-99-99');
        });
    </script>

    @yield('js')

</body>

</html>