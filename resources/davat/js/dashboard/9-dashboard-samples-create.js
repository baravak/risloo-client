$('body').on('statio:dashboard:samples:create', function(){

    $('#room-tab').on('tabby.show', function (e, event) {
        $('.disabled:disabled', this).removeAttr('disabled').removeClass('disabled');
        $('input, select, checkbox, radio', '#case-tab').not(':disabled').attr('disabled', 'disabled').addClass('disabled');
        $('#count').trigger('change');
        $('#room_client_id').trigger('change');
    }).on('tabby.hide', function (e, event) {
        $('input, select, checkbox, radio', this).not(':disabled').attr('disabled', 'disabled').addClass('disabled');
        $('.disabled:disabled', '#case-tab').removeAttr('disabled').removeClass('disabled');
    }).trigger($('#room-tab').is('[hidden=hidden]') ? 'tabby.hide' : 'tabby.show');

    $('#room_client_id').not(':disabled').on('change', function () {
        if (!$(this).val() || !$(this).val().length) {
            $('#count').removeAttr('disabled');
        }
        else {
            $('#count').attr('disabled', 'disabled');
        }
    });
    $('#count').not(':disabled').on('change', function () {
        if (!$(this).val()) {
            $('#room_client_id').removeAttr('disabled');
        }
        else {
            $('#room_client_id').attr('disabled', 'disabled');
        }
    });
});
