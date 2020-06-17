(function(){
    var title = $('#title').html();
    var current = 0;
    var panel = 'description';
    var titleDesign = new Object();
    var answerDesign = new Object();
    function display()
    {
        var itemElement = $('#item');
        if (current == 0)
        {
            panel = 'description';
            $('#title').html(title);
            $('#description').show();
            itemElement.hide();
            globalDesign();
            return;
        }
        var item = items[current-1];
        if (panel == 'description')
        {
            $('#description').hide();
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
        });
    }

    function next()
    {
        current = Math.min(Math.max(0, ++current), items.length);
        location.hash = '#' + current
    }

    function prev() {
        current = Math.min(Math.max(0, --current), items.length);
        location.hash = '#' + current;
    }
    function globalDesign()
    {
        $('#nav-count').text(current);
        var progress = (current * 100) / items.length;
        $("#progress").css('width', progress + '%').attr('aria-valuenow', progress);
        if (current == 0)
        {
            $('#nav-prev').addClass('disabled').removeAttr('href');
        }
        else
        {
            $('#nav-prev').removeClass('disabled').attr('href', '#' + (current-1));
        }
        if (current == items.length) {
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
            $('input', itemElement).off('click.answer');
            $('input', itemElement).off('clicked.answer');
            answerSelect($(this).val());
        });
        $('input', itemElement).on('clicked.answer', function(){
            $(this).trigger('click.answer');
        });
    }

    function answerSelect(id){
        items[current - 1].user_answered = id;
        var input = $('input[value=' + id + ']');
        var parent = input.parents('div.radio');
        $('#item div.radio').each(function () {
            if (this != parent[0]) {
                $(this).fadeTo('fast', .2);
            }
        });
        setTimeout(next, 500);
    }

    $(document).on('keyup', function(e){
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
        current = location.hash.replace('#', '');
        display();
    });
    if(/^#\d+$/.test(location.hash))
    {
        $(window).trigger('hashchange');
    }
})();

function x(){

}
