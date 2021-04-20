$('body').on('statio:dashboard:room:schedules:create statio:dashboard:case:schedules:create statio:dashboard:sessions:edit', function () {
    $('#fields').on('select2:select select2:unselect', function(e){
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
            input.attr('data-for', id);
            $('label', input).attr('for', id);
            $('label .field_title', input).html(value.text);
            $('input', input).attr('id', id);
            $('input', input).attr('name', 'amounts[]');
            $('input', input).val($(value.element).attr('data-amount'));
            input.removeClass('hidden');
            input.appendTo('#payment_fields');
        });
        removes.filter(Boolean).forEach(function(id, key){
            $('[data-for="'+id+'"]').remove();
        });
    }).trigger('select2:select');
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

        if($(this).val() == 'case'){
            $('select', '#case_selection_input').removeAttr('disabled');
        }else{
            $('select', '#case_selection_input').attr('disabled', 'disabled');
        }
        $('#case_selection_input')[$(this).val() == 'case' ? 'show' : 'hide']();

        $('#new_case_selection_input')[$(this).val() == 'new_case' ? 'show' : 'hide']();
        if($(this).val() == 'new_case'){
            $('textarea', '#new_case_selection_input').removeAttr('disabled');
        }else{
            $('textarea', '#new_case_selection_input').attr('disabled', 'disabled');
        }
    }).trigger('change');

    $('#group_session').on('change', function(){
        $('#clients-number-input')[$(this).is(':checked') ? 'show' : 'hide']();
    }).trigger('change');

    $('#ch-closed-at').on('change', function(){
        var elements = $('[data-for=closed-at]');
        if($(this).is(':checked') && !$(this).is(':disabled')){
            $('input', elements).removeAttr('disabled');
            $(elements).fadeTo('fast', 1);
            $('[data-for=closed-at] [name=closed_at_type]:checked').eq(0).trigger('change');
        }else{
            $('input', elements).attr('disabled', 'disabled');
            $(elements).fadeTo('fast', .3);
        }
    });

    $('[name=closed_at_type]').on('change', function(){
        var type = $(this).val();
        var select, unselect;
        if(type == 'relative'){
            select = $('[data-for=closed-at] [data-for=relative]');
            unselect = $('[data-for=closed-at] [data-for=absolute]');
        }else{
            unselect = $('[data-for=closed-at] [data-for=relative]');
            select = $('[data-for=closed-at] [data-for=absolute]');
        }
        $('input', select).removeAttr('disabled');
        select.show();

        $('input', unselect).attr('disabled', 'disabled');
        unselect.hide();
    });

    $('[name=opens_at_type]').on('change', function(){
        var type = $(this).val();
        var select, unselect;
        if(type == 'relative'){
            select = $('[data-for=opens-at] [data-for=relative]');
            unselect = $('[data-for=opens-at] [data-for=absolute]');
        }else{
            unselect = $('[data-for=opens-at] [data-for=relative]');
            select = $('[data-for=opens-at] [data-for=absolute]');
        }
        $('input', select).removeAttr('disabled');
        select.show();

        $('input', unselect).attr('disabled', 'disabled');
        unselect.hide();
    });

    $('#ch-opens-at').on('change', function(){
        var elements = $('[data-for=opens-at]');
        if($(this).is(':checked') ){
            $('input', elements).removeAttr('disabled');
            $(elements).fadeTo('fast', 1);

            $('#ch-closed-at').removeAttr('disabled');
            $('#ch-closed-at').parent().fadeTo('fast', 1);
            $('[data-for=opens-at] [name=opens_at_type]:checked').eq(0).trigger('change');
        }else{
            $('input', elements).attr('disabled', 'disabled');
            $(elements).fadeTo('fast', .3);

            $('#ch-closed-at').attr('disabled', 'disabled');
            $('#ch-closed-at').parent().fadeTo('fast', .3);
        }
        $('#ch-closed-at').trigger('change');
    }).trigger('change');

    $('[data-for=opens-at] [data-for=relative] input').on('change', function(){
        var days = $('#relative-opens-days').val() || 0;
        var hours = $('#relative-opens-hours').val() || 0;
        var minutes = $('#relative-opens-minutes').val() || 0;
        var time = (minutes * 60) + (hours * 60 * 60) + (days * 24 * 60 * 60);
        $('#relative-opens-at').val(time);
    }).trigger('change');

    $('[data-for=closed-at] [data-for=relative] input').on('change', function(){
        var days = $('#relative-closed-days').val() || 0;
        var hours = $('#relative-closed-hours').val() || 0;
        var minutes = $('#relative-closed-minutes').val() || 0;
        var time = (minutes * 60) + (hours * 60 * 60) + (days * 24 * 60 * 60);
        $('#relative-closed-at').val(time);
    }).trigger('change');

    $('[name=date_type]').on('change', function(){
        if($('#date-type-pattern').is(':checked')){
            $('#specific-date, #date').attr('disabled', 'disabled');
            $('#specific-date').fadeTo('fast', .3);
            $('input, select', '#pattern-elements').removeAttr('disabled');
            $('#pattern-elements').fadeTo('fast', 1);
            $('#repeat-status-weeks').trigger('change');
        }else{
            $('input, select', '#pattern-elements').attr('disabled', 'disabled');
            $('#pattern-elements').fadeTo('fast', .3);
            $('#specific-date, #date').removeAttr('disabled');
            $('#specific-date').fadeTo('fast', 1);
        }
    }).eq(0).trigger('change');

    $('#session_status').on('change', function(){
        if($(this).val() == 'registration_awaiting'){
            $('#ch-opens-at').attr('checked', 'checked').trigger('change').attr('data-enabled', 'enabled');
            $('#open-awaiting-elements').fadeIn('fast');
        }else{
            $('#ch-opens-at').removeAttr('checked').removeAttr('data-enabled').trigger('change');
            $('#open-awaiting-elements').fadeOut('fast');
        }
    }).trigger('change');
});
