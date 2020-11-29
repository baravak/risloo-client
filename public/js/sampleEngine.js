(function(){
    var current = 0;
    var panel = 'description';
    var answerDesign = new Object();
    var blockEvents = false;
    var sync = false;
    var sync_log = [];
    var skip = false;
    // var trysts = [0, 1, 2, 3, 4, 5, 10, 15];
    var trysts = [0, 1, 2];
    var try_count = 0;
    function save(item, id)
    {
        if (typeof (Storage) !== "undefined") {
            var data = [];
            if ((sData = localStorage.getItem(sample_id)))
            {
                data = sData.split(',');
            }
            data[item] = id;
            localStorage.setItem(sample_id, data.join(','));
        }
        sync_log.push([item, id]);
        if(!sync){
            send();
        }
    }

    function send()
    {
        sync = true;
        var data = sync_log;
        sync_log = [];
        $("#sync_status").text('درحال ذخیره سازی...');
        $.ajax({
            dataType: "json",
            url: '/$/' + sample_id + '/items',
            method: 'post',
            data: {items : data}
        }).always(function (response, status){
            if (status != 'success')
            {
                $('#sync_alert').removeClass('d-none');
                $("#sync_status").text('درحال تلاش دوباره...');
                for (var i = 0; i < data.length; i++) {
                    sync_log.push(data[i]);
                }
                trySend();
            }
            else
            {
                $('#sync_alert').addClass('d-none');
                try_count = 0;
                $("#sync_status").text('ذخیره شده');
                if (sync_log.length)
                {
                    send();
                }
                else
                {
                    sync = false;
                }
            }
        });
    }

    function trySend()
    {
        var time = trysts[Math.min(Math.max(0, ++try_count), trysts.length -1)];
        setTimeout(send, time * 1000);
    }

    function display()
    {
        if (blockEvents) return;
        blockEvents = true;
        var current_panel = null;
        $('[data-panel]').each(function(){
            if($(this).css('display') == 'block'){
                current_panel = $(this);
            }
        });
        current_panel.trigger('panel:hide', [panel, current, items]);
        current_panel.fadeOut('fast', function(){
            if (panel == 'item') {
                var item = items[current - 1];
                $("#item-section").html('');
                answerDesign[item.answer.type](item);
            }
            globalDesign();
            $('[data-panel=' + panel + ']').trigger('panel:show', [panel, current, items]);
            $('[data-panel='+panel+']').fadeIn('fast', function(){
                if(panel != 'item') {
                    current = 0;
                }
                blockEvents = false;
                return;
            });
        });

        return;
    }

    function next()
    {
        var current_view = $('#nav-count option[value=' + (panel == 'item' ? current : panel) + ']');
        if (current_view.next().val())
        {
            location.hash = '#' + current_view.next().val();
        }
    }

    function prev() {
        var current_view = $('option[value=' + (panel == 'item' ? current : panel) + ']');
        if (current_view.prev().val()) {
            location.hash = '#' + current_view.prev().val();
        }
    }
    function globalDesign()
    {
        $('#nav-count option').removeAttr('selected');
        if ($('#nav-count select').is(':disabled'))
        {
            $('#nav-count select').removeAttr('disabled');
        }
        var current_view = $('#nav-count option[value=' + (panel == 'item' ? current : panel) + ']');
        current_view.attr('selected', 'selected');
        var progress = panel == 'item' ? (current * 100) / items.length : 0;

        $("#progress").css('width', progress + '%').attr('aria-valuenow', progress);

        if (current_view.prev()[0])
        {
            $('#nav-prev').removeClass('disabled').attr('href', '#' + current_view.prev().val());
        }
        else
        {
            $('#nav-prev').addClass('disabled').removeAttr('href');
        }

        if (current_view.next()[0]) {
            $('#nav-next').removeClass('disabled').attr('href', '#' + current_view.next().val());
        }
        else {
            $('#nav-next').addClass('disabled').removeAttr('href');
        }
    }
    answerDesign.optional = function(item)
    {
        var itemElement = $('#item-section');
        var type = item.answer.type;
        type = type == 'optional' ? 'options' : type;
        if(item.type == 'image_url'){
            $('<div class="row"></div>').appendTo(itemElement);
        }
        item.answer[type].forEach(function(option, i){
            var id = i+1;
            var template = $('#template div.radio').eq(0).clone();
            template.addClass(item.answer.tiles == 4 ? 'col-3' : 'col-4');
            $('input', template).val(id).attr('name', 'options').attr('id', id);
            if (item.user_answered == id){
                $('input', template).attr('checked', 'checked');
            }
            $('label', template).attr('for', id);
            $('label span', template).attr('data-number', id);
            if(item.answer.type == 'optional_images'){
                var img;
                if(typeof option == 'object'){
                    img = $(option).addClass('w-75');
                }
                else{
                    img = $('<img src="'+ option +'.png" class="w-75"/>');
                }
                $('label', template).append(img);
                template.appendTo($('div.row', itemElement));
            }else{
                $('label', template).append(option);
                template.appendTo(itemElement);
            }
        });
        $('input', itemElement).on('click.answer', function(){
            if (blockEvents) {
                return true;
            }
            $('input', itemElement).off('click.answer');
            $('input', itemElement).off('clicked.answer');
            answerSelect($(this).val());
        });
        $('input', itemElement).on('clicked.answer', function(){
            $(this).trigger('click.answer');
        });
        if(item.type == 'image_url'){
            $('[data-panel=item] .card-title').html('');
            var img;
            if(typeof item.image_url == 'object'){
                img = $(item.image_url).addClass('w-100');
            }
            else{
                img = $('<img src="'+ item.image_url +'.png" class="w-100"/>');
            }
            var secI = $('<div class="w-50 m-auto"></div>');
            img.appendTo(secI);
            secI.appendTo($('[data-panel=item] .card-title'));
        }else{
            $('[data-panel=item] .card-title').html(item.text);
        }
    }
    answerDesign.optional_images = answerDesign.optional;

    function firstEmpty(){
        for (var i = 0; i < items.length; i++) {
            if (!items[i].user_answered)
            {
                return i;
            }
        }
        return undefined;
    }

    function answerSelect(id){
        id = parseInt(id);
        items[current - 1].user_answered = id;
        save(current, id);
        var input = $('input[value=' + id + ']');
        var parent = input.parents('div.radio');
        $('#item-section div.radio').each(function () {
            if (this != parent[0]) {
                $('input', this).attr('disabled', 'disabled');
                $(this).fadeTo('fast', .2);
            }
        });
        current = skip ? (firstEmpty() || items.length  ) : current;
        setTimeout(next, 500);
    }

    $(document).on('keyup', function(e){
        if (blockEvents){
            return true;
        }
        if (e.ctrlKey  || e.shiftKey  || e.altKey || ['Control', 'Shift', 'Alt', 'Meta'].indexOf(e.key) != -1){
            return true;
        }

        if (e.key == 'Enter' || e.key == 'ArrowLeft')
        {
            next();
        } else if (e.key == 'ArrowRight') {
            prev();
        }
        if (/^(Digit|Numpad)\d$/.test(e.code))
        {
            var id = e.code.replace(/Digit|Numpad/, '');
            $('input[value=' + id + ']').trigger('clicked.answer');
        }
    });

    $(window).on('hashchange', function(){
        if (blockEvents) {
            return true;
        }

        var method = location.hash.replace('#', '');
        if (!/^\d+$/.test(method)) {
            var valid_panel = ['description', 'information', 'close'];
            panel = valid_panel.indexOf(method) != -1 ? method : 'description';
        }
        else
        {
            panel = 'item';
            method = parseInt(method);
            current = Math.min(Math.max(1, method), items.length);
        }
        display();
    });
    $(document).ready(function () {
        $('#skip').on('click', function(){
            if($(this).is(':checked'))
            {
                skip = true;
            }
            else
            {
                skip = false;
            }
        });
        var navigation_selection = $('<select class="form-control"></select>');
        navigation_selection.on('change', function(){
            if (blockEvents){
                return false;
            }
            location.hash = '#' + $(this).val();
            $(this).attr('disabled', 'disabled');
        });
        $('<option value="description">توضیحات</option>').appendTo(navigation_selection);
        if (prerequisite)
        {
            $('<option value="information">اطلاعات</option>').appendTo(navigation_selection);
        }
        items.forEach(function(item, index) {
            $('<option value="' + (index + 1) + '">' + (index + 1) + '</option>').appendTo(navigation_selection);
        });
        $('<option value="close">پایان</option>').appendTo(navigation_selection);
        $('#nav-count').append(navigation_selection);

        $(window).trigger('hashchange');

        if (typeof (Storage) !== "undefined") {
            data = [];
            if ((sData = localStorage.getItem(sample_id))) {
                data = sData.split(',');
            }
            data.forEach(function(value, index){
                if (!items[index].user_answered && value){
                    items[index].user_answered = value;
                    sync_log.push([index, value]);
                }
            });
            if (sync_log.length)
            {
                send();
            }
        }
    });

    $('#download, #download-close').on('click', function(){
        var data = [sample_id];
        for (var i = 0; i < items.length; i++) {
            data.push(items[i].user_answered || null);
        }
        var text = data.join('\n');
        var information = [];
        $('input, select, textarea', '[data-panel=information] form').each(function(){
            information.push($(this).val().replace(',', ''));
        });
        text = text.replace(/^([^\n]+)/, "$1," + information.join(','));
        var fileType = 'plain/text';
        var fileName = sample_id + '.csv';
        var blob = new Blob([text], { type: fileType });

        var a = document.createElement('a');
        a.download = fileName;
        a.href = URL.createObjectURL(blob);
        a.dataset.downloadurl = [fileType, a.download, a.href].join(':');
        a.style.display = "none";
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        setTimeout(function () { URL.revokeObjectURL(a.href); }, 1500);
            return false;
        });
    $('#nav-prev, #nav-next').on('click', function(){
        if(blockEvents) return false;
        return true;
    })
})();

$('[data-panel=information] form').on('statio:done', function (event, res) {
    var _self = this;
    if (res.is_ok) {
        $(this).attr('data-on-request', 'false');
        return;
    }
    if (!res.is_ok) {
        setTimeout(function () {
            $(_self).trigger('submit');
        }, 5000);
    }

});

$('[data-panel=information]').on('panel:hide', function(panel, current, items){
    if ($('form', this).attr('data-on-request') == 'true')
    {
        return;
    }
    $('form', this).attr('data-on-request', 'true');
    $('form', this).trigger('submit');
});
