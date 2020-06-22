(function(){
    var title = $('#title').html();
    var current = 0;
    var panel = 'description';
    var titleDesign = new Object();
    var answerDesign = new Object();
    var blockEvents = false;
    var sync = false;
    var sync_log = [];
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
        $("#sync_status").text('درحال ذخیره سازی...');
        var data = sync_log;
        sync_log = [];
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
        blockEvents = true;;
        var itemElement = $('#item');
        if (current == 0)
        {
            panel = 'description';
            $('#title').html(title);
            $('#description').show();
            itemElement.hide();
            globalDesign();
            blockEvents = false;
            return;
        }
        else if(current > items.length)
        {
            panel = 'close';
            itemElement.hide();
            $('#description').hide();
            $('#title').html('پایان نمونه‌گیری');
            $('#close').show();
            globalDesign();
            blockEvents = false;
            return;
        }
        var item = items[current-1];
        if (panel != 'item')
        {
            $('#description').hide();
            $('#close').hide();
            panel = 'item';
            itemElement.show();
        }
        $('#title').fadeTo('fast', 0);
        itemElement.fadeTo('fast', 0, function(){
            $(this).css('width', $(this).width());
            $(this).children().remove();
            titleDesign[item.type](item);
            answerDesign[item.answer.type](item);
            $(this).css('width', 'initial').fadeTo('fast', 1);
            $('#title').fadeTo('fast', 1);
            globalDesign();
            blockEvents = false;
        });
    }

    function next()
    {
        current = parseInt(Math.min(Math.max(0, ++current), items.length + 1));
        location.hash = '#' + current;
    }

    function prev() {
        current = parseInt(Math.min(Math.max(0, --current), items.length + 1));
        location.hash = '#' + current;
    }
    function globalDesign()
    {
        $('#nav-count option').removeAttr('selected');
        if ($('#nav-count select').is(':disabled'))
        {
            $('#nav-count select').removeAttr('disabled');
        }
        $('option[value=' + current +']').attr('selected', 'selected');
        var progress = (current * 100) / items.length;
        $("#progress").css('width', progress + '%').attr('aria-valuenow', progress);
        if (current == 0)
        {
            $('#nav-prev').addClass('disabled').removeAttr('href');
        }
        else
        {
            $('#nav-prev').removeClass('disabled').attr('href', '#' + (current - 1));
        }
        if (current > items.length) {
            $('#nav-next').addClass('disabled').removeAttr('href');
        }
        else
        {
            $('#nav-next').removeClass('disabled').attr('href', '#' + (current + 1));
        }
    }
    titleDesign.text = function(item)
    {
        $("#title").html(item.text);

    }
    answerDesign.optional = function(item)
    {
        var itemElement = $('#item');
        item.answer.options.forEach(function(option, i){
            var id = i+1;
            var template = $('#template div.radio').eq(0).clone();
            $('input', template).val(id).attr('name', 'options').attr('id', id);
            if (item.user_answered == id){
                $('input', template).attr('checked', 'checked');
            }
            $('label', template).attr('for', id);
            $('label span', template).attr('data-number', id);
            $('label', template).append(option);
            template.appendTo(itemElement);
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
    }

    function answerSelect(id){
        id = parseInt(id);
        items[current - 1].user_answered = id;
        save(current - 1, id);
        var input = $('input[value=' + id + ']');
        var parent = input.parents('div.radio');
        $('#item div.radio').each(function () {
            if (this != parent[0]) {
                $('input', this).attr('disabled', 'disabled');
                $(this).fadeTo('fast', .2);
            }
        });
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
        if (!/^#\d+$/.test(location.hash)) {
            return;
        }
        current = parseInt(location.hash.replace('#', ''));
        display();
    });
    $(document).ready(function () {
        var navigation_selection = $('<select class="form-control"></select>');
        navigation_selection.on('change', function(){
            if (blockEvents){
                return false;
            }
            location.hash = '#' + $(this).val();
            $(this).attr('disabled', 'disabled');
        });
        $('<option value="0">#</option>').appendTo(navigation_selection);
        items.forEach(function(item, index) {
            $('<option value="' + (index + 1) + '">' + (index + 1) + '</option>').appendTo(navigation_selection);
        });
        $('<option value="' + (items.length + 1) + '">پایان</option>').appendTo(navigation_selection);
        $('#nav-count').append(navigation_selection);
        if (/^#\d+$/.test(location.hash)) {
            $(window).trigger('hashchange');
        }
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

    $('#download').on('click', function(){
        var data = [sample_id];
        for (var i = 0; i < items.length; i++) {
            data.push(items[i].user_answered);
        }
        var text = data.join(',');
        var fileType = 'plain/text';
        var fileName = sample_id + '.risloo';
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
})();
