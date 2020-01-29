@extends('index.layouts.layout')    

@section('content')
<section class="news">
    <div class="container">
        <div class="row">
            <div class="col-md-9 ">
                <div class="news-inside">
                    <a href="/news" class="btn-plain link-back d-flex"><img src="img/icon/prev.svg" alt=""> Назад</a>
                    <h1 class="subtitle">{{ $news->n_name }}</h1>
                    <div class="news-inside-img">
                        <img src="{{ $news->n_img }}" alt="">
                    </div>
                    {!! $news->n_description !!}
                </div>

            </div>

        </div>
    </div>
</section>
@endsection