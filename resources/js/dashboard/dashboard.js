$('body').on('statio:dashboard:samples:show', function () {
    $('#editable', this).on('change', function(){
        if ($(this).is(':checked'))
        {
            $('.form-items').removeAttr('disabled');
        }
        else
        {
            $('.form-items').attr('disabled', 'disabled');
        }
    });
});

$('body').on('statio:dashboard:reserves:create', function () {
    $('#started_at').on('change', function(event, picker, unix){
        var start = $("#calendar").attr('data-from');
        var end = $("#calendar").attr('data-to');
        var val = $(this).val();
        if (start <= val && end >= val){

        }
        else
        {
            new Statio({
                type: 'render',
                context: this,
                ajax: {
                    cache: false,
                    method: 'get',
                    data: {
                        room_id: $('#room_id').val(),
                        time: val
                    }
                },
                url: $("#calendar").attr('data-url')
            });
        }
    });
});

$('body').on('statio:dashboard:samples:create', function(){
    $('#room-tab').on('show.bs.tab', function () {
        $('input, select, checkbox, radio', '#room').each(function () {
            if ($(this).is('.disabled:disabled')) {
                $(this).removeAttr('disabled').removeClass('disabled');
            }
        });
        $('input, select, checkbox, radio', '#case').each(function () {
            if (!$(this).is(':disabled')) {
                $(this).attr('disabled', 'disabled').addClass('disabled');
            }
        });
    }).on('hide.bs.tab', function () {
        $('input, select, checkbox, radio', '#room').each(function () {
            if (!$(this).is(':disabled')) {
                $(this).attr('disabled', 'disabled').addClass('disabled');
            }
        });
        $('input, select, checkbox, radio', '#case').each(function () {
            if ($(this).is('.disabled:disabled')) {
                $(this).removeAttr('disabled').removeClass('disabled');
            }
        });
    });


    $('#room_client_id.sample-page').on('change', function () {
        if (!$(this).val() || !$(this).val().length) {
            $('#count').removeAttr('disabled');
        }
        else {
            $('#count').attr('disabled', 'disabled');
        }
    });
    $('#count.sample-page').on('change', function () {
        if (!$(this).val()) {
            $('#room_client_id.sample-page').removeAttr('disabled');
        }
        else {
            $('#room_client_id.sample-page').attr('disabled', 'disabled');
        }
    });

    $('#case_id').on('select2:select', function(event){
        $('#client-null-tamplate').hide();
        event.params.data.all.clients.forEach(function(e, i){
            var template = $('#client-template').clone();
            template.removeClass('d-none');
            template.removeAttr('id');
            $('.data-name', template).text(e.user.name);
            var avatar = e.user.avatar ? e.user.avatar.small : null;
            if(avatar)
            {
                $('img', template).attr('src', e.user.avatar.small.url);
            }
            else
            {
                $('img', template).remove();
                $('.media', template).append('<span>' + (e.user.name.substr(0, 1)) + '</span>');
            }
            $('input', template).attr('id', 'client-' + e.user.id).attr('name', 'client_id[]').attr('value', e.id);
            $('label', template).attr('for', 'client-' + e.user.id);
            template.appendTo('#client-list');
        });
    });
    $('#case_id').on('change', function(){
        $('#client-list .richak').remove();
        if (!$(this).val())
        {
            $('#client-null-tamplate').show();
        }
    });
});

$(document).on('statio:global:renderResponse', function (event, base, context) {
    var selectedTab = location.hash;
    var tabNav = $('[data-toggle=tab][href$="' + selectedTab + '"]');
    tabNav.trigger('click');

    base.each(function () {
        $('[data-toggle=tab]', base).on('click', function () {
            var href = $(this).attr('href').match(/(\#.+)$/);
            if (href) {
                location.hash = href[1];
            }
        });
        $('.score_data', this).each(function(){
            var score = JSON.parse($(this).text());
            var chart_function = ($(this).attr('data-scale-id'));
            score_chart[chart_function].call(this, score);
        });
    });
});


function select2result_room(data, option){
    if (!data.all && data.element)
    {
        data.all = JSON.parse($(data.element).attr('data-json'));
        $(data.element).attr('data-json', '');
    }
    if (data.all) {
        var span = $('<div class="d-flex align-items-center fs-12 d-inline-block"><span class="media media-sm media-primary"><img alt="A"></span><div class="pr-1"><div class="font-weight-bold data-name"></div><div class="fs-10 data-id"></div></div></div>');
        var avatar = select2find_data(data.all, $(this).attr('data-avatar') || 'avatar.tiny.url avatar.small.url');
        if (avatar) {
            $('img', span).attr('src', avatar);
        }
        else {
            $('img', span).remove();
            $('.media', span).html('<span>' + (data.text ? data.text.substr(0, 1) : 'IR') + '</span>');
        }
        var name = data.text || data.id;
        $('div.data-name', span).html(name);
        var clinic = data.all.owner.name;
        if (data.all.type == 'clinic')
        {
            clinic = i18n('Personal clinic');
        }
        $('div.data-id', span).html(clinic);
        return span;
    }
    return data.text;
}

function select2result_case_clients(data, option) {
    if (!data.all) return data.text;
    var clients = [];
    data.all.clients.forEach(function(client){
        clients.push(client.user.name || client.user.id);
    });
    return $('<span></span>').text(clients.join('- ')).addClass('fs-12');
}
