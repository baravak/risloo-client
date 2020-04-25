$(document).on('statio:global:renderResponse', function (event, base, context) {
    base.each(function () {
        $('#counseling_center_id', this).on('select2:select', function (e) {
            var url = $('#psychologist_id').attr('data-url-pattern').replace('%%', $(this).val());
            $('#psychologist_id').attr('data-url', url);
            $('#psychologist_id').select2('destroy');
            $('#psychologist_id *').remove();
            select2element.call($('#psychologist_id')[0]);
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
