@extends('index.layouts.layout')

@section('content')
<section class="place-top">
    <img src="/index/img/main/main-football.png" alt="">
    <div class="container">
        <h1>{{ $sporttype->st_name }}</h1>
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
                <form action="{{ url()->current() }}" method="GET" id="filter_form">
                    <div class="sidebar-item">
                        <label class="select-label select">
                            <select name="by_price">
                                <option label="Сортировка по"></option>
                                <option value="1" {{ request()->by_price == 1 ? 'selected' : '' }}>По возрастанию цены
                                </option>
                                <option value="0"
                                    {{ request()->by_price == 0 && request()->by_price != null ? 'selected' : '' }}>По
                                    убыванию цены</option>
                            </select>
                            <i class="fas fa-chevron-down arrow-select"></i>
                        </label>
                        <label class="select-label select">
                            <select name="city">
                                @include('index.layouts.select-city')
                            </select>
                            <i class="fas fa-chevron-down arrow-select"></i>
                        </label>
                        <label class="select-label select">
                            <select name="is_open">
                                <option label="Тип площадки"></option>
                                <option value="1" {{ request()->is_open == 1 ? 'selected' : '' }}>Открытое</option>
                                <option value="0"
                                    {{ request()->is_open == 0 && request()->is_open != null ? 'selected' : '' }}>
                                    Закрытое</option>
                            </select>
                            <i class="fas fa-chevron-down arrow-select"></i>
                        </label>
                        <label class="select-label select">
                            <select name="coverage">
                                @include('index.layouts.select-coverage')
                            </select>
                            <i class="fas fa-chevron-down arrow-select"></i>
                        </label>
                        <label class="input-label">
                            <input type="text" name="cost_from"
                                value="{{ request()->cost_from != null ? request()->cost_from : '' }}"
                                placeholder="Стоимость от">
                            <input type="text" name="cost_to"
                                value="{{ request()->cost_to != null ? request()->cost_to : '' }}"
                                placeholder="Стоимость до">
                        </label>
                    </div>
                    <div class="sidebar-item">
                        <h2>Инфраструктура</h2>
                        @php
                        $infrastructure = App\Models\Infrastructure::orderBy('inf_sort_num', 'asc')->get();
                        @endphp
                        @foreach ($infrastructure as $item)
                        <div class="checkbox-cover">
                            <input type='checkbox' name="infrastructure[]" value="{{ $item->inf_id }}"
                                class='ios8-switch' id='checkbox-{{ $item->inf_id }}'>
                            <label for='checkbox-{{ $item->inf_id }}'>{{ $item->inf_name }}</label>
                        </div>
                        @endforeach
                    </div>
                    <div class="sidebar-item">
                        <label class="select-label">
                            <button class="btn-plain btn-blue" type="submit">Применить</button>
                            <a class="btn-plain btn-silver" href="{{ url()->current() }}">Сбросить фильтр</a>
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
                                    <div>
                                        <div class="place-item">
                                            <div class="place-item-img">
                                                <img src="{{ $item->sc_image }}" alt="">
                                                <button class="btn-plain btn-star favorite"
                                                    onclick="makefavorite({{ $item->sc_id }})">
                                                    <i id="favorite-{{ $item->sc_id }}"
                                                        class="icon {{ Auth::user()->isFavorite($item->sc_id) ? 'i-star-red' : 'i-star' }}"></i>
                                                </button>
                                            </div>
                                            <div class="place-item-caption">
                                                <h3 class="d-flex"> {{ $item->sc_name }} <i class="icon red-fire"></i>
                                                </h3>
                                                <p>от {{ $item->courts->min('c_cost') }} тг/ч</p>
                                                <ul class="place-detail">
                                                    <li>
                                                        <img src="/index/img/icon/star-blue.png" alt="">
                                                        {{ $item->sc_raiting }} <span>({{ $item->reviews->count() }}
                                                            отзыва)</span>
                                                    </li>
                                                    <li class="border-bottom">
                                                        <img src="/index/img/icon/map.svg" alt="">
                                                        {{ $item->sc_addres }}
                                                    </li>
                                                    @if(!is_null($item->courts->first()))
                                                    <li>
                                                        <img src="/index/img/icon/place-type.png" alt="">
                                                        {{ $item->courts->first()->c_open_field == 1 ? 'Открытое поле' : 'Закрытое поле' }}
                                                        <img src="/index/img/icon/size.svg" alt="" class="size">
                                                        {{ $item->courts->first()->c_area }} м
                                                    </li>
                                                    @endif
                                                </ul>
                                                <a href="/complex/{{ $item->sc_id }}/courts"
                                                    class="btn-plain btn-blue">
                                                    Подробнее
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script>
    function makefavorite(complex_id) {
        let button = $(this);
        axios.post('/user-favorite', {
            complex: complex_id,
        })
            .then(function (response) {
                console.log(response);
                if (response.data.status) {
                    $('#favorite-' + response.data.id).removeClass("i-star").addClass("i-star-red");
                } else {
                    $('#favorite-' + response.data.id).removeClass("i-star-red").addClass("i-star");
                }
            })
            .catch(function (error) {
                console.log(error);
            });
    }
</script>
@endsection