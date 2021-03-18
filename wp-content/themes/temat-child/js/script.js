jQuery(document).ready(function ($) {

    $('button.search-toggle').on('click', function () {
        $(this).parent().toggleClass('open');
    });

});
