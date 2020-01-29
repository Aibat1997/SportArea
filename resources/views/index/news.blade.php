@extends('index.layouts.layout')    

@section('content')
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
    </div>
</section>
@endsection