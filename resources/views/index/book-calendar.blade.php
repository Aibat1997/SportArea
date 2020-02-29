@extends('index.layouts.layout')

@section('css')
    <link rel="stylesheet" href="/index/css/jquery.datetimepicker.min.css">
    <link rel="stylesheet" href="/index/slick/slick.css">
    <link rel="stylesheet" href="/index/slick/slick-theme.css">
@endsection

@section('content')
    @php
        $court = App\Models\Courts::find(request()->court);
        $complex = $court->complex;
        $courts = $complex->courts;
    @endphp


    <section class="search-result">
        <div class="container">
            <h1>{{ $complex->sc_name }}</h1>
        </div>
    </section>
    <section class="main object-inside">
        <div class="container">
            <div class="nav-top-cover d-flex d-flex-justify">
                <ul class="dropdown-select">
                    <li class="dropdown">
                        <a href="objects-calendar.html" class="dropdown-toggle d-flex" data-toggle="dropdown">
                            Таблица по дате
                            <i class="fas fa-chevron-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="objects-court.html">Таблица по кортам</a></li>
                            <li><a href="objects-calendar.html">Таблица по дате</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav nav-tabs court-tabs">
                    @foreach($courts as $item)
                        <li class="{{ $item->c_id == request()->court ? 'active' : '' }}">
                            <a href="#tab-{{ $item->c_id }}" data-toggle="tab">
                                {{ $item->c_name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                <a href="/add-book" class="btn-plain btn-blue">Забронировать</a>
            </div>
            <div class="tab-content object-content">
                <div class="tab-pane active" id="tab-1">
                    <form action="#">

                        <div class="sl-calendar-cover">

                            <div class="sl-calendar-for">
                                <div class="calendar-item">
                                    <p>4 ноября</p>
                                    <span>Понедельник</span>
                                </div>
                                <div class="calendar-item">
                                    <p>5 ноября</p>
                                    <span>Понедельник</span>
                                </div>
                                <div class="calendar-item">
                                    <p>6 ноября</p>
                                    <span>Понедельник</span>
                                </div>
                                <div class="calendar-item">
                                    <p>7 ноября</p>
                                    <span>Понедельник</span>
                                </div>
                                <div class="calendar-item">
                                    <p>8 ноября</p>
                                </div>
                                <div class="calendar-item">
                                    <p>9 ноября</p>
                                </div>
                                <div class="calendar-item">
                                    <p>10 ноября</p>
                                </div>
                            </div>
                            <div class="sl-calendar-body">
                                <div class="calendar-body-time">
                                    <ul class="time-list">
                                        <li>08:00</br>08:30</li>
                                        <li>08:00</br>08:30</li>
                                        <li>08:00</br>08:30</li>
                                        <li>08:00</br>08:30</li>
                                        <li>08:00</br>08:30</li>
                                        <li>08:00</br>08:30</li>
                                        <li>08:00</br>08:30</li>
                                        <li>08:00</br>08:30</li>
                                        <li>08:00</br>08:30</li>
                                        <li>08:00</br>08:30</li>
                                    </ul>
                                </div>
                                <div class="sl-calendar-nav">
                                    <ul class="calendar-list">
                                        <li><a class="btn-plain">
                                                <img src="img/icon/plus.png" alt=""></a>
                                            <div class="book-card">
                                                <div class="book-card-caption">
                                                    <h3>Union</h3>
                                                    <span><i class="icon book-circle"></i>Разовая бронь</span>
                                                    <p>+7 707 138 90 93</p>
                                                    <p class="td-green">7/10 человек</p>
                                                </div>
                                                <a class="btn-plain edit-book" href="book-edit.html">
                                                    <i class="icon book-edit"></i>
                                                    Редактировать
                                                </a>
                                                <button class="btn-plain client-delete">
                                                    <i class="icon book-delete"></i>
                                                    Удалить бронь
                                                </button>
                                            </div>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                            <!--<button class="btn-plain">-->
                                            <!---->
                                            <!--</button>-->
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                    </ul>
                                    <ul class="calendar-list">
                                        <li>
                                            <a class="btn-plain"><img src="img/icon/plus.png"
                                                                      alt=""></a>
                                            <div class="book-card">
                                                <div class="book-card-caption">
                                                    <h3>Алексей П.</h3>
                                                    <span class="td-blue"><i class="icon book-circle-blue"></i>Постоянный клиент</span>
                                                    <p>+7 707 138 90 93</p>
                                                </div>
                                                <a class="btn-plain edit-book" href="book-edit.html">
                                                    <i class="icon book-edit"></i>
                                                    Редактировать
                                                </a>
                                                <button class="btn-plain client-delete">
                                                    <i class="icon book-delete"></i>
                                                    Удалить бронь
                                                </button>
                                            </div>

                                        </li>
                                        <li>
                                            <a class="btn-plain"><img src="img/icon/plus.png"
                                                                      alt=""></a>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                    </ul>
                                    <ul class="calendar-list">
                                        <li>
                                            <a class="btn-plain"><img src="img/icon/plus.png"
                                                                      alt=""></a>
                                            <div class="book-card">
                                                <div class="book-card-caption">
                                                    <h3>Алексей П.</h3>
                                                    <span class="td-green"><i class="icon book-circle-green"></i>Постоянный клиент</span>
                                                    <p>+7 707 138 90 93</p>
                                                </div>
                                                <a class="btn-plain edit-book" href="book-edit.html">
                                                    <i class="icon book-edit"></i>
                                                    Редактировать
                                                </a>
                                                <button class="btn-plain client-delete">
                                                    <i class="icon book-delete"></i>
                                                    Удалить бронь
                                                </button>
                                            </div>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                    </ul>
                                    <ul class="calendar-list">
                                        <li>
                                            <a class="btn-plain"><img src="img/icon/plus.png"
                                                                      alt=""></a>
                                            <div class="book-card book-full">
                                                <div class="book-card-caption">
                                                    <h3>Закрыто</h3>
                                                    <p>На техническом обслуживании</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                    </ul>
                                    <ul class="calendar-list">
                                        <li>
                                            <a class="btn-plain"><img src="img/icon/plus.png"
                                                                      alt=""></a>
                                            <div class="book-card">
                                                <div class="book-card-caption">
                                                    <h3>Алексей П.</h3>
                                                    <span><i class="icon book-circle"></i>Разовая бронь</span>
                                                    <p>+7 707 138 90 93</p>
                                                    <span class="discount">-10%</span>
                                                </div>
                                                <button class="btn-plain client-delete">
                                                    <i class="icon book-delete"></i>
                                                    Удалить бронь
                                                </button>
                                            </div>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                    </ul>
                                    <ul class="calendar-list">
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                    </ul>
                                    <ul class="calendar-list">
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                        <li>
                                            <label class="checkbox-label">
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                                <img src="img/icon/plus.png" alt="">
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                    </form>
                </div>
                <div class="tab-pane" id="tab-2">
                </div>
                <div class="tab-pane" id="tab-3">
                    <div class="discount-box">
                        <div class="row">
                            <div class="col-md-3 col-sm-4">
                                <div class="discount-cover">
                                    <h2>Активные скидки</h2>
                                    <ul class="discount-list">
                                        <li>
                                            <a href="#">
                                                <div class="discount-list-item">
                                                    <h3>Автоматизированная скидка</h3>
                                                    <p>5% скидка при регистрации</p>
                                                    <span>Деактивировать</span>
                                                </div>
                                            </a>
                                            <img src="img/icon/discount-elipsis.svg" alt="" class="discount-elipsis">
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="discount-list-item">
                                                    <h3>Автоматизированная скидка</h3>
                                                    <p>5% скидка при регистрации</p>
                                                    <span>Деактивировать</span>
                                                </div>
                                            </a>
                                            <img src="img/icon/discount-elipsis.svg" alt="" class="discount-elipsis">
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="discount-list-item">
                                                    <h3>Автоматизированная скидка</h3>
                                                    <p>5% скидка при регистрации</p>
                                                    <span>Деактивировать</span>
                                                </div>
                                            </a>
                                            <img src="img/icon/discount-elipsis.svg" alt="" class="discount-elipsis">
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="discount-list-item">
                                                    <h3>Автоматизированная скидка</h3>
                                                    <p>5% скидка при регистрации</p>
                                                    <span>Деактивировать</span>
                                                </div>
                                            </a>
                                            <img src="img/icon/discount-elipsis.svg" alt="" class="discount-elipsis">
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="discount-list-item">
                                                    <h3>Автоматизированная скидка</h3>
                                                    <p>5% скидка при регистрации</p>
                                                    <span>Деактивировать</span>
                                                </div>
                                            </a>
                                            <img src="img/icon/discount-elipsis.svg" alt="" class="discount-elipsis">
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="discount-list-item">
                                                    <h3>Автоматизированная скидка</h3>
                                                    <p>5% скидка при регистрации</p>
                                                    <span>Деактивировать</span>
                                                </div>
                                            </a>
                                            <img src="img/icon/discount-elipsis.svg" alt="" class="discount-elipsis">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-9 col-sm-8">
                                <div class="discount-create">
                                    <h2>Создание скидки</h2>
                                    <form action="#">
                                        <div class="object-filter static-filter d-flex-justify">
                                            <div class="sidebar-item">
                                                <label class="select-label select">
                                                    <select name="#">
                                                        <option>Общая скидка</option>
                                                        <option>Индивидуальная скидка</option>
                                                        <option>Автоматизированная скидка</option>
                                                    </select>
                                                    <i class="fas fa-chevron-down arrow-select"></i>
                                                </label>
                                            </div>
                                            <div class="sidebar-item">
                                                <label class="select-label input-search">
                                                    <input type="text" placeholder="Сентябрь – Октябрь" class="datefilter">
                                                    <i class="icon i-calendar"></i>
                                                </label>
                                            </div>
                                            <div class="sidebar-item">
                                                <label class="select-label input-search">
                                                    <input type="text" placeholder="По времени" class="single_time">
                                                    <i class="icon i-clock"></i>
                                                </label>
                                            </div>
                                            <div class="sidebar-item">
                                                <label class="select-label input-search">
                                                    <input type="text" placeholder="Сумма скидки" class="discount-price">
                                                    <div class="discount-price-cover d-flex">
                                                        <label class="checkbox-container">
                                                            <input type="checkbox" checked="checked">
                                                            <span class="checkmark">
                                                            тг
                                                        </span>
                                                        </label>

                                                        <label class="checkbox-container">
                                                            <input type="checkbox">
                                                            <span class="checkmark">
                                                           %
                                                        </span>
                                                        </label>

                                                    </div>
                                                </label>
                                            </div>
                                            <div class="sidebar-item">
                                                <div class="weekdays"></div>
                                            </div>
                                            <div class="sidebar-item">
                                                <button class="btn-plain btn-blue">Создать скидку</button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="discount-ind-cover">
                                        <form action="#">
                                            <div class="object-filter static-filter d-flex-justify">
                                                <div class="sidebar-item">
                                                    <label class="select-label select">
                                                        <select name="#">
                                                            <option value="">Индивидуальная скидка</option>
                                                            <option value="">Общая скидка</option>
                                                            <option value="">Автоматизированная скидка</option>
                                                        </select>
                                                        <i class="fas fa-chevron-down arrow-select"></i>
                                                    </label>
                                                </div>
                                                <div class="sidebar-item">
                                                    <label class="select-label select datalist">
                                                        <i class="icon user"></i>
                                                        <input list="browsers" placeholder="Логин клиента">
                                                        <datalist id="browsers">
                                                            <option value="Internet Explorer">
                                                            <option value="Firefox">
                                                            <option value="Chrome">
                                                            <option value="Opera">
                                                            <option value="Safari">
                                                        </datalist>
                                                        <i class="fas fa-chevron-down arrow-select"></i>
                                                    </label>

                                                </div>
                                                <div class="sidebar-item">
                                                    <label class="select-label input-search">
                                                        <input type="text" placeholder="Сумма скидки"
                                                               class="discount-price">
                                                        <div class="discount-price-cover d-flex">
                                                            <label class="checkbox-container">
                                                                <input type="checkbox" checked="checked">
                                                                <span class="checkmark">
                                                            тг
                                                        </span>
                                                            </label>

                                                            <label class="checkbox-container">
                                                                <input type="checkbox">
                                                                <span class="checkmark">
                                                           %
                                                        </span>
                                                            </label>

                                                        </div>
                                                    </label>
                                                </div>
                                                <div class="sidebar-item">
                                                    <label class="input-search">
                                                        <input type="text" placeholder="Стоимость аренды за час">
                                                    </label>
                                                </div>
                                                <div class="sidebar-item">
                                                    <label class="select-label input-search">
                                                        <input type="text" placeholder="Сентябрь – Октябрь"
                                                               class="datefilter">
                                                        <i class="icon i-calendar"></i>
                                                    </label>
                                                </div>
                                                <div class="sidebar-item">
                                                    <label class="select-label input-search">
                                                        <input type="text" placeholder="По времени" class="single_time">
                                                        <i class="icon i-clock"></i>
                                                    </label>
                                                </div>
                                                <div class="sidebar-item">
                                                    <button class="btn-plain btn-blue">Создать скидку</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="discount-auto-cover">
                                        <form action="#">
                                            <div class="object-filter static-filter d-flex-justify">
                                                <div class="sidebar-item">
                                                    <label class="select-label select">
                                                        <select name="#">
                                                            <option value="">Автоматизированная скидка</option>
                                                            <option value="">Общая скидка</option>
                                                            <option value="">Индивидуальная скидка</option>
                                                        </select>
                                                        <i class="fas fa-chevron-down arrow-select"></i>
                                                    </label>
                                                </div>
                                                <div class="sidebar-item">
                                                    <label class="input-search">
                                                        <input type="text" placeholder="После скольки часов">
                                                    </label>
                                                </div>
                                                <div class="sidebar-item">
                                                    <label class="select-label input-search">
                                                        <input type="text" placeholder="Сумма скидки"
                                                               class="discount-price">
                                                        <div class="discount-price-cover d-flex">
                                                            <label class="checkbox-container">
                                                                <input type="checkbox" checked="checked">
                                                                <span class="checkmark">
                                                            тг
                                                        </span>
                                                            </label>

                                                            <label class="checkbox-container">
                                                                <input type="checkbox">
                                                                <span class="checkmark">
                                                           %
                                                        </span>
                                                            </label>

                                                        </div>
                                                    </label>
                                                </div>
                                                <div class="sidebar-item">
                                                    <label class="select-label input-search">
                                                        <input type="text" placeholder="Сентябрь – Октябрь"
                                                               class="datefilter">
                                                        <i class="icon i-calendar"></i>
                                                    </label>
                                                </div>
                                                <div class="sidebar-item">
                                                    <label class="select-label input-search">
                                                        <input type="text" placeholder="По времени" class="single_time">
                                                        <i class="icon i-clock"></i>
                                                    </label>
                                                </div>
                                                <div class="sidebar-item">
                                                    <button class="btn-plain btn-blue">Создать скидку</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab-4">
                    <div class="object-modify">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="object-modify-item">
                                    <h2>Будние дни</h2>
                                    <div class="modify-form">
                                        <div class="modify-form-head d-flex-justify">
                                            <h3>Понедельник</h3>
                                            <div class="checkbox-cover">
                                                <input type='checkbox' class='ios8-switch checkbox-attr' id='checkbox-20'>
                                                <label for='checkbox-20'></label>
                                            </div>
                                        </div>
                                        <div class="modify-form-body">
                                            <div class="inventar-label d-flex">
                                                <div class="checkbox-cover">
                                                    <input type="text" placeholder="с 06:00 до 04:00" class="datefilter">
                                                    <i class="icon i-time"></i>
                                                </div>
                                                <label class="price-current">
                                                    <input type="text" placeholder="Цена" class="input-attr">
                                                    <i class="icon i-tg"></i>
                                                    <button class="btn-plain add-invent"><img src="img/icon/add-invent.png"
                                                                                              alt=""></button>
                                                </label>
                                            </div>
                                            <div class="inventar-label d-flex">
                                                <div class="checkbox-cover">
                                                    <input type="text" placeholder="с 06:00 до 04:00" class="datefilter">
                                                    <i class="icon i-time"></i>
                                                </div>
                                                <label class="price-current">
                                                    <input type="text" placeholder="Цена" class="input-attr">
                                                    <i class="icon i-tg"></i>
                                                    <button class="btn-plain add-invent"><img
                                                            src="img/icon/delete-invent.png" alt=""></button>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modify-form">
                                        <div class="modify-form-head d-flex-justify">
                                            <h3>Вторник</h3>
                                            <div class="checkbox-cover">
                                                <input type='checkbox' class='ios8-switch checkbox-attr' id='checkbox-25'>
                                                <label for='checkbox-25'></label>
                                            </div>
                                        </div>
                                        <div class="modify-form-body">
                                            <div class="inventar-label d-flex">
                                                <div class="checkbox-cover">
                                                    <input type="text" placeholder="с 06:00 до 04:00" class="datefilter">
                                                    <i class="icon i-time"></i>
                                                </div>
                                                <label class="price-current">
                                                    <input type="text" placeholder="Цена" class="input-attr">
                                                    <i class="icon i-tg"></i>
                                                    <button class="btn-plain add-invent"><img src="img/icon/add-invent.png"
                                                                                              alt=""></button>
                                                </label>
                                            </div>
                                            <div class="inventar-label d-flex">
                                                <div class="checkbox-cover">
                                                    <input type="text" placeholder="с 06:00 до 04:00" class="datefilter">
                                                    <i class="icon i-time"></i>
                                                </div>
                                                <label class="price-current">
                                                    <input type="text" placeholder="Цена" class="input-attr">
                                                    <i class="icon i-tg"></i>
                                                    <button class="btn-plain add-invent"><img
                                                            src="img/icon/delete-invent.png" alt=""></button>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="object-modify-item">
                                    <h2>Выходные дни</h2>
                                    <div class="modify-form">
                                        <div class="modify-form-head d-flex-justify">
                                            <h3>Суббота</h3>
                                            <div class="checkbox-cover">
                                                <input type='checkbox' class='ios8-switch checkbox-attr' id='checkbox-20'>
                                                <label for='checkbox-20'></label>
                                            </div>
                                        </div>
                                        <div class="modify-form-body">
                                            <div class="inventar-label d-flex">
                                                <div class="checkbox-cover">
                                                    <input type="text" placeholder="с 06:00 до 04:00" class="datefilter">
                                                    <i class="icon i-time"></i>
                                                </div>
                                                <label class="price-current">
                                                    <input type="text" placeholder="Цена" class="input-attr">
                                                    <i class="icon i-tg"></i>
                                                    <button class="btn-plain add-invent"><img src="img/icon/add-invent.png"
                                                                                              alt=""></button>
                                                </label>
                                            </div>
                                            <div class="inventar-label d-flex">
                                                <div class="checkbox-cover">
                                                    <input type="text" placeholder="с 06:00 до 04:00" class="datefilter">
                                                    <i class="icon i-time"></i>
                                                </div>
                                                <label class="price-current">
                                                    <input type="text" placeholder="Цена" class="input-attr">
                                                    <i class="icon i-tg"></i>
                                                    <button class="btn-plain add-invent"><img
                                                            src="img/icon/delete-invent.png" alt=""></button>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modify-form">
                                        <div class="modify-form-head d-flex-justify">
                                            <h3>Воскресение</h3>
                                            <div class="checkbox-cover">
                                                <input type='checkbox' class='ios8-switch checkbox-attr' id='checkbox-25'>
                                                <label for='checkbox-25'></label>
                                            </div>
                                        </div>
                                        <div class="modify-form-body">
                                            <div class="inventar-label d-flex">
                                                <div class="checkbox-cover">
                                                    <input type="text" placeholder="с 06:00 до 04:00" class="datefilter">
                                                    <i class="icon i-time"></i>
                                                </div>
                                                <label class="price-current">
                                                    <input type="text" placeholder="Цена" class="input-attr">
                                                    <i class="icon i-tg"></i>
                                                    <button class="btn-plain add-invent"><img src="img/icon/add-invent.png"
                                                                                              alt=""></button>
                                                </label>
                                            </div>
                                            <div class="inventar-label d-flex">
                                                <div class="checkbox-cover">
                                                    <input type="text" placeholder="с 06:00 до 04:00" class="datefilter">
                                                    <i class="icon i-time"></i>
                                                </div>
                                                <label class="price-current">
                                                    <input type="text" placeholder="Цена" class="input-attr">
                                                    <i class="icon i-tg"></i>
                                                    <button class="btn-plain add-invent"><img
                                                            src="img/icon/delete-invent.png" alt=""></button>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="object-modify-item">
                                    <h2>Закрыть объект</h2>
                                    <div class="modify-form">
                                        <div class="modify-form-head d-flex-justify">
                                            <h3>Укажите дату закрытия</h3>
                                            <div class="checkbox-cover">
                                                <input type='checkbox' class='ios8-switch checkbox-attr' id='checkbox-25'>
                                                <label for='checkbox-25'></label>
                                            </div>
                                        </div>
                                        <div class="modify-form-body">
                                            <div class="inventar-label d-flex">
                                                <div class="checkbox-cover">
                                                    <input type="text" placeholder="с 06:00 до 04:00" class="datefilter">
                                                    <i class="icon i-time"></i>
                                                </div>
                                            </div>
                                            <div class="inventar-label d-flex">
                                                <div class="checkbox-cover">
                                                    <input type="text" placeholder="Причина закрытия">
                                                    <i class="icon i-info"></i>
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
        </div>
    </section>
    <div class="question-popup delete-client">
        <div class="question-popup-head d-flex-justify">
            <h3>Отмена брони</h3>
            <button class="btn-plain close-popup"><i class="fas fa-times"></i></button>
        </div>
        <form action="#">
            <h3>Вернуть денги ?</h3>
            <label class="radio-custom">
                Да
                <input type="checkbox" checked="checked">
                <span class="checkmark"></span>
            </label>

            <label class="radio-custom">
                Нет
                <input type="checkbox">
                <span class="checkmark"></span>
            </label>
            <button class="btn-plain btn-blue" type="submit">Подтвердить</button>
        </form>
    </div>
    <div class="overlay"></div>
@endsection

@section('js')
    <script type="text/javascript" src="/index/slick/slick.js"></script>
    <script type="text/javascript">
        $('.select').on('click', function () {
            $(this).find('.arrow-select').toggleClass('arrow-up')
        });

        $('.sl-calendar-for').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            arrows: true,
            asNavFor: '.sl-calendar-nav',
            centerMode: true,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
        $('.sl-calendar-nav').slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            arrows: false,
            asNavFor: '.sl-calendar-for',
            centerMode: true,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });

        jQuery.datetimepicker.setLocale('ru');

        jQuery('.datetimepicker').datetimepicker({
            timepicker: false,
            format: 'd.m.Y'
        });
        $(function () {

            $('.datefilter').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    "format": "DD/MM/YYYY",
                    "separator": " - ",
                    "applyLabel": "Применить",
                    "cancelLabel": "Отмена",
                    "fromLabel": "De",
                    "toLabel": "RU",
                    "customRangeLabel": "Custom",
                    "daysOfWeek": [
                        "Пн",
                        "Вт",
                        "Ср",
                        "Чт",
                        "Пт",
                        "Сб",
                        "Вс"
                    ],
                    "monthNames": [
                        "Январь",
                        "Февраль",
                        "Март",
                        "Апрель",
                        "Май",
                        "Июнь",
                        "Июль",
                        "Август",
                        "Сентябрь",
                        "Октябрь",
                        "Ноябрь",
                        "Декабрь"
                    ],
                    "firstDay": 0
                }
            });

            $('.datefilter').on('apply.daterangepicker', function (ev, picker) {
                $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
            });

            $('.datefilter').on('cancel.daterangepicker', function (ev, picker) {
                $(this).val('');
            });

            $('.single_time').daterangepicker({
                timePicker: true,
                timePicker24Hour: true,
                timePickerIncrement: 1,
                timePickerSeconds: false,
                locale: {
                    format: 'HH:mm'
                }
            }).on('show.daterangepicker', function (ev, picker) {
                picker.container.find(".calendar-table").hide();
            });

        });

        $('.checkbox-label').on('click',function () {

            var prevChecked=$(this).parent('li').prev('li').find('input:checkbox');
            var secondCheck = $(this).parent('li').next('li').find('input:checkbox');

            var allChecked = $(this).parent('li').prevAll().find('input:checked');

//        for (var item in allChecked) {
//            allChecked[ item ].attr("checked", false);
//        }
            console.log(allChecked)
            if(!prevChecked.is(':checked')){
                secondCheck.attr("checked", true);
            }else{
                secondCheck.attr("checked", false);
            }
        })
    </script>
@endsection
