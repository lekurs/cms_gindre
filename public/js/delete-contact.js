const trash = $('.delete-contact');

$(trash).on('click', function () {
    console.log('ok');
    slug = $(this).attr('data-slug');

    $.post('/admin/shop/one/contact/delete', {'slug': slug}, function (data) {
    }).done(function () {
        // $(elt).after(html)
    });
});