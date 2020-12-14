$('body').on('statio:dashboard:sessions:report:create', function () {
    $("#encryption_type", this).on('change', function(){
        if($(this).val() != 'publicKey'){
            $('#encrypt_alert').addClass('d-none');
            $('button[type=submit]', $(this).parents('form')).removeAttr('disabled');
            $("#report").removeAttr('readonly');
            return;
        };
        $('button[type=submit]', $(this).parents('form')).attr('disabled', 'disabled');
        $('#encrypt_alert').removeClass('d-none');
    }).trigger('change');
    $('#encrypt_alert button').on('click', function(){
        if(!$("#report").val()) return true;
        var report = $("#report").val();
        $("#report").val(encryptPublicLong(report, auth_public_key));
        $('button[type=submit]', $(this).parents('form')).removeAttr('disabled');
        $("#encrypt_alert").addClass('d-none');
        $("#report").attr('readonly', 'readonly');
    });
});
    $('body').on('statio:dashboard:sessions:create', function () {
    // $('#myTab > li > a').on('hide.bs.tab', function (e) {
    //     $('.fai', this).removeClass('fa-dot-circle').addClass('fa-circle');
    //     if ($('#case').is('.active.show') && this == $('#reserve-tab')[0]) return;
    //     var panel = $(e.target).attr("href");
    //     $('input, select, checkbox, radio', panel).each(function () {
    //         if (!$(this).is(':disabled')) {
    //             $(this).attr('disabled', 'disabled').addClass('disabled');
    //         }
    //     });
    // }).on('shown.bs.tab', function(e){
    //     $('.fai', this).addClass('fa-dot-circle').removeClass('fa-circle');
    //     var panel = $(e.target).attr("href");
    //     if ($(this).is('#case-tab')) {
    //         $('#reserve').addClass('active').addClass('show');
    //         $("#reserve small.text-muted").removeClass('d-block').hide();
    //         panel += ', #reserve';
    //     }
    //     if($(this).is('#reserve-tab'))
    //     {
    //         $("#reserve small.text-muted").addClass('d-block');
    //     }
    //     if ($(this).is('#client-tab'))
    //     {
    //         $('#reserve').removeClass('active').removeClass('show');
    //         $('#reserve-tab').trigger('hide.bs.tab');
    //     }
    //     $('input, select, checkbox, radio', panel).each(function () {
    //         if ($(this).is('.disabled:disabled')) {
    //             $(this).removeAttr('disabled').removeClass('disabled');
    //         }
    //     });
    // });
    // $('#myTab > li > a').each(function(){
    //     $(this).trigger(($(this).is('.active') ? 'shown' : 'hide') + '.bs.tab');
    // });
});
$('body').on('statio:dashboard:samples:show', function(){
    $('#scoring-btn', this).on('statio:jsonResponse', function (event, response, jqXHR) {
        $('.profile-link').remove();
        $('#scoring-extends').html('');
        if (response.is_ok)
        {
            $('#profile-export i').removeClass('d-none');
            $('#profile_svg *').remove();
            $('#profile_svg').append($('<i class="fas fa-cog fa-spin"></i>'));
            scoringResult.call(this, response, jqXHR);
        }
        else
        {
            $('.status-action').show();
        }
    }).on('statio:init', function(){
        $('.status-action').hide();
        $('#profile-export-menu').addClass('d-none');
    });
    if (['scoring', 'craeting_files'].indexOf($("#sample-show").attr('data-status')) >= 0)
    {
        if ($("#sample-show").attr('data-status') == 'scoring')
        {
            $('#scoring-btn').addClass('lijax-preload');
        }
        scoringResultAwaiting.call($('#scoring-btn')[0], { data: { id: $("#sample-show").attr('data-sample')}});
    }
});
$('body').on('statio:dashboard:centers:create statio:dashboard:centers:edit', function(){
    $('[name=type]', this).on('change', function(event, start){
        var manage_field = $('#manager_id');
        var endpoint = manage_field.attr('data-url');
        var data_url = endpoint;
        endpoint = url.parse(endpoint);
        endpoint.get = endpoint.get ? endpoint.get : {};
        if ($('#type-personal_clinic[name=type]').is(':checked'))
        {
            endpoint.get.personal_clinic = 'no';
            $('#avatar, #title').prop('disabled', true);
            $('#avatar, #title').parents('.form-group').fadeOut('fast');
        }
        else
        {
            if(!start)
            {
                $('#title').val('');
            }
            $('#avatar, #title').prop('disabled', false);
            $('#avatar, #title').parents('.form-group').fadeIn('fast');
            endpoint.get.personal_clinic = 'yes';
        }

        if (url.build(endpoint) != data_url) {
            manage_field.attr('data-url', url.build(endpoint));
            $('*', manage_field).remove();
            manage_field.select2('destroy');
            select2element.call(manage_field[0]);
        }
    });
    $('[name=type]').eq(0).trigger('change', [true]);
});
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
    $('#room-tab').trigger(($('#room-tab').is('.active') ? 'show' : 'hide') + '.bs.tab');


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
        $("[data-encType=publicKey]").each(function(){
            if(localStorage.privateKey){
                    var _self = this;
                    asyncDecryptPrivateLong($(this)[$(this).is('input, textarea') ? 'val' : 'html'](), localStorage.privateKey).then(function(result){
                        if($(_self).is('input, textarea')){
                            $(_self).val(result);
                        }else{
                            $(_self).html(result.replace(/\n/gmi, '<br>'));
                        }
                    });
            }
        });
    base.each(function () {
        $('#privateKey', base).on('change', function(){
            localStorage.privateKey = $(this).val();
        }).val(localStorage.privateKey);
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
        var clinic = data.all.center.detail.title;
        $('div.data-id', span).html(clinic);
        return span;
    }
    return data.text;
}

function select2result_center(data, option) {
    if (!data.all && data.element) {
        data.all = JSON.parse($(data.element).attr('data-json'));
        $(data.element).attr('data-json', '');
    }
    if (data.all) {
        var span = $('<div class="d-flex align-items-center fs-12 d-inline-block"><span class="media media-sm media-primary"><img alt="A"></span><div class="pr-1"><div class="font-weight-bold data-name"></div><div class="fs-10 data-id"></div></div></div>');
        var avatar = select2find_data(data.all, $(this).attr('data-avatar') || 'detail.avatar.tiny.url detail.avatar.small.url');
        if (avatar) {
            $('img', span).attr('src', avatar);
        }
        else {
            $('img', span).remove();
            $('.media', span).html('<span>' + (data.text ? data.text.substr(0, 1) : 'RS') + '</span>');
        }
        var name = select2find_data(data.all, $(this).attr('data-title') || 'detail.title');
        $('div.data-name', span).html(name);
        var clinic = data.text;
        $('div.data-id', span).html(data.id);
        return span;
    }
    return data.text;
}

function select2result_case_clients(data, option) {
    if (!data.all && data.element) {
        data.all = JSON.parse($(data.element).attr('data-json'));
        $(data.element).attr('data-json', '');
    }
    if (!data.all) return data.text;
    var clients = [];
    data.all.clients.forEach(function(client){
        clients.push(client.user.name || client.user.id);
    });
    var list = $('<span></span>');
    $('<div>'+ clients.join('- ') +'</div>').addClass('fs-12').appendTo(list);
    $('<div></div>').text(data.id).addClass('fs-10').appendTo(list);
    return list;
}

function select2result_sessions(data, option) {
    if (!data.all && data.element) {
        data.all = JSON.parse($(data.element).attr('data-json'));
        $(data.element).attr('data-json', '');
    }
    if (!data.all) return data.text;
    var list = $('<div></div>').addClass('row m-0 p-0');
    var gDate = new Date(data.all.started_at);
    var date = (new persianDate(gDate)).calendar();
    var calendar = date.year + '/' + date.month + '/' + date.day;
    var time = gDate.getHours();
    time += ':' + gDate.getMinutes();
    $('<div>'+ data.all.status +'</div>').addClass('col-4 fs-12').appendTo(list);
    $('<div>'+ calendar +'</div>').addClass('col-3 fs-10').appendTo(list);
    $('<div>'+ time +'</div>').addClass('col-3 fs-10').appendTo(list);
    return list;
}

function scoringResult(response, jqXHR)
{
    var _self = this;
    if (response.data.score)
    {
        if($(this).is('.lijax-preload'))
        {
            var preload = $('#' + $(this).attr('data-lijax-preload')).eq(0);
            preload.fadeOut('fast', function(){
                $('#profile-export-menu').hide().removeClass('d-none').fadeIn('fast');
            });
            $(this).removeClass('lijax-preload');
        }
    }
    if (!response.data.score || !response.data.profiles)
    {
        setTimeout(function(){
            scoringResultAwaiting.call(_self, response);
        }, 2000);
        return;
    }
    for (var key in response.data.profiles) {
        var profile = response.data.profiles[key];
        var  element = $('.profile-link.profile-'+ key).eq(0);
        if(!element.length)
        {
            $('<a href="' + profile.url + '" target="_blank" data-type="'+ key + '" class="dropdown-item fs-12 profile-link profile-' + key + '">'+  (key.replace('profile_', '')).replace(/_/gi, ' ').toUpperCase() +'</a>').appendTo('#profile-export-list');
        }
        else {
            $('.profile-link.profile-'+ key).attr('href', profile.url);
        }
    }
    $('.profile-link').fadeIn('fast');
    if(jqXHR.status != 200) {
        setTimeout(function () {
            scoringResultAwaiting.call(_self, response);
        }, 5000);
    } else {
        if($('#scoring-extends').length)
        {
            new Statio({
                type: 'render',
                context: $('#scoring-extends').eq(0),
                ajax: {
                    cache: false,
                    method: 'get'
                },
                url: '/dashboard/samples/' + response.data.id + '/scoring?html=1'
            });
        }
        $('#profile-export i').fadeOut('fast', function () {
            $(this).addClass('d-none');
        });
    }
    if (response.data.profiles.profile_svg && !$('#profile_svg img').length)
    {
        $('#profile_svg *').remove();
        $('#profile_svg').append($('<img src="' + response.data.profiles.profile_svg.url + '" class="d-none">'));
        $('#profile_svg img').hide().removeClass('d-none').fadeIn('slow').addClass('d-block');
    }

}

function scoringResultAwaiting(response)
{
    $.ajax({
        context : this,
        url: '/dashboard/samples/' + response.data.id + '/scoring',
        success : function(data, statusText, jqXHR){
            scoringResult.call(this, data, jqXHR);
        }
    });
}
