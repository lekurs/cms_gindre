$(document).ready(function () {
    const checkbox = $('.radio-email');
    const form = $('form[name="send_email_form_creation"]');
    const buttonUp = $('#upload-file');

    form.hide();

    $(checkbox).change( function () {
        if ($(this).val() === 'all') {
            $('form[name="send_email_form_creation"]').show();
            $('label[for="send_email_form_creation_to"]').hide();
            $('input[id="send_email_form_creation_to"]').hide();
        } else {
            $('form[name="send_email_form_creation"]').show();
            $('label[for="send_email_form_creation_to"]').show();
            $('input[id="send_email_form_creation_to"]').show();
        }
    });

    $(buttonUp).on('click', function (e) {
        e.preventDefault();
        var file_data = $('#test-file').prop('files')[0];
        var form = new FormData();
        form.append('file', file_data);
        console.log(file_data);
        console.log(form);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/admin/emailing/upload');
        xhr.setRequestHeader('content-type', 'multipart/form-data');
        xhr.setRequestHeader('x-file-name', file_data.name);
        xhr.setRequestHeader('x-file-type', file_data.type);
        xhr.setRequestHeader('x-file-size', file_data.size);
        xhr.send(form);
    });
});