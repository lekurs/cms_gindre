$(function () {
    var o = {
        'script' : '/admin/etablissements/contact',

    }

    var form = {
        init: function () {
            // $('.show-form').append()
        }
    };

    $.fn.contactForm = function (oo) {

        if (oo) $.extend(o, oo);
    }
    //
    // for (var i = 0; i < $('.testplus').length; i++) {
    //     console.log($('.testplus')[i]);
    $('.testplus').on('click', function () {

        slug = $(this).attr('data-id');

        $.get(o.script, {slug : slug}, function (data) {
            $('.testplus').after(data);
        });
    });
});
