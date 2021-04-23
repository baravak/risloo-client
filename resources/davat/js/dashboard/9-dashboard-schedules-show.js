$('body').on('statio:dashboard:schedules:show statio:dashboard:session:users:create', function () {
    $('#case_id').on('change', function(){
        var case_id = $(this).val();
        if(case_id){
            $('#problem-element').fadeOut('fast');
        }else{
            $('#problem-element').fadeIn('fast');
            $('[data-xhr="case-clients"]').html('');
        }
    }).trigger('change');

    $('[name=client_typ]').on('change', function(){
        if($('#center_users_radio').is(':checked')){
            $('[data-xhr="case-clients"]').removeClass('statio-fold');
            $('#case_id + .select2, [data-xhr="case-clients"]').fadeTo('fast', .3);
            $('#case_id,  [data-xhr="case-clients"] input').attr('disabled', 'disabled');
            $('#center_users').removeAttr('disabled');
            $('#center_users + .select2').fadeTo('fast', 1);
            $('#case_id').val(null).trigger('change');
        }else{
            $('#case_id + .select2, [data-xhr="case-clients"]').fadeTo('fast', 1);
            $('#case_id,  [data-xhr="case-clients"] input').removeAttr('disabled');
            $('#center_users').attr('disabled', 'disabled');
            $('#center_users + .select2').fadeTo('fast', .3);
        }
    }).eq(0).trigger('change');
});
