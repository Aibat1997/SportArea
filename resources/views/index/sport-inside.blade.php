@extends('index.layouts.layout')    

@section('content')
<section class="place-top">
    <img src="/index/img/main/main-football.png" alt="">
    <div class="container">
        <h1>Футбол</h1>
    </div>
</section>
<section class="main">
    <div class="container">
        <div class="row">
            <div class="sidebar sticky">
                <button class="btn-plain close-filter d-flex hidden-lg hidden-md hidden-sm">
                    <i class="fas fa-times"></i>
                    Закрыть фильтр
                </button>
                <form action="#">
                    <div class="sidebar-item">
                        <label class="select-label select">
                            <select name="#">
                                <option value="">По возрастанию цены</option>
                                <option value="">По возрастанию цены 1</option>
                                <option value="">По возрастанию цены 2</option>
                            </select>
                            <i class="fas fa-chevron-down arrow-select"></i>
                        </label>
                        <label class="select-label select">
                            <select name="#">
                                <option value="">Алматы</option>
                                <option value="">Алматы 1</option>
                                <option value="">Алматы 2</option>
                            </select>
                            <i class="fas fa-chevron-down arrow-select"></i>
                        </label>
                        <label class="select-label select">
                            <select name="#">
                                <option value="">Тип площадки</option>
                                <option value="">Тип площадки 1</option>
                                <option value="">Тип площадки 2</option>
                            </select>
                            <i class="fas fa-chevron-down arrow-select"></i>
                        </label>
                        <label class="select-label select">
                            <select name="#">
                                <option value="">Тип покрытия</option>
                                <option value="">Тип покрытия 1</option>
                                <option value="">Тип покрытия 2</option>
                            </select>
                            <i class="fas fa-chevron-down arrow-select"></i>
                        </label>
                        <label class="input-label">
                            <input type="text" placeholder="Стоимость от">
                            <input type="text" placeholder="Стоимость до">
                        </label>
                    </div>
                    <div class="sidebar-item">
                        <h2>Инфраструктура</h2>
                        <div class="checkbox-cover">
                            <input type='checkbox' class='ios8-switch' id='checkbox-1'>
                            <label for='checkbox-1'>Тренер</label>
                        </div>
                        <div class="checkbox-cover">
                            <input type='checkbox' class='ios8-switch' id='checkbox-2'>
                            <label for='checkbox-2'>Туалет</label>
                        </div>
                        <div class="checkbox-cover">
                            <input type='checkbox' class='ios8-switch' id='checkbox-3'>
                            <label for='checkbox-3'>Трибуны</label>
                        </div>
                        <div class="checkbox-cover">
                            <input type='checkbox' class='ios8-switch' id='checkbox-4'>
                            <label for='checkbox-4'>Освещение</label>
                        </div>
                        <div class="checkbox-cover">
                            <input type='checkbox' class='ios8-switch' id='checkbox-5'>
                            <label for='checkbox-5'>Раздевалки</label>
                        </div>
                        <div class="checkbox-cover">
                            <input type='checkbox' class='ios8-switch' id='checkbox-6'>
                            <label for='checkbox-6'>Сауна</label>
                        </div>
                        </div>
                    <div class="sidebar-item">
                        <div class="checkbox-cover">
                            <input type='checkbox' class='ios8-switch' id='checkbox-7'>
                            <label for='checkbox-7'>Душевая</label>
                        </div>
                        <div class="checkbox-cover">
                            <input type='checkbox' class='ios8-switch' id='checkbox-8'>
                            <label for='checkbox-8'>Парковка</label>
                        </div>
                    </div>
                    <div class="sidebar-item">
                        <label class="select-label">
                            <button class="btn-plain btn-blue" type="submit">Применить</button>
                            <button class="btn-plain btn-silver">Сбросить фильтр</button>
                        </label>

                    </div>
                </form>
            </div>
            <div class="col-md-9 col-sm-9">
                <div class="content">
                    <div class="nav-xs">
                        <ul class="nav nav-tabs place-tab">
                            <li class="active">
                                <a href="#tab-1" data-toggle="tab" class="border-left">
                                    <i class="icon i-tile"></i>
                                    <span>Плитки</span>
                                </a>
                            </li>
                            <li>
                                <a href="#tab-2" data-toggle="tab" class="border-right">
                                    <i class="icon i-map"></i> <span>Карта</span>
                                </a>
                            </li>

                        </ul>
                        <div class="filter-xs visible-xs">
                            <button class="btn-plain call-filter d-flex">
                                <i class="icon i-filter"></i>
                                Открыть фильтр
                            </button>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab-1">
                            <div class="row">

                                @foreach ($complexes as $item)
                                    <div class="col-md-4 col-sm-6">
                                        <a href="#">
                                            <div class="place-item">
                                                <div class="place-item-img">
                                                    <img src="img/main/place.png" alt="">
                                                    <button class="btn-plain btn-star favorite">
                                                        <i class="icon i-star"></i>
                                                    </button>
                                                </div>
                                                <div class="place-item-caption">
                                                    <h3 class="d-flex"> ASA <i class="icon red-fire"></i></h3>
                                                    <p>от <span>5000</span> 4500 тг/ч</p>
                                                    <ul class="place-detail">
                                                        <li>
                                                            <img src="img/icon/star-blue.png" alt="">
                                                            4.76 <span>(333 отзыва)</span>
                                                        </li>
                                                        <li class="border-bottom">
                                                            <img src="img/icon/map.svg" alt="">
                                                            Сейфуллина проспект, 51
                                                        </li>
                                                        <li>
                                                            <img src="img/icon/place-type.png" alt="">
                                                            Открытое поле
                                                            <img src="img/icon/size.svg" alt="" class="size">
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
                                @endforeach

                            </div>
                        </div>
                        <div class="tab-pane" id="tab-2">

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection