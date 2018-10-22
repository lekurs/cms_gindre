var test = $('.commande-edit-icon').attr('data-slug'),
    edit = $('.commande-edit-icon');

$(edit).click(), function () {

    id = $(this).attr('data-id');
    slug = $(this).attr('data-id');
    elt = $('#edit-contact-form');

    $.post('shop/one/', {'slug': slug} + '/commande/', {'id': id}, function (data) {

    }).done(function (html) {
        // $(elt).after(html)
    });
});