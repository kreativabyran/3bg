jQuery(document).ready(function ($) {

    $('.menu-item-has-children').on('click', function () {
        $(this).find('.sub-menu').toggleClass('open');
    });


    if ($('.slider').length) {
        $('.slider').slick({
            dots: true,
            infinite: false,
            speed: 300,
            autoplay: false,
            slidesToShow: 1,
            slidesToScroll: 1,
        });
    }

    $('.show-more-covers').on('click', function () {
        $('.years#' + $(this).data('id')).find('.hidden').first().removeClass('hidden');
        if ($('.years#' + $(this).data('id')).find('.hidden').length === 0) {
            $(this).closest('.row').remove();
        }
    });

    // Login form
    if ($('#user_login').length) { $('#user_login').attr('placeholder', 'E-post'); }
    if ($('#user_pass').length) { $('#user_pass').attr('placeholder', 'Lösenord'); }
    $('#login-help_button').on('click', function () { $('#login-help').toggle('open'); });
    // END Login form


    /* SEARCH / FILTER */

    // Rensa filter
    $('.clean-filter').on('click', function (e) {
        $('button.checkbox-toggle').attr('aria-selected', false);
        $('input[type="checkbox"]').prop("checked", false);
    });

    // Öppna / stäng filter-boxarna
    $('.filter-toggle').on('click', function (e) {
        if ($(this).attr('aria-selected') === 'false') {
            $(this).attr('aria-selected', true);
        } else {
            $(this).attr('aria-selected', false);
        }
        $(this).siblings('.inner').toggle('open');
    });

    // Submitta formuläret
    $('.submit-filter').on('click', function (e) {
        $('form#articles').submit();
    });

    // Toggla checkboxarna med knappar
    $('.checkbox-toggle').on('click', function (e) {
        if ($('input[type="checkbox"]#' + $(this).data('for')).is(":checked")) {
            $(this).attr('aria-selected', false);
            $('input[type="checkbox"]#' + $(this).data('for')).prop("checked", false);
        } else {
            $(this).attr('aria-selected', true);
            $('input[type="checkbox"]#' + $(this).data('for')).prop("checked", true);
        }
    });

    // Toggla radiobuton med knappar
    $('.radio-toggle').on('click', function (e) {
        $('input[type="radio"]#' + $(this).data('for')).prop("checked", true);
        $('button.radio-toggle').attr('aria-selected', false);
        $(this).attr('aria-selected', true);
        $('form#articles').submit();
    });

    /* END SEARCH / FILTER */

});
