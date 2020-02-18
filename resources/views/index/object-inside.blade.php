@extends('index.layouts.layout')

@section('content')
<section class="search-result">
    <div class="container">
        <h1>{{ $complex->sc_name }}</h1>
    </div>
</section>
<section class="main object-inside">
    <div class="container">
        <ul class="nav nav-tabs object-tab">
            <li>
                <a href="#tab-1" data-toggle="tab">
                    Журнал броней
                </a>
            </li>
            <li class="active">
                <a href="#tab-2" data-toggle="tab">
                    Заявки
                </a>
            </li>
            <li>
                <a href="#tab-3" data-toggle="tab">
                    Статистика
                </a>
            </li>
            <li>
                <a href="#tab-4" data-toggle="tab">
                    Скидки
                </a>
            </li>
            <li>
                <a href="#tab-5" data-toggle="tab">
                    Редактировать объект
                </a>
            </li>
        </ul>
        <div class="tab-content object-content">
            @include('index.layouts.booking-journal')
            @include('index.layouts.complex-applications')
            @include('index.layouts.complex-statistics')
            @include('index.layouts.complex-discount')
            @include('index.layouts.edit-object')
        </div>
    </div>
</section>
<div class="question-popup client-popup">
    <div class="question-popup-head d-flex-justify">
        <h3>Редактирование клиента</h3>
        <button class="btn-plain close-popup"><i class="fas fa-times"></i></button>
    </div>
    <form action="#">
        <div class="form-item-half d-flex-justify">
            <input type="text" placeholder="Ануар">
            <input type="text" placeholder="Надралиев">
        </div>
        <div class="form-item-half d-flex-justify">
            <input type="text" placeholder="+7 747 140 11 88">
            <div class="sidebar-item">
                <label class="select-label select">
                    <select name="#">
                        <option value="">По возрастанию цены</option>
                        <option value="">По возрастанию цены 1</option>
                        <option value="">По возрастанию цены 2</option>
                    </select>
                    <i class="fas fa-chevron-down arrow-select"></i>
                </label>
            </div>
        </div>
        <div class="form-item-half d-flex-justify invent">
            <label class="date-label">
                <i class="icon i-calendar"></i>
                <input type="text" class="datefilter">
            </label>
            <div class="inventar-label d-flex">
                <div class="checkbox-cover">
                    <input type='checkbox' class='ios8-switch checkbox-attr' id='checkbox-1'>
                    <label for='checkbox-1'></label>
                    <input type="text" placeholder="Инвентар" class="input-attr" disabled>
                </div>
                <label class="price-current">
                    <input type="text" placeholder="Цена" class="input-attr" disabled>
                    <i class="icon i-tg"></i>
                    <button class="btn-plain add-invent"><img src="/index/img/icon/add-invent.png" alt=""></button>
                </label>
            </div>
        </div>
        <div class="invent-new">
            <div class="form-item-half form-item-new d-flex-justify">
                <div class="inventar-label d-flex">
                    <div class="checkbox-cover">
                        <input type='checkbox' class='ios8-switch checkbox-attr' id='checkbox-2'>
                        <label for='checkbox-2'></label>
                        <input type="text" placeholder="Инвентар" class="input-attr" disabled>
                    </div>
                    <label class="price-current">
                        <input type="text" placeholder="Цена" class="input-attr" disabled>
                        <i class="icon i-tg"></i>
                        <button class="btn-plain delete-invent"><img src="/index/img/icon/delete-invent.png"
                                alt=""></button>
                    </label>
                </div>
            </div>
        </div>
        <div class="form-item-half d-flex-justify">
            <div class="date-cover">
                Осталось тренировок - 12
            </div>
            <div class="btn-box d-flex-justify">
                <button class="btn-plain btn-redsub">Удалить</button>
                <button class="btn-plain btn-blue" type="submit">Продлить</button>
            </div>
        </div>

    </form>
</div>
<div class="question-popup delete-client">
    <div class="question-popup-head d-flex-justify">
        <h3>Причина отмены брони</h3>
        <button class="btn-plain close-popup"><i class="fas fa-times"></i></button>
    </div>
    <form action="#">
        <textarea name="" id="" cols="30" rows="10" placeholder="Введите сообщение"></textarea>
        <button class="btn-plain btn-blue" type="submit">Подтвердить</button>
    </form>
</div>
<div class="overlay"></div>
@endsection

@section('js')
<script type="text/javascript" src="/index/js/daterangepicker.js"></script>
<script type="text/javascript" src="/index/js/jquery.datetimepicker.full.min.js"></script>
<script type="text/javascript">
    window.onload = function () {
        var chart = new CanvasJS.Chart("chartContainer",
            {
                title: {
                    text: ""
                },
                data: [
                    {
                        type: "line",
                        lineColor: "red", //**Change the color here
                        dataPoints: [
                            { x: 10, y: 71 },
                            { x: 20, y: 55 },
                            { x: 30, y: 50 },
                            { x: 40, y: 65 },
                            { x: 50, y: 68 },
                            { x: 60, y: 28 },
                            { x: 70, y: 34 },
                            { x: 80, y: 14 },
                            { x: 90, y: 23 }
                        ]
                    },
                    {
                        type: "line",
                        lineColor: "blue",
                        dataPoints: [
                            { x: 10, y: 14 },
                            { x: 20, y: 18 },
                            { x: 30, y: 29 },
                            { x: 40, y: 49 },
                            { x: 50, y: 48 }
                        ]
                    }
                ]
            });

        chart.render();

        $(".object-tab").tabs({
            create: function (event, ui) {
                //Render Charts after tabs have been created.
                $("#chartContainer").CanvasJSChart(chart);
            },
            activate: function (event, ui) {
                //Updates the chart to its container size if it has changed.
                ui.newPanel.children().first().CanvasJSChart().render();
            }
        });
    }
</script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="/index/js/common.js"></script>
<script type="text/javascript">
    $('.select').on('click', function () {
        $(this).find('.arrow-select').toggleClass('arrow-up')
    });

    $.fn.toggleProp = function () {
        this.prop('disabled', !this.prop('disabled'));
    }
    $('.checkbox-attr').on('click', function () {
        $(this).closest('.inventar-label').find('.input-attr').toggleProp();
    });

    $('.add-invent').on('click', function () {
        $('.invent-new').html('' +
            '<div class="form-item-half form-item-new d-flex-justify">\n' +
            '                <div class="inventar-label d-flex">\n' +
            '                    <div class="checkbox-cover">\n' +
            '                        <input type=\'checkbox\' class=\'ios8-switch checkbox-attr\' id=\'checkbox-2\'>\n' +
            '                        <label for=\'checkbox-2\'></label>\n' +
            '                        <input type="text" placeholder="Инвентар" class="input-attr" disabled>\n' +
            '                    </div>\n' +
            '                    <label class="price-current">\n' +
            '                        <input type="text" placeholder="Цена" class="input-attr" disabled>\n' +
            '                        <i class="icon i-tg"></i>\n' +
            '                        <button class="btn-plain delete-invent"><img src="img/icon/delete-invent.png" alt=""></button>\n' +
            '                    </label>\n' +
            '                </div>\n' +
            '            </div>');
        ;
    });
    $('.delete-invent').on('click', function () {
        alert(1);
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
            $(this).val(picker.startDate.format('YYYY-MM-DD') + ' : ' + picker.endDate.format('YYYY-MM-DD'));
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
    jQuery('.datetime').datetimepicker({
        datepicker: false,
        format: 'H:i'
    });
</script>
<script>
    var des = Object.getOwnPropertyDescriptor(HTMLInputElement.prototype, 'value');
    Object.defineProperty(HTMLInputElement.prototype, 'value', {
        get: function () {
            if (this.type === 'text' && this.list) {
                var value = des.get.call(this);
                var opt = [].find.call(this.list.options, function (option) {
                    return option.value === value;
                });
                return opt ? opt.dataset.value : value;
            }
        }
    });
</script>
@endsection