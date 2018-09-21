$(function () {
    var o = {
        // 'script' : '/admin/etablissements/contact/add',

    }

    var form = {
        init: function () {
            // $('.show-form').append()
        }
    };

    $.fn.addContact = function (oo) {

        if (oo) $.extend(o, oo);
    }
    //
    // for (var i = 0; i < $('.testplus').length; i++) {
    //     console.log($('.testplus')[i]);
    console.log($('form#institut-machin').attr('action'));

    $('body').on('submit', 'form#institut-machin', function () {
        console.log('okkkkkkkkkkkkkkkkkk');
        console.log($('form#institut-machin').serialize());
        console.log($('form#institut-machin').attr('method'));
        console.log($('form#institut-machin').attr('action'));
        slug = $('.add-contact').attr('data-id');

        $.ajax({
            type: 'POST',
            url: $('form#institut-machin').attr('action'),
            slug: slug,
            data : $('form#institut-machin').serialize()
        });
    });
});
