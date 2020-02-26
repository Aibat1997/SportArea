@extends('index.layouts.layout')    

@section('content')
<section class="match-head">
    <div class="container">
        <h1>Создать матч</h1>
        <span>Шаг 1.</span>
        <p>Выберите вид спорта</p>
    </div>
</section>
<section class="main">
    <div class="container">
        <div class="row">
            @foreach ($types as $item)
                <div class="col-md-4 col-sm-4">
                    <a href="/match-2/{{ $item->st_id }}">
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
@endsection