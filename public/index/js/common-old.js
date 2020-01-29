$(document).ready(function () {

    $('.call-menu').on('click', function () {
        $('.menu-cover').addClass('show-menu');
    });

    $('.close-menu').on('click', function () {
        $('.menu-cover').removeClass('show-menu');
    });
    $('.call-filter').on('click', function () {
        $('.sidebar').addClass('show-menu');
    });

    $('.close-filter').on('click', function () {
        $('.sidebar').removeClass('show-menu');
    });


    $('.call-court-sticky').on('click', function (e) {
        e.preventDefault();
        $('.court-sticky').toggleClass('show-menu-up');
        // $('.court-sticky').slideToggle;
    });


    $('.call-match-sticky').on('click', function (e) {
        e.preventDefault();
        $('.match-sticky').toggleClass('show-match-sticky');
    });

    $('.call-login').on('click', function (e) {
        e.preventDefault();
        $('.login-popup').addClass('showed');
        $('.overlay').addClass('showed');
    });

    $('.recovery-link').on('click', function (e) {
        e.preventDefault();
        $('.recovery-popup').addClass('showed');
        $('.overlay').addClass('showed');
        $('.login-popup').removeClass('showed');
    });

    $('.call-book').on('click', function (e) {
        e.preventDefault();
        $('.book-client-popup').addClass('showed');
        $('.overlay').addClass('showed');
    });
    $('.client-edit').on('click', function (e) {
        e.preventDefault();
        $('.client-popup').addClass('showed');
        $('.overlay').addClass('showed');
        $('.book-client-popup,.add-client').removeClass('showed');

    });

    $('.client-delete').on('click', function (e) {
        e.preventDefault();
        $('.delete-client').addClass('showed');
        $('.overlay').addClass('showed');
    });

    $('.client-modify').on('click', function (e) {
        e.preventDefault();
        $('.client-popup').addClass('showed');
        $('.overlay').addClass('showed');

    });
    $('.group-add').on('click', function (e) {
        e.preventDefault();
        $('.add-group').addClass('showed');
        $('.overlay').addClass('showed');
        $('.book-client-popup,.add-client').removeClass('showed');
    });
    $('.client-add').on('click', function (e) {
        e.preventDefault();
        $('.add-client').addClass('showed');
        $('.overlay').addClass('showed');
        $('.add-group,.book-client-popup').removeClass('showed');
    });
    $('.coach-add').on('click', function (e) {
        e.preventDefault();
        $('.add-coach').addClass('showed');
        $('.overlay').addClass('showed');
        $('.add-group,.book-client-popup').removeClass('showed');
    });
    $('.ticket-add').on('click', function (e) {
        e.preventDefault();
        $('.add-ticket').addClass('showed');
        $('.overlay').addClass('showed');
        $('.add-group').removeClass('showed');
    });
    $('.training-add').on('click', function (e) {
        e.preventDefault();
        $('.add-training').addClass('showed');
        $('.overlay').addClass('showed');
        $('.add-group').removeClass('showed');
    });
    $('.weekday-add').on('click', function (e) {
        e.preventDefault();
        $('.add-weekday').addClass('showed');
        $('.overlay').addClass('showed');
        $('.add-group').removeClass('showed');

    });

    $('.call-chat').on('click', function (e) {
        e.preventDefault();
        $('.chat').addClass('showed');
        $('.overlay').addClass('showed');
    });

    $('.call-prof').on('click', function (e) {
        e.preventDefault();
        $('.ind-prof').addClass('showed');
    });
    $('.call-group').on('click', function (e) {
        e.preventDefault();
        $('.group-prof').addClass('showed');
    });

    $('.call-registration').on('click', function (e) {
        e.preventDefault();
        $('.login-popup').removeClass('showed');
        $('.registration-popup').addClass('showed');
        $('.overlay').addClass('showed');
    });

    $('.overlay,.close-popup').on('click', function () {
        $('.question-popup').removeClass('showed');
        $('.overlay').removeClass('showed');
    });

    $('.close-popup-closest').on('click', function () {
        $(this).closest('.question-popup').removeClass('showed');
    });
    $('.callback').on('click', function () {
        $('.callback-popup').addClass('showed');
        $('.overlay').addClass('showed');
    });

    $('.btn-promote').on('click', function () {
        $('.promote').addClass('showed');
        $('.overlay').addClass('showed');
    });

    $('.call-search').on('click', function () {
        $('.search').toggle("slide");
    });
    $('.search-close').on('click', function () {
        $('.search').removeClass("slide");
    });
    if($('.place-item-caption').find('i.icon').hasClass('red-fire')){
        var icon = $('.red-fire');
        icon.closest('.place-item-caption').addClass('hot-object');
    }

});


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




