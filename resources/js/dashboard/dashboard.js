$(document).on('statio:global:renderResponse', function (event, base, context) {
    base.each(function () {
        $('#room-tab', this).on('show.bs.tab', function(){
            $('input, select, checkbox, radio', '#room').each(function(){
                if($(this).is('.disabled:disabled')){
                    $(this).removeAttr('disabled').removeClass('disabled');
                }
            });
            $('input, select, checkbox, radio', '#case').each(function () {
                if (!$(this).is(':disabled')) {
                    $(this).attr('disabled', 'disabled').addClass('disabled');
                }
            });
        }).on('hide.bs.tab', function(){
            $('input, select, checkbox, radio', '#room').each(function(){
                if(!$(this).is(':disabled'))
                {
                    $(this).attr('disabled', 'disabled').addClass('disabled');
                }
            });
            $('input, select, checkbox, radio', '#case').each(function () {
                if ($(this).is('.disabled:disabled')) {
                    $(this).removeAttr('disabled').removeClass('disabled');
                }
            });
        });


        $('#room_client_id.sample-page', this).on('change', function(){
            if (!$(this).val() || !$(this).val().length)
            {
                $('#count').removeAttr('disabled');
            }
            else
            {
                $('#count').attr('disabled', 'disabled');
            }
        });
        $('#count.sample-page', this).on('change', function () {
            if (!$(this).val()) {
                $('#room_client_id.sample-page').removeAttr('disabled');
            }
            else {
                $('#room_client_id.sample-page').attr('disabled', 'disabled');
            }
        });
        $('#room_id.sample-create', this).on('change', function(){
            // var relation = $('#' + relation_id);
            // var url = unescape(relation.attr('data-url-pattern')).replace('%%', $(this).val());
            // relation.attr('data-url', url);
            // relation.select2('destroy');
            // $('*', relation).remove();
            // select2element.call(relation[0]);
        });
    });
});


function select2result_room(data, option){
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
