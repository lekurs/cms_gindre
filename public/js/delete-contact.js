const trash = $('.delete-contact');

$(trash).on('click', function () {

    slug = $(this).attr('data-slug');
    let elt = $(this);

    $.post('/admin/shop/one/contact/delete', {'slug': slug}, function (data) {
    }).done(function () {
        $(elt).parent().after(html)
    });
});