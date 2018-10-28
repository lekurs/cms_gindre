$(document).ready(function () {
    const editIcon = $('.edit-message');

    $(editIcon).click(function () {
        let slug = $(this).attr('data-id');
        let elt = $(this);

        $.post('edit/message/' + slug, function (data) {

        }).done(function (html) {

            $(elt).closest('.message-container').after(html);
        });
    });

    //Suppression d'un clientType
    $('.delete-message').on('click', function () {
        let slug = $(this).attr('data-id');
        let elt = $(this);

        $.post('message/del/' + slug, function (data) {

        }).done(function () {
            $(elt).closest('.row.message-row-container').remove();
        });
    });
});