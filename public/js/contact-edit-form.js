$(function () {
    var o = {
        'script' : '/admin/etablissements/contact/edit',

    }

    var form = {
        init: function () {
            // $('.show-form').append()
        }
    };

    $.fn.submitContactForm = function (oo) {

        if (oo) $.extend(o, oo);
    }
    //
    // for (var i = 0; i < $('.testplus').length; i++) {
    //     console.log($('.testplus')[i]);

    console.log($('#contact_edit_form'));
    $('#contact_edit_form').on('submit', function () {
        console.log('ok');

        slug = $(this).attr('data-id');

        $.post(o.script, {slug : slug}, function (data) {
            // $('.testplus').after(data);
            console.log(data);
        });
    });
});
