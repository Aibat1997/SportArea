@extends('index.layouts.layout')

@section('content')
<section class="match-head">
    <div class="container">
        <h1>Создать матч</h1>
        <span>Шаг 2.</span>
        <p>Выберите площадку</p>
    </div>
</section>
<section class="main">
    <div class="container">
        <div class="search-match d-flex">
            <button class="btn-plain">
                <img src="/index/img/icon/search.svg" alt="">
            </button>
            <input type="text" placeholder="Поиск по названию или адресу">
        </div>
        <div class="row">
            @foreach ($complexes as $item)
            <div class="col-md-3 col-sm-6">
                <a href="#">
                    <div class="place-item">
                        <div class="place-item-img">
                            <img src="{{ $item->sc_image }}">
                            {{-- <button class="btn-plain btn-star favorite">
                                <i class="icon i-star"></i>
                            </button> --}}
                        </div>
                        <div class="place-item-caption">
                            <h3> {{ $item->sc_name }} </h3>
                            <p>от {{ $item->courts->min('c_cost') }} тг/ч</p>
                            <ul class="place-detail">
                                <li>
                                    <img src="/index/img/icon/star-blue.png" alt="">
                                    {{ $item->sc_raiting }} <span>({{ $item->reviews->count() }} отзыва)</span>
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
                            <button href="#" class="btn-plain btn-bluesub">
                                Выбрать объект
                            </button>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection