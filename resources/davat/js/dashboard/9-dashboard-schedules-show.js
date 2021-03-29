$('body').on('statio:dashboard:room:schedules:create', function () {
    $('#field').on('select2:select select2:unselect', function(e){
        var values = $(this).val();
        if(values.length > 0){
            $('#field_count').text('('+values.length+')');
        }else{
            $('#field_count').text('');
        }
        var ids = $('#payment_fields label').map(function(key, value){ return $(this).attr('for')}).toArray();
        var removes = [...ids];
        $(this).select2('data').forEach(function(value, key, all){
            var id = 'amount-' + value._resultId;
            var exists = ids.indexOf(id);
            if(exists !== -1) {
                delete removes[exists];
                return ;
            }
            var input = $('#payment_fields_pattern').clone();
            ids.push(id);
            input.removeAttr('id');
            $('label', input).attr('for', id);
            $('label .field_title', input).html(value.text);
            $('input', input).attr('id', id);
            input.removeClass('hidden');
            input.appendTo('#payment_fields');
        });
        removes.filter(Boolean).forEach(function(id, key){
            $('#' + id).parents('.amount_fields').remove();
        });
    });
    $('[name=repeat_status]').on('change', function(){
        if($('#repeat-status-weeks').is(':checked')){
            $('input', '#repeat-range').attr('disabled', 'disabled');
            $('#repeat-range').fadeTo('fast', .3);
            $('#repeat').fadeTo('fast', 1).removeAttr('disabled');
        }else{
            $('input', '#repeat-range').removeAttr('disabled');
            $('#repeat-range').fadeTo('fast', 1);
            $('#repeat').fadeTo('fast', .3).attr('disabled', 'disabled');
        }
    }).eq(0).trigger('change');

    $('#clients_type').on('change', function(){
        $('#client_selection_input')[$(this).val() == 'client' ? 'show' : 'hide']();

        $('#case_selection_input')[$(this).val() == 'case' ? 'show' : 'hide']();
    }).trigger('change');

    $('#group_session').on('change', function(){
        $('#clients-number-input')[$(this).is(':checked') ? 'show' : 'hide']();
    }).trigger('change');

    $('#ch-closed-at').on('change', function(){
        if($(this).is(':checked') ){
            $('#closed-at, #closed-at-picker').removeAttr('disabled');
            $('#closed-at-picker').fadeTo('fast', 1);
        }else{
            $('#closed-at, #closed-at-picker').attr('disabled', 'disabled');
            $('#closed-at-picker').fadeTo('fast', .3);
        }
    });

    $('#ch-opens-at').on('change', function(){
        if($(this).is(':checked') ){
            $('#opens-at, #opens-at-picker, #closed-at-input input').removeAttr('disabled');
            $('#opens-at-picker, #closed-at-input').fadeTo('fast', 1);
        }else{
            $('#opens-at, #opens-at-picker, #closed-at-input input').attr('disabled', 'disabled');
            $('#opens-at-picker,#closed-at-input').fadeTo('fast', .3);
        }
        $('#ch-closed-at').trigger('change');
    }).trigger('change');
});
