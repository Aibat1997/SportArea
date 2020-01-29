@extends('index.layouts.layout')    

@section('content')
<section class="main bg-grey">
    <div class="container">
        <div class="row">

            @foreach ($types as $item)
                <div class="col-md-4 col-sm-4">
                    <a href="/sport-type/{{ $item->st_id }}">
                        <div class="main-item">
                            <div class="main-item-img">
                                <img src="{{ $item->st_img }}" alt="">
                            </div>
                            <div class="main-item-caption">
                                <h2>{{ $item->st_name }}</h2>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    </div>
</section>
<section class="news">
    <div class="container">
        <h2 class="subtitle">Новости</h2>
        <div class="row">

            @foreach ($news as $item)
                <div class="col-md-3 col-sm-6">
                    <a href="/news/{{ $item->n_id }}">
                        <div class="news-item">
                            <div class="news-item-img">
                                <img src="{{ $item->n_img }}" alt="">
                            </div>
                            <div class="news-item-caption">
                                <h2>{{ $item->n_name }}</h2>
                                <p>{{ $item->n_short_desc }}</p>
                                <a href="/news/{{ $item->n_id }}" class="btn-plain btn-blue">Читать дальше</a>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
        <div class="banner">
            <div class="banner-caption">
                <h2>Приложение SportArea</h2>
                <p>Теперь у вас есть возможность быстро, легко и удобно забронировать спортивные площадки</p>
                <div class="banner-btn d-flex-justify">
                    <a href="#" class="btn-plain btn-grey">
                        <img src="/index/img/icon/apple.svg" alt="">
                        Скачать в AppStore
                    </a>
                    <a href="#" class="btn-plain btn-grey">
                        <img src="/index/img/icon/android.svg" alt="">
                        Скачать в PlayMarket
                    </a>
                </div>
            </div>
            <div class="banner-img">
                <img src="/index/img/main/image%2011.png" alt="">
            </div>
        </div>
    </div>
</section>
@endsection