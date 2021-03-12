jQuery(document).ready(function ($) {
    $('.filter-load-more').on('click', function () {
        var offset = $('article.post').length;
        var order = $('#filter-order').val();
        var cat = $('#filter-cats').val();
        var users = $('#filter-users').val();
        var text = $('#filter-text').val();
        $('#loading-icon').css({ 'display': 'block' });
        $.ajax({
            url: ajax_obj.ajaxurl,
            type: 'post',
            data: {
                'action': 't_blog_load_more',
                offset: offset,
                order: order,
                cat: cat,
                users: users,
                text: text,
            },
            success: function (data) {
                $('#loading-icon').css({ 'display': 'none' });
                $('#all-articles').append(data);
            },
            error: function (errorThrown) {
                console.log(errorThrown);
            }
        });
    });
});
