@extends('index.layouts.layout')

@section('css')
<link rel="stylesheet" href="/index/slick/slick.css">
<link rel="stylesheet" href="/index/slick/slick-theme.css">
<link href="/index/css/lightgallery.min.css" rel="stylesheet" type="text/css">
<style>
    .main-image {
        width: 100%;
        height: 440px;
    }

    .main-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: top;
    }
</style>
@endsection

@section('content')
<section class="court-top d-flex hidden-xs main-image">
    <img src="{{ $complex->sc_image }}">
</section>
<section class="court-sl-cover visible-xs">
    <div class="court-sl-xs">
        <img src="{{ $complex->sc_image }}">
    </div>
</section>
<section class="main">
    <div class="container">
        <div class="main-court">
            <div class="court-head d-flex-justify">
                <h1 class="d-flex">
                    {{ $complex->sc_name }}
                    <i class="icon red-fire"></i>
                </h1>
                <button class="btn-plain favorite-plain d-flex">
                    <i class="icon i-star"></i>
                    Добавить в избранное
                </button>
            </div>
            <div class="court-tab-cover">
                <ul class="nav nav-tabs court-tabs">
                    @foreach ($courts as $key=>$court)
                    <li class="{{ $key == 0 ? 'active' : '' }}">
                        <a href="#tab-{{ $court->c_id }}" data-toggle="tab">
                            {{ $court->c_name }}
                        </a>
                    </li>
                    @endforeach
                </ul>
                <div class="tab-content">
                    @foreach ($courts as $key=>$court)
                    <div class="tab-pane {{ $key == 0 ? 'active' : '' }}" id="tab-{{ $court->c_id }}">
                        <div class="row">
                            <div class="col-md-8 col-sm-8">
                                @php
                                $pieces = explode(",", $court->c_images);
                                @endphp
                                <div class="court-sl">
                                    @foreach ($pieces as $item)
                                    @php
                                    $image = base64_decode(Storage::disk('court_image')->get($item));
                                    @endphp
                                    <a href="#"><img src="{{ $image }}"></a>
                                    @endforeach
                                </div>
                                <ul class="court-desc">
                                    <li><img src="/index/img/icon/map.svg" alt="">
                                        <span>{{ $complex->city->city_name }}, {{ $complex->sc_addres }}</span>
                                    </li>
                                    <li><img src="/index/img/icon/place-type.png" alt="">
                                        <span>{{ $court->c_open_field == 1 ? 'Открытое поле' : 'Закрытое поле' }}</span>
                                    </li>
                                    <li><img src="/index/img/icon/size.svg" alt="">
                                        <span>{{ $court->c_area }}м</span><span class="text-grey">— размер поля</span>
                                    </li>
                                    <li><img src="/index/img/icon/clock.svg" alt=""> <span>Будние:
                                            {{ $complex->sc_work_time_weekday }} /
                                            Выходные: {{ $complex->sc_work_time_weekend }} </span>
                                    </li>
                                    <li><img src="/index/img/icon/court-type.svg" alt="">
                                        <span>{{ $court->coverage->tc_name }}</span></li>
                                    <li><img src="/index/img/icon/court-desc.svg" alt="">
                                        <span>
                                            @foreach ($court->infrastructures as $infrastructury)
                                            @if ($loop->last)
                                            {{ $infrastructury->inf_name }}
                                            @break
                                            @endif
                                            {{ $infrastructury->inf_name }},
                                            @endforeach
                                        </span>
                                    </li>
                                    <li><img src="/index/img/icon/i-tile.png" alt="">
                                        <span>
                                            @foreach ($complex->inventories()->where('inv_is_active', 1)->get() as
                                            $inventory)
                                            @if ($loop->last)
                                            {{ $inventory->inv_name }}
                                            @break
                                            @endif
                                            {{ $inventory->inv_name }},
                                            @endforeach
                                        </span>
                                    </li>
                                    @if ($complex->sc_show_phone == 1)
                                    <li><a href="tel:{{ $complex->sc_phone }}" class="d-flex">
                                            <img src="/index/img/icon/phone.svg">
                                            <span>{{ $complex->sc_phone }}</span>
                                        </a>
                                    </li>
                                    @endif
                                    <li>
                                        <img src="/index/img/icon/court-light.svg" alt=""> 
                                        <span>{{ $complex->sc_description }}</span>
                                    </li>
                                </ul>
                                <div class="court-map">
                                    <div id="map" style="width: 100%; height: 100%;"></div>
                                </div>
                            </div>
                            <div class="sidebar sticky court-sticky">
                                <button class="btn-plain call-court-sticky d-flex hidden-lg">
                                </button>
                                <div class="court-sticky-head">
                                    <h2 class="d-flex">₸{{ $court->c_cost }} <span></span>
                                        <p>за час</p>
                                    </h2>
                                    <p class="d-flex"><img src="/index/img/icon/star-blue.png" alt=""> {{ $complex->sc_raiting }}
                                        <span>(333 отзыва)</span></p>
                                    <span class="discount">-10%</span>
                                </div>
                                <div class="court-sticky-body">
                                    <div class="sidebar-item">
                                        <label class="select-label">
                                            <a href="create-match.html" class="btn-plain btn-blue">Забронировать</a>
                                            <a href="match-step-3.html"
                                                class="btn-plain btn-silver btn-blue-light">Создать матч
                                            </a>
                                            <p>Пока вы ни за что не платите</p>
                                        </label>

                                    </div>
                                </div>
                                <div class="court-sticky-bottom">
                                    <div class="court-bottom d-flex-justify">
                                        <div class="court-bottom-caption">
                                            <h3>Этот объект очень популярен.</h3>
                                            <p>За прошлую неделю это объявление посмотрели 500 раз.</p>
                                        </div>
                                        <i class="icon red-fire"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-sm-8">
                    <div class="court-review-cover">
                        <div class="court-review-head">
                            <h2>отзывы</h2>
                            <div class="court-review-base d-flex-justify">
                                <ul class="d-flex">
                                    <li><img src="/index/img/icon/star-blue.png" alt=""> {{ $complex->sc_raiting }}</li>
                                    <li class="bordered"> 333 <span>отзыва</span></li>
                                </ul>
                                @auth
                                <button class="btn-plain leave-review">Оставить отзыв <i
                                        class="fas fa-plus"></i></button>
                                @endauth
                            </div>
                        </div>
                        <div class="leave-review-cover">
                            <form action="/complex/{{ $complex->sc_id }}/review" method="POST">
                                @csrf
                                <textarea name="r_text" id="" cols="30" rows="10" required
                                    placeholder="Напишите свой отзыв"></textarea>
                                <div class="leave-review-base d-flex-justify">
                                    <div class="rate-cover d-flex">
                                        <p>Ваша оценка:</p>
                                        <button class="btn-plain btn-rate one">
                                            <i class="icon grey-star-lg"></i>
                                        </button>
                                        <button class="btn-plain btn-rate two">
                                            <i class="icon grey-star-lg"></i>
                                        </button>
                                        <button class="btn-plain btn-rate three">
                                            <i class="icon grey-star-lg"></i>
                                        </button>
                                        <button class="btn-plain btn-rate four">
                                            <i class="icon grey-star-lg"></i>
                                        </button>
                                        <button class="btn-plain btn-rate five">
                                            <i class="icon grey-star-lg"></i>
                                        </button>
                                    </div>
                                    <button class="btn-blue" type="submit">Отправить</button>
                                </div>
                            </form>
                        </div>
                        <div class="court-review-body">
                            <div class="court-review-item d-flex-justify">
                                <div class="court-review-item-img">
                                    <img src="/index/img/icon/prof.png" alt="">
                                </div>
                                <div class="court-review-item-caption">
                                    <h2>Шерхан</h2>
                                    <span>Октябрь 2019</span>
                                    <p>Gilian's place is positively perfect. He's thought of everything ladies, no need
                                        to pack
                                        your hairdryer or curling iron, he has that. There's also an iron and board to
                                        press
                                        your clothes after the journey. His kitchen has everything you need to make your
                                        own
                                        food after gathering…
                                    </p>
                                    <div class="review-hide">
                                        <p>
                                            Gilian's place is positively perfect. He's thought of everything ladies, no
                                            need to
                                            pack
                                            your hairdryer or curling iron, he has that. There's also an iron and board
                                            to press
                                            your clothes after the journey. His kitchen has everything you need to make
                                            your own
                                            food after gathering…
                                        </p>
                                    </div>
                                    <button class="btn-plain review-show">Читать дальше</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="overlay"></div>
@endsection

@section('js')
<script type="text/javascript" src="/index/js/lightgallery.min.js"></script>
<script type="text/javascript" src="/index/js/lightgallery-all.min.js"></script>
<script type="text/javascript" src="/index/slick/slick.js"></script>
<script type="text/javascript">

    $('.btn-rate').on('click', function (e) {
        e.preventDefault();
        $(this).find('.grey-star-lg').toggleClass('blue-star-lg')
    });
    $('.court-sl').lightGallery();
    $('.court-sl').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: true,
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
    $('.court-sl-xs').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: false,
        dots: true
    });
    jQuery.datetimepicker.setLocale('ru');

    jQuery('.datetimepicker').datetimepicker({
        timepicker: false,
        format: 'd.m.Y'
    });
    $('.review-show').on('click', function () {
        var answer = $(this).closest(".court-review-item-caption").find(".review-hide");
        answer.not(answer).slideUp(400);
        answer.slideToggle(400);
        if (this.innerText == "Читать дальше") {
            this.innerText = "Скрыть";
        }
        else {
            this.innerText = "Читать дальше";
        }
    });
    $('.leave-review').on('click', function () {
        var answer = $('.leave-review-cover');
        answer.not(answer).slideUp(400);
        answer.slideToggle(400);
    });
    $('.favorite-plain').on('click', function () {
        $(this).find('.i-star').toggleClass('i-star-red')
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

</script>
<script src="https://api-maps.yandex.ru/2.1/?apikey=<ваш API-ключ>&lang=ru_RU" type="text/javascript"></script>
<script type="text/javascript">
    // Функция ymaps.ready() будет вызвана, когда
    // загрузятся все компоненты API, а также когда будет готово DOM-дерево.
    ymaps.ready(init);

    function init() {
        // Создание карты.
        var myMap = new ymaps.Map("map", {
            // Координаты центра карты.
            // Порядок по умолчанию: «широта, долгота».
            // Чтобы не определять координаты центра карты вручную,
            // воспользуйтесь инструментом Определение координат.
            center: [43.157496, 77.059031],
            controls: ['zoomControl', 'geolocationControl'],
            // Уровень масштабирования. Допустимые значения:
            // от 0 (весь мир) до 19.
            zoom: 16
        });
        // Создаем геообъект с типом геометрии "Точка".
        myGeoObject = new ymaps.GeoObject({
            // Описание геометрии.
            geometry: {
                type: "Point",
                coordinates: [55.8, 37.8]
            },
            // Свойства.
            properties: {
                // Контент метки.
                iconContent: 'Я тащусь',
                hintContent: 'Ну давай уже тащи'
            }
        }, {
            // Опции.
            // Иконка метки будет растягиваться под размер ее содержимого.
            preset: 'islands#blackStretchyIcon',
            // Метку можно перемещать.
            draggable: true
        }),
            myPieChart = new ymaps.Placemark([
                55.847, 37.6
            ], {
                // Данные для построения диаграммы.
                data: [
                    { weight: 8, color: '#0E4779' },
                    { weight: 6, color: '#1E98FF' },
                    { weight: 4, color: '#82CDFF' }
                ],
                iconCaption: "Диаграмма"
            }, {
                // Зададим произвольный макет метки.
                iconLayout: 'default#pieChart',
                // Радиус диаграммы в пикселях.
                iconPieChartRadius: 30,
                // Радиус центральной части макета.
                iconPieChartCoreRadius: 10,
                // Стиль заливки центральной части.
                iconPieChartCoreFillStyle: '#ffffff',
                // Cтиль линий-разделителей секторов и внешней обводки диаграммы.
                iconPieChartStrokeStyle: '#ffffff',
                // Ширина линий-разделителей секторов и внешней обводки диаграммы.
                iconPieChartStrokeWidth: 3,
                // Максимальная ширина подписи метки.
                iconPieChartCaptionMaxWidth: 200
            });
        myMap.geoObjects
            .add(myGeoObject)
            .add(myPieChart)
            .add(new ymaps.Placemark([43.157496, 77.059031], {
                balloonContent: 'цвет <strong>носика Гены</strong>',
                iconCaption: 'Medeu'
            }, {
                preset: 'islands#greenDotIconWithCaption'
            }));


    }
</script>
@endsection