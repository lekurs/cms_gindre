var test = $('.contact-edit-icon').attr('data-slug'),
        eye = $('.contact-edit-icon');

$(eye).on('click', function () {

    slug = $(this).attr('data-slug');
    elt = $('#edit-contact-form');

    $.get('shop/getcontact', {'id': slug}, function (data) {
    }).done(function (html) {
        $(elt).after(html)
    });
});