$('body').on('statio:dashboard:samples:create', function(){
    $('[role=tabpanel]').on('tabby.show', function (e, event) {
        $('.disabled:disabled', this).removeAttr('disabled').removeClass('disabled');
        $('input, select, checkbox, radio', '[role=tabpanel][hidden]').not(':disabled').attr('disabled', 'disabled').addClass('disabled');
    });

    $('#bulk-tab').on('tabby.show', function(){
        $('#case_status').trigger('change');
    });

    $('#case_status').on('change', function(){
        if($(this).val() == 'exist'){
            $('#bulk_case_id').removeAttr('disabled');
        }else{
            $('#bulk_case_id').attr('disabled', 'disabled');
        }
        if(['personal', 'group'].indexOf($(this).val() ) >= 0){
            $('#problem_input').show();
        }else{
            $('#problem_input').hide();
        }
    });
    $('[role=tabpanel]:not([hidden])').trigger('tabby.show');
});
