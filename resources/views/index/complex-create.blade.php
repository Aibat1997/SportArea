@extends('index.layouts.layout')

@section('content')
<section class="search-result">
    <div class="container">
        <h1>Добавление объекта</h1>
    </div>
</section>
<section class="main add-object">
    <div class="container">
        <div class="add-object-cover">
            <div class="row">
                <add-complex></add-complex>
                <complex-information></complex-information>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
<script>
    $('.select').on('click', function () {
        $(this).find('.arrow-select').toggleClass('arrow-up')
    });
    $('.favorite').on('click', function () {
        $(this).find('.i-star').toggleClass('i-star-red')
    });
    $('.size-mask').inputmask("99X99");
    
    function checkboxDropdown(el) {
        var $el = $(el);

        function updateStatus(label, result) {
            if (!result.length) {
                label.html('Инфраструктура');
            }
        }

        ;
        $el.each(function (i, element) {
            var _this = this;

            var $list = $(this).find('.dropdown-list'),
                $label = $(this).find('.dropdown-label'),
                $checkAll = $(this).find('.check-all'),
                $inputs = $(this).find('.check'),
                defaultChecked = $(this).find('input[type=checkbox]:checked'),
                result = [];
            updateStatus($label, result);

            if (defaultChecked.length) {
                defaultChecked.each(function () {
                    result.push($(this).next().text());
                    $label.html(result.join(", "));
                });
            }

            $label.on('click', function () {
                $(_this).toggleClass('open');
            });
            $checkAll.on('change', function () {
                var checked = $(this).is(':checked');
                var checkedText = $(this).next().text();
                result = [];

                if (checked) {
                    result.push(checkedText);
                    $label.html(result);
                    $inputs.prop('checked', false);
                } else {
                    $label.html(result);
                }

                updateStatus($label, result);
            });
            $inputs.on('change', function () {
                var checked = $(this).is(':checked');
                var checkedText = $(this).next().text();

                if ($checkAll.is(':checked')) {
                    result = [];
                }

                if (checked) {
                    result.push(checkedText);
                    $label.html(result.join(", "));
                    $checkAll.prop('checked', false);
                } else {
                    var index = result.indexOf(checkedText);

                    if (index >= 0) {
                        result.splice(index, 1);
                    }

                    $label.html(result.join(", "));
                }

                updateStatus($label, result);
            });
            $(document).on('click touchstart', function (e) {
                if (!$(e.target).closest($(_this)).length) {
                    $(_this).removeClass('open');
                }
            });
        });
    }

    checkboxDropdown('.dropdown');

</script>
@endsection