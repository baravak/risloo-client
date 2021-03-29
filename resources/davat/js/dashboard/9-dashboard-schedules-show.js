$('body').on('statio:dashboard:schedules:create', function () {
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
            $('#started_at,#ended_at, #start-picker, #end-picker').attr('disabled', 'disabled');
            $('#repeat').removeAttr('disabled');
        }else{
            $('#started_at,#ended_at, #start-picker, #end-picker').removeAttr('disabled');
            $('#repeat').attr('disabled', 'disabled');
        }
    });
});
