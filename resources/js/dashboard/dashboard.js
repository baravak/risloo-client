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
        if (!response.is_ok)
        {
            $('.status-action').show();
        }
    }).on('statio:init', function(){
        $('.status-action').hide('fast');
    });
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
            davat.select2(manage_field);
        }
    });
    $('[name=type]').eq(0).trigger('change', [true]);
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

$('body').on('statio:dashboard:center:users:create', function(){
    $("#position").on('change', function(){
        if($(this).val() == 'client'){
            $("#nickname").parent().show();
            $("#room_id").parent().show();
            $("#create_case").parent().show();
        }else{
            $("#nickname").parent().hide();
            $("#room_id").parent().hide();
            $("#create_case").parent().hide();
        }
    }).trigger('change');
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
