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

    $('.invent-add').on('click', function (e) {
        e.preventDefault();
        $('.add-invent-modal').addClass('showed');
        $('.overlay').addClass('showed');

    });

    $('.invent-edit').on('click', function (e) {
        e.preventDefault();
        $('.edit-invent-modal').addClass('showed');
        $('.overlay').addClass('showed');

    });
    // $('.group-add').on('click', function (e) {
    //     e.preventDefault();
    //     $('.add-group').addClass('showed');
    //     $('.overlay').addClass('showed');
    //     $('.book-client-popup,.add-client').removeClass('showed');
    // });
    // $('.client-add').on('click', function (e) {
    //     e.preventDefault();
    //     $('.add-client').addClass('showed');
    //     $('.overlay').addClass('showed');
    //     $('.add-group,.book-client-popup').removeClass('showed');
    // });
    // $('.coach-add').on('click', function (e) {
    //     e.preventDefault();
    //     $('.add-coach').addClass('showed');
    //     $('.overlay').addClass('showed');
    //     $('.add-group,.book-client-popup').removeClass('showed');
    // });
    // $('.ticket-add').on('click', function (e) {
    //     e.preventDefault();
    //     $('.add-ticket').addClass('showed');
    //     $('.overlay').addClass('showed');
    //     $('.add-group').removeClass('showed');
    // });
    // $('.training-add').on('click', function (e) {
    //     e.preventDefault();
    //     $('.add-training').addClass('showed');
    //     $('.overlay').addClass('showed');
    //     $('.add-group').removeClass('showed');
    // });
    // $('.weekday-add').on('click', function (e) {
    //     e.preventDefault();
    //     $('.add-weekday').addClass('showed');
    //     $('.overlay').addClass('showed');
    //     $('.add-group').removeClass('showed');
    //
    // });

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







