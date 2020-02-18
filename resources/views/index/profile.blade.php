@extends('index.layouts.layout')

@section('content')
<section class="search-result">
    <div class="container">
        <div class="row">
            <h1>Личный кабинет</h1>
        </div>
    </div>
</section>
<section class="main">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-3">
                <ul class="nav nav-tabs profile-tab">
                    <li class="active">
                        <a href="#tab-1" data-toggle="tab">
                            Мои данные
                        </a>
                    </li>
                    <li>
                        <a href="#tab-2" data-toggle="tab">
                            Мои карты
                        </a>
                    </li>
                    <li>
                        <a href="#tab-3" data-toggle="tab">
                            Мои скидки
                        </a>
                    </li>
                    <li>
                        <a href="#tab-4" data-toggle="tab">
                            Избранное
                        </a>
                    </li>
                    <li>
                        <a href="#tab-5" data-toggle="tab">
                            Уведомления
                        </a>
                    </li>
                    <li>
                        <a href="#tab-6" data-toggle="tab">
                            Мои заказы
                        </a>
                    </li>
                    <li>
                        <a href="#tab-7" data-toggle="tab">
                            Мои объекты
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-9">
                <div class="content">
                    <div class="tab-content prof-content">
                        <div class="tab-pane active" id="tab-1">
                            @if($errors->any())
                                <div class="alert alert-success dont-show">{{$errors->first()}}</div>
                            @endif
                            <form action="/profile" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="profile-info d-flex-justify">
                                    <div class="profile-info-img">
                                        <img src="{{ Auth::user()->avatar != null ? Auth::user()->avatar : '' }}"
                                            id="blah" alt="">
                                        <div class="label-file-cover">
                                            <label class="label-file">
                                                <i class="icon prof-plus"></i>
                                                <input type="file" id="imgInp" name="avatar">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="profile-info-caption">
                                        <div class="profile-info-item d-flex-justify">
                                            <label>
                                                <p>Имя</p>
                                                <input type="text" name="user_firstname"
                                                    value="{{ Auth::user()->user_firstname }}" placeholder="Ануар">
                                            </label>
                                            <label>
                                                <p>Фамилия</p>
                                                <input type="text" name="user_lastname"
                                                    value="{{ Auth::user()->user_lastname }}" placeholder="Надралиев">
                                            </label>
                                        </div>
                                        <div class="profile-info-item d-flex-justify">
                                            <label>
                                                <p>Номер телефона</p>
                                                <input type="tel" name="phone" value="{{ Auth::user()->phone }}"
                                                    placeholder="+7 707 340 92 18">
                                            </label>
                                            <label>
                                                <p>Новый пароль</p>
                                                <input type="password" name="password"
                                                    placeholder="Введите новый пароль">
                                            </label>
                                        </div>
                                        <div class="profile-info-rate d-flex-justify">
                                            <p>Ваш рейтинг — <img src="/index/img/icon/star-blue.png" alt="">
                                                <span>{{ Auth::user()->user_raiting }}</span>
                                            </p>
                                            <button class="btn-plain btn-blue">Сохранить</button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="tab-2">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 credit-cover">
                                    <div class="credit-item">
                                        <div class="credit-item-head d-flex-justify">
                                            <img src="/index/img/icon/master-card.svg" alt="">
                                            <button class="btn-plain close-credit">
                                                <img src="/index/img/icon/close.svg" alt="">
                                            </button>
                                        </div>
                                        <div class="credit-item-body">
                                            <p>5169 •••• •••• 9003</p>
                                            <span>03/22</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 credit-cover">
                                    <div class="credit-item">
                                        <div class="credit-item-head d-flex-justify">
                                            <img src="/index/img/icon/visa.svg" alt="">
                                            <button class="btn-plain close-credit">
                                                <img src="/index/img/icon/close.svg" alt="">
                                            </button>
                                        </div>
                                        <div class="credit-item-body">
                                            <p>5169 •••• •••• 9003</p>
                                            <span>03/22</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 credit-cover">
                                    <div class="credit-item">
                                        <div class="credit-item-body">
                                            <a href="#" class="btn-plain btn-pay">
                                                <i class="icon prof-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-3">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <a href="#">
                                        <div class="discount-item">
                                            <div class="discount-item-head d-flex">
                                                <span class="discount">-10%</span>
                                                <p>до 22.12.2019</p>
                                            </div>
                                            <div class="discount-item-body">
                                                <h3>Автоматизированная скидка</h3>
                                                <h4>в ONYX на 1 корт</h4>
                                                <p><span>Активна</span> в понедельник, среду, пятницу с 14:30 до 21:00
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <a href="#">
                                        <div class="discount-item">
                                            <div class="discount-item-head d-flex">
                                                <span class="discount">-10%</span>
                                                <p>до 22.12.2019</p>
                                            </div>
                                            <div class="discount-item-body">
                                                <h3>Автоматизированная скидка</h3>
                                                <h4>в ONYX на 1 корт</h4>
                                                <p><span>Активна</span> в понедельник, среду, пятницу с 14:30 до 21:00
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-4">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <a href="#">
                                        <div class="place-item">
                                            <div class="place-item-img">
                                                <img src="/index/img/main/place.png" alt="">
                                                <button class="btn-plain btn-star favorite">
                                                    <i class="icon i-star-red"></i>
                                                </button>
                                                <span class="discount">
                                                    -10%
                                                </span>
                                            </div>
                                            <div class="place-item-caption">
                                                <h3 class="d-flex"> ASA <i class="icon red-fire"></i></h3>
                                                <p>от <span>5000</span> 4500 тг/ч</p>
                                                <ul class="place-detail">
                                                    <li>
                                                        <img src="/index/img/icon/star-blue.png" alt="">
                                                        4.76 <span>(333 отзыва)</span>
                                                    </li>
                                                    <li class="border-bottom">
                                                        <img src="/index/img/icon/map.svg" alt="">
                                                        Сейфуллина проспект, 51
                                                    </li>
                                                    <li>
                                                        <img src="/index/img/icon/place-type.png" alt="">
                                                        Открытое поле
                                                        <img src="/index/img/icon/size.svg" alt="" class="size">
                                                        21X41м
                                                    </li>
                                                </ul>
                                                <button href="#" class="btn-plain btn-blue">
                                                    Подробнее
                                                </button>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <a href="#">
                                        <div class="place-item">
                                            <div class="place-item-img">
                                                <img src="/index/img/main/place.png" alt="">
                                                <button class="btn-plain btn-star favorite">
                                                    <i class="icon i-star-red"></i>
                                                </button>
                                                <span class="discount">
                                                    -10%
                                                </span>
                                            </div>
                                            <div class="place-item-caption">
                                                <h3 class="d-flex"> ASA <i class="icon red-fire"></i></h3>
                                                <p>от <span>5000</span> 4500 тг/ч</p>
                                                <ul class="place-detail">
                                                    <li>
                                                        <img src="/index/img/icon/star-blue.png" alt="">
                                                        4.76 <span>(333 отзыва)</span>
                                                    </li>
                                                    <li class="border-bottom">
                                                        <img src="/index/img/icon/map.svg" alt="">
                                                        Сейфуллина проспект, 51
                                                    </li>
                                                    <li>
                                                        <img src="/index/img/icon/place-type.png" alt="">
                                                        Открытое поле
                                                        <img src="/index/img/icon/size.svg" alt="" class="size">
                                                        21X41м
                                                    </li>
                                                </ul>
                                                <button href="#" class="btn-plain btn-blue">
                                                    Подробнее
                                                </button>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <a href="#">
                                        <div class="place-item">
                                            <div class="place-item-img">
                                                <img src="/index/img/main/place.png" alt="">
                                                <button class="btn-plain btn-star favorite">
                                                    <i class="icon i-star-red"></i>
                                                </button>
                                                <span class="discount">
                                                    -10%
                                                </span>
                                            </div>
                                            <div class="place-item-caption">
                                                <h3 class="d-flex"> ASA <i class="icon red-fire"></i></h3>
                                                <p>от <span>5000</span> 4500 тг/ч</p>
                                                <ul class="place-detail">
                                                    <li>
                                                        <img src="/index/img/icon/star-blue.png" alt="">
                                                        4.76 <span>(333 отзыва)</span>
                                                    </li>
                                                    <li class="border-bottom">
                                                        <img src="/index/img/icon/map.svg" alt="">
                                                        Сейфуллина проспект, 51
                                                    </li>
                                                    <li>
                                                        <img src="/index/img/icon/place-type.png" alt="">
                                                        Открытое поле
                                                        <img src="/index/img/icon/size.svg" alt="" class="size">
                                                        21X41м
                                                    </li>
                                                </ul>
                                                <button href="#" class="btn-plain btn-blue">
                                                    Подробнее
                                                </button>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-5">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 notification-cover">
                                    <div class="notification-item">
                                        <div class="notification-item-head d-flex-justify">
                                            <span>5 минут назад</span>
                                            <button class="btn-plain close-notification">
                                                <img src="/index/img/icon/close.svg" alt="">
                                            </button>
                                        </div>
                                        <div class="notification-item-body">
                                            <p>У вас через час забронированна игра в ONYX</p>
                                            <span>На 10 человек в 18:30</span>
                                        </div>
                                        <a href="#" class="btn-plain btn-blue">
                                            Перейти к брони
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 notification-cover">
                                    <div class="notification-item">
                                        <div class="notification-item-head d-flex-justify">
                                            <span>3 дня назад</span>
                                            <button class="btn-plain close-notification">
                                                <img src="/index/img/icon/close.svg" alt="">
                                            </button>
                                        </div>
                                        <div class="notification-item-body">
                                            <p>Ожидается оплата бронирование в ONYX</p>
                                            <span>Оплата: 2500 тенге</span>
                                        </div>
                                        <a href="#" class="btn-plain btn-blue">
                                            Перейти к оплате
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 notification-cover">
                                    <div class="notification-item">
                                        <div class="notification-item-head d-flex-justify">
                                            <span>5 минут назад</span>
                                            <button class="btn-plain close-notification">
                                                <img src="/index/img/icon/close.svg" alt="">
                                            </button>
                                        </div>
                                        <div class="notification-item-body">
                                            <p>Ваш матч готов, 10/10 игроков найдены на футбол в ONYX</p>
                                        </div>
                                        <a href="#" class="btn-plain btn-blue">
                                            Перейти к матчу
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane orders" id="tab-6">
                            <div class="row">
                                <div class="col-md-4 col-sm-6">
                                    <div class="place-item">
                                        <div class="place-item-img">
                                            <img src="/index/img/main/place.png" alt="">
                                        </div>
                                        <div class="place-item-caption">
                                            <h3>ASA</h3>
                                            <div class="place-info">
                                                <span class="span-title">Адрес</span>
                                                <p>Алматы, микрорайон Таугуль-3, улица Беркимбая Паримбетова, 64</p>
                                            </div>
                                            <div class="place-info">
                                                <span class="span-title">Статус бронирования</span>
                                                <p class="wait-blue d-flex-justify"><a href="#">Ожидает оплаты</a> <i
                                                        class="icon arr-blue"></i></p>
                                            </div>
                                            <div class="place-info">
                                                <span class="span-title">Стоимость</span>
                                                <p>5000 тг/ч</p>
                                            </div>
                                            <div class="place-info">
                                                <span class="span-title">Дата и время бронирования</span>
                                                <p>19 октября 2019 года, с 18:00 до 19:30</p>
                                            </div>
                                            <a href="#"><button href="#" class="btn-plain btn-blue">
                                                    Подробнее
                                                </button></a>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="place-item">
                                        <div class="place-item-img">
                                            <img src="/index/img/main/place.png" alt="">
                                        </div>
                                        <div class="place-item-caption">
                                            <h3>ASA</h3>
                                            <div class="place-info">
                                                <span class="span-title">Адрес</span>
                                                <p>Алматы, микрорайон Таугуль-3, улица Беркимбая Паримбетова, 64</p>
                                            </div>
                                            <div class="place-info">
                                                <span class="span-title">Статус бронирования</span>
                                                <p class="wait-green d-flex-justify">Оплачено <i
                                                        class="icon arr-check"></i></p>
                                            </div>
                                            <div class="place-info">
                                                <span class="span-title">Стоимость</span>
                                                <p>5000 тг/ч</p>
                                            </div>
                                            <div class="place-info">
                                                <span class="span-title">Дата и время бронирования</span>
                                                <p>19 октября 2019 года, с 18:00 до 19:30</p>
                                            </div>
                                            <a href="#"><button href="#" class="btn-plain btn-blue">
                                                    Подробнее
                                                </button></a>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="place-item">
                                        <div class="place-item-img">
                                            <img src="/index/img/main/place.png" alt="">
                                        </div>
                                        <div class="place-item-caption">
                                            <h3>ASA</h3>
                                            <div class="place-info">
                                                <span class="span-title">Адрес</span>
                                                <p>Алматы, микрорайон Таугуль-3, улица Беркимбая Паримбетова, 64</p>
                                            </div>
                                            <div class="place-info">
                                                <span class="span-title">Статус бронирования</span>
                                                <p class="wait-red d-flex-justify">Отменен <i class="icon arr-x"></i>
                                                </p>
                                            </div>
                                            <div class="place-info">
                                                <span class="span-title">Стоимость</span>
                                                <p>5000 тг/ч</p>
                                            </div>
                                            <div class="place-info">
                                                <span class="span-title">Дата и время бронирования</span>
                                                <p>19 октября 2019 года, с 18:00 до 19:30</p>
                                            </div>
                                            <a href="#"><button href="#" class="btn-plain btn-blue">
                                                    Подробнее
                                                </button></a>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="place-item">
                                        <div class="place-item-img">
                                            <img src="/index/img/main/place.png" alt="">
                                        </div>
                                        <div class="place-item-caption">
                                            <h3>ASA</h3>
                                            <div class="place-info">
                                                <span class="span-title">Адрес</span>
                                                <p>Алматы, микрорайон Таугуль-3, улица Беркимбая Паримбетова, 64</p>
                                            </div>
                                            <div class="place-info">
                                                <span class="span-title">Статус бронирования</span>
                                                <p class="wait-blue d-flex-justify"><a href="#">Ожидает оплаты</a> <i
                                                        class="icon arr-blue"></i></p>
                                            </div>
                                            <div class="place-info">
                                                <span class="span-title">Стоимость</span>
                                                <p>5000 тг/ч</p>
                                            </div>
                                            <div class="place-info">
                                                <span class="span-title">Дата и время бронирования</span>
                                                <p>19 октября 2019 года, с 18:00 до 19:30</p>
                                            </div>
                                            <a href="#"><button href="#" class="btn-plain btn-blue">
                                                    Подробнее
                                                </button></a>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="place-item">
                                        <div class="place-item-img">
                                            <img src="/index/img/main/place.png" alt="">
                                        </div>
                                        <div class="place-item-caption">
                                            <h3>ASA</h3>
                                            <div class="place-info">
                                                <span class="span-title">Адрес</span>
                                                <p>Алматы, микрорайон Таугуль-3, улица Беркимбая Паримбетова, 64</p>
                                            </div>
                                            <div class="place-info">
                                                <span class="span-title">Статус бронирования</span>
                                                <p class="wait-green d-flex-justify">Оплачено <i
                                                        class="icon arr-check"></i></p>
                                            </div>
                                            <div class="place-info">
                                                <span class="span-title">Стоимость</span>
                                                <p>5000 тг/ч</p>
                                            </div>
                                            <div class="place-info">
                                                <span class="span-title">Дата и время бронирования</span>
                                                <p>19 октября 2019 года, с 18:00 до 19:30</p>
                                            </div>
                                            <a href="#"><button href="#" class="btn-plain btn-blue">
                                                    Подробнее
                                                </button></a>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="place-item">
                                        <div class="place-item-img">
                                            <img src="/index/img/main/place.png" alt="">
                                        </div>
                                        <div class="place-item-caption">
                                            <h3>ASA</h3>
                                            <div class="place-info">
                                                <span class="span-title">Адрес</span>
                                                <p>Алматы, микрорайон Таугуль-3, улица Беркимбая Паримбетова, 64</p>
                                            </div>
                                            <div class="place-info">
                                                <span class="span-title">Статус бронирования</span>
                                                <p class="wait-red d-flex-justify">Отменен <i class="icon arr-x"></i>
                                                </p>
                                            </div>
                                            <div class="place-info">
                                                <span class="span-title">Стоимость</span>
                                                <p>5000 тг/ч</p>
                                            </div>
                                            <div class="place-info">
                                                <span class="span-title">Дата и время бронирования</span>
                                                <p>19 октября 2019 года, с 18:00 до 19:30</p>
                                            </div>
                                            <a href="#"><button href="#" class="btn-plain btn-blue">
                                                    Подробнее
                                                </button></a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane orders" id="tab-7">
                            <div class="row">
                                <div class="col-md-4 col-sm-6">
                                    <div class="place-item">
                                        <div class="place-item-img">
                                            <img src="/index/img/main/place.png" alt="">
                                        </div>
                                        <div class="place-item-caption">
                                            <h3>ASA</h3>
                                            <div class="place-info">
                                                <span class="span-title">Адрес</span>
                                                <p>Алматы, микрорайон Таугуль-3, улица Беркимбая Паримбетова, 64</p>
                                            </div>
                                            <div class="place-info">
                                                <span class="span-title">Статус бронирования</span>
                                                <p class="wait-grey d-flex-justify">В обработке <i
                                                        class="icon i-load"></i></p>
                                            </div>
                                            <div class="place-info">
                                                <span class="span-title">Стоимость</span>
                                                <p>5000 тг/ч</p>
                                            </div>
                                            <div class="place-info">
                                                <span class="span-title">Дата и время бронирования</span>
                                                <p>19 октября 2019 года, с 18:00 до 19:30</p>
                                            </div>
                                            <a href="#"><button href="#" class="btn-plain btn-blue">
                                                    Подробнее
                                                </button></a>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="place-item">
                                        <div class="place-item-img">
                                            <img src="/index/img/main/place.png" alt="">
                                        </div>
                                        <div class="place-item-caption">
                                            <h3>ASA</h3>
                                            <div class="place-info">
                                                <span class="span-title">Адрес</span>
                                                <p>Алматы, микрорайон Таугуль-3, улица Беркимбая Паримбетова, 64</p>
                                            </div>
                                            <div class="place-info">
                                                <span class="span-title">Статус бронирования</span>
                                                <p class="wait-blue d-flex-justify"><a href="#">Ожидает оплаты</a> <i
                                                        class="icon arr-blue"></i></p>
                                            </div>
                                            <div class="place-info">
                                                <span class="span-title">Стоимость</span>
                                                <p>5000 тг/ч</p>
                                            </div>
                                            <div class="place-info">
                                                <span class="span-title">Дата и время бронирования</span>
                                                <p>19 октября 2019 года, с 18:00 до 19:30</p>
                                            </div>
                                            <a href="#"><button href="#" class="btn-plain btn-blue">
                                                    Подробнее
                                                </button></a>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="place-item">
                                        <div class="place-item-img">
                                            <img src="/index/img/main/place.png" alt="">
                                        </div>
                                        <div class="place-item-caption">
                                            <h3>ASA</h3>
                                            <div class="place-info">
                                                <span class="span-title">Адрес</span>
                                                <p>Алматы, микрорайон Таугуль-3, улица Беркимбая Паримбетова, 64</p>
                                            </div>
                                            <div class="place-info">
                                                <span class="span-title">Статус бронирования</span>
                                                <p class="wait-red d-flex-justify">Отменен <i class="icon arr-x"></i>
                                                </p>
                                            </div>
                                            <div class="place-info">
                                                <span class="span-title">Стоимость</span>
                                                <p>5000 тг/ч</p>
                                            </div>
                                            <div class="place-info">
                                                <span class="span-title">Дата и время бронирования</span>
                                                <p>19 октября 2019 года, с 18:00 до 19:30</p>
                                            </div>
                                            <a href="#"><button href="#" class="btn-plain btn-blue">
                                                    Подробнее
                                                </button></a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection