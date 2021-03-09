(function(){
    var pannel = $('[data-nav]');
    var current = 0;
    var indexs = [];
    var blockEvents = false;
    var items = $('[data-nav][data-type="item"]');
    pannel.each(function(){
        var slug = $(this).attr('data-nav');
        var title = $(this).attr('data-title');
        indexs.push(slug);
        var nav = $('<option></option>').attr('value', slug).html(title);
        $('#nav-count').append(nav);
    });
    function find(slug){
        return indexs.indexOf(slug);
    }
    function next(){
        var next = indexs[Math.min(current + 1, indexs.length - 1)];
        location.hash = '#' + next;
    }


    function prev(){
        var prev = indexs[Math.max(0, current - 1)];
        location.hash = '#' + prev;
    }

    function display(pointer){
        pannel.addClass('hidden').css('display', 'none');
        pannel.eq(current).trigger('pannel:hide');
        pannel.eq(pointer).css('display', 'none').removeClass('hidden').fadeIn('slow', function(){
            $('#nav-count').removeAttr('disabled');
            blockEvents = false;
            pannel.eq(pointer).trigger('pannel:show');
        });
        current = pointer;
        if(pannel.eq(pointer).attr('data-type') == 'item'){
            $('#nav-text').html(pannel.eq(pointer).attr('data-nav') + '/' + items.length);
        }else{
            $('#nav-text').html('0/' + items.length);
        }
        var progress = (current / (pannel.length - 1)) * 100;
        $('#progress').css('width', progress + '%');
    }
    $('#nav-next').on('click', function(){
        if(blockEvents) return false;
        blockEvents = true;
        next();
    });

    $('#nav-prev').on('click', function(){
        if(blockEvents) return false;
        blockEvents = true;
        prev();
    });
    $('#nav-count').on('change', function(){
        $(this).attr('disabled', 'disabled');
        location.hash = '#' + $(this).val();
    });
    $(window).on('hashchange', function(){
        var slug = location.hash.replace(/^#/, '');
        var index = find(slug);
        $('#nav-count').val(slug);
        display(index > -1 ? index : 0);
    });
    $(window).trigger('hashchange');
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
            if(pannel.eq(current).is('[data-type="item"]') && pannel.eq(current).has('[data-keyboard='+id+']')){
                var answer = $('[data-keyboard='+id+']', pannel.eq(current));
                if(answer.attr('type') == 'radio'){
                    answer[0].checked = true;
                    answer.trigger('change');
                }
            }
        }
    });
    $('input', '[data-type="item"]').on('change', function(){
        var data = JSON.parse($(this).attr('data-merge'));
        if($(this).is(':radio')){
            data[1] = $(this).val();
            $(this).parents('[data-type="item"]').attr('data-answer', $(this).val());
        }
        queue(data);
        findEmpty();
    });
    $('input', '[data-type="item"]').on('change', function(){
        if(['optional', 'optional_images'].indexOf($(this).parents('[data-nav]').attr('data-answer-type')) == -1) return true;
        if($(this).is(':radio')){
            $(this).next().css('opacity', '');
            $('[name="'+ $(this).attr('name') + '"]').not('[value="' + $(this).val() + '"]').next().fadeTo('fast', .2);
            var _self = this;
            setTimeout(function(){
                next();
                $('[name="'+ $(_self).attr('name') + '"]').next().css('opacity', '');
            }, 300);
        }
    });
    var queues_list = [];
    var requesting = false;
    var tryTimes = [1, 3, 5, 10, 15];
    var tryCount = 0;
    function queue(data){
        queues_list.push(data);
        if(requesting) return false;
        tryCount = -1;
        $('#sync_status').html('درحال ذخیره‌کردن...');
        send();
    }

    function send(){
        requesting = true;
        var data = queues_list.splice(0);
        $.ajax({
            dataType: "json",
            url: '/$/'+sample_id+'/items',
            method: 'post',
            data: {items : data}
        }).always(function (response, status){
            if (status != 'success')
            {
                for (var i = 0; i < data.length; i++) {
                    queues_list.push(data[i]);
                }
                $('#sync_status').html('در تلاش برای ذخیره‌کردن...');
                trySend();
            }
            else
            {
                if (queues_list.length){
                    tryCount = -1;
                    send();
                    $('#sync_status').html('درحال ذخیره‌کردن...');
                } else{
                    requesting = false;
                    $('#sync_status').html('بدون تغییر');
                }
            }
        });
    }

    function trySend(){
        tryCount = Math.min(tryCount + 1, tryTimes.length - 1);
        setTimeout(send, tryTimes[tryCount] * 1000);
    }

    $('[data-nav="information"]').on('pannel:hide', function(){
        $('form', this).trigger('submit');
    });

    function findEmpty(){
        var empty = [];
        var last = null;
        items.each(function(i){
            if($(this).attr('data-answer-type') == 'optional'){
                if(!$(this).attr('data-answer')){
                    if(last === null){
                        last = i + 1;
                    }
                }else{
                    if(last !== null){
                        empty.push([last, i]);
                    }
                    last = null;
                }
            }
        });
        if(last !== null){
            empty.push([last, items.length]);
        }
        empty.forEach(function(e, i){
            if(e[0] == e[1]){
                empty[i] = e[0];
            }else if(e[1] - e[0] == 1){
                empty[i] = e[0] + ' و ' + e[1];
            }else{
                empty[i] = e[0] + ' تا ' + e[1];
            }
            empty[i] = $('<a href="#'+e[0]+'" class="m-1 p-1 dir-rtl text-left inline-block border:gray border border-gray-300"></a>').text(empty[i]);
        });
        $('#nav-empty-answers').html('');
        $('#nav-empty-answers').append(empty);
    }
    findEmpty();

})();
// (function(){
//     var current = 0;
//     var panel = 'description';
//     var answerDesign = new Object();
//     var itemDesign = new Object();
//     var blockEvents = false;
//     var sync = false;
//     var sync_log = [];
//     var skip = false;
//     // var trysts = [0, 1, 2, 3, 4, 5, 10, 15];
//     var trysts = [0, 1, 2];
//     var try_count = 0;
//     function save(item, id)
//     {
//         if (typeof (Storage) !== "undefined") {
//             var data = [];
//             if ((sData = localStorage.getItem(sample_id)))
//             {
//                 data = sData.split(',');
//             }
//             data[item] = id;
//             localStorage.setItem(sample_id, data.join(','));
//         }
//         sync_log.push([item, id]);
//         if(!sync){
//             send();
//         }
//     }

//     function send()
//     {
//         sync = true;
//         var data = sync_log;
//         sync_log = [];
//         $("#sync_status").text('درحال ذخیره سازی...');
//         $.ajax({
//             dataType: "json",
//             url: '/$/' + sample_id + '/items',
//             method: 'post',
//             data: {items : data}
//         }).always(function (response, status){
//             if (status != 'success')
//             {
//                 $('#sync_alert').removeClass('d-none');
//                 $("#sync_status").text('درحال تلاش دوباره...');
//                 for (var i = 0; i < data.length; i++) {
//                     sync_log.push(data[i]);
//                 }
//                 trySend();
//             }
//             else
//             {
//                 $('#sync_alert').addClass('d-none');
//                 try_count = 0;
//                 $("#sync_status").text('ذخیره شده');
//                 if (sync_log.length)
//                 {
//                     send();
//                 }
//                 else
//                 {
//                     sync = false;
//                 }
//             }
//         });
//     }

//     function trySend()
//     {
//         var time = trysts[Math.min(Math.max(0, ++try_count), trysts.length -1)];
//         setTimeout(send, time * 1000);
//     }

//     function display()
//     {
//         if (blockEvents) return;
//         blockEvents = true;
//         var current_panel = null;
//         $('[data-panel]').each(function(){
//             if($(this).css('display') == 'block'){
//                 current_panel = $(this);
//             }
//         });
//         current_panel.trigger('panel:hide', [panel, current, items]);
//         current_panel.fadeOut('fast', function(){
//             if (panel == 'item') {
//                 var item = items[current - 1];
//                 $("#item-section").html('');
//                 itemDesign[item.type](item);
//                 answerDesign[item.answer.type](item);
//             }
//             globalDesign();
//             $('[data-panel=' + panel + ']').trigger('panel:show', [panel, current, items]);
//             $('[data-panel='+panel+']').fadeIn('fast', function(){
//                 if(panel != 'item') {
//                     current = 0;
//                 }
//                 blockEvents = false;
//                 return;
//             });
//         });

//         return;
//     }

//     function next()
//     {
//         var current_view = $('#nav-count option[value=' + (panel == 'item' ? current : panel) + ']');
//         if (current_view.next().val())
//         {
//             location.hash = '#' + current_view.next().val();
//         }
//     }

//     function prev() {
//         var current_view = $('option[value=' + (panel == 'item' ? current : panel) + ']');
//         if (current_view.prev().val()) {
//             location.hash = '#' + current_view.prev().val();
//         }
//     }
//     function globalDesign()
//     {
//         $('#nav-count option').removeAttr('selected');
//         if ($('#nav-count select').is(':disabled'))
//         {
//             $('#nav-count select').removeAttr('disabled');
//         }
//         var current_view = $('#nav-count option[value=' + (panel == 'item' ? current : panel) + ']');
//         current_view.attr('selected', 'selected');
//         var progress = panel == 'item' ? (current * 100) / items.length : 0;

//         $("#progress").css('width', progress + '%').attr('aria-valuenow', progress);

//         if (current_view.prev()[0])
//         {
//             $('#nav-prev').removeClass('disabled').attr('href', '#' + current_view.prev().val());
//         }
//         else
//         {
//             $('#nav-prev').addClass('disabled').removeAttr('href');
//         }

//         if (current_view.next()[0]) {
//             $('#nav-next').removeClass('disabled').attr('href', '#' + current_view.next().val());
//         }
//         else {
//             $('#nav-next').addClass('disabled').removeAttr('href');
//         }
//     }
//     itemDesign.text = function(item){
//         $('[data-panel=item] .card-title').html(item.text);
//     }

//     itemDesign.image_url = function(item){
//         $('[data-panel=item] .card-title').html('');
//             var img;
//             if(typeof item.image_url == 'object'){
//                 img = $(item.image_url).addClass('w-100');
//             }
//             else{
//                 img = $('<img src="'+ item.image_url +'.png" class="w-100"/>');
//             }
//             var secI = $('<div class="w-50 m-auto"></div>');
//             img.appendTo(secI);
//             secI.appendTo($('[data-panel=item] .card-title'));
//     }

//     answerDesign.optional = function(item)
//     {
//         var itemElement = $('#item-section');
//         if(item.type == 'image_url'){
//             $('<div class="row"></div>').appendTo(itemElement);
//         }
//         item.answer.options.forEach(function(option, i){
//             var id = i+1;
//             var template = $('#template div.radio').eq(0).clone();
//             template.addClass(item.answer.tiles == 4 ? 'col-3' : 'col-4');
//             $('input', template).val(id).attr('name', 'options').attr('id', id);
//             if (item.user_answered == id){
//                 $('input', template).attr('checked', 'checked');
//             }
//             $('label', template).attr('for', id);
//             $('label span', template).attr('data-number', id);
//             if(item.answer.type == 'optional_images'){
//                 var img;
//                 if(typeof option == 'object'){
//                     img = $(option).addClass('w-75');
//                 }
//                 else{
//                     img = $('<img src="'+ option +'.png" class="w-75"/>');
//                 }
//                 $('label', template).append(img);
//                 template.appendTo($('div.row', itemElement));
//             }else{
//                 $('label', template).append(option);
//                 template.appendTo(itemElement);
//             }
//         });
//         $('input', itemElement).on('click.answer', function(){
//             if (blockEvents) {
//                 return true;
//             }
//             $('input', itemElement).off('click.answer');
//             $('input', itemElement).off('clicked.answer');
//             answerSelect($(this).val());
//         });
//         $('input', itemElement).on('clicked.answer', function(){
//             $(this).trigger('click.answer');
//         });
//     }
//     answerDesign.optional_images = answerDesign.optional;

//     function firstEmpty(){
//         for (var i = 0; i < items.length; i++) {
//             if (!items[i].user_answered)
//             {
//                 return i;
//             }
//         }
//         return undefined;
//     }

//     function answerSelect(id){
//         id = parseInt(id);
//         items[current - 1].user_answered = id;
//         save(current, id);
//         var input = $('input[value=' + id + ']');
//         var parent = input.parents('div.radio');
//         $('#item-section div.radio').each(function () {
//             if (this != parent[0]) {
//                 $('input', this).attr('disabled', 'disabled');
//                 $(this).fadeTo('fast', .2);
//             }
//         });
//         current = skip ? (firstEmpty() || items.length  ) : current;
//         setTimeout(next, 500);
//     }

//     $(document).on('keyup', function(e){
//         if (blockEvents){
//             return true;
//         }
//         if (e.ctrlKey  || e.shiftKey  || e.altKey || ['Control', 'Shift', 'Alt', 'Meta'].indexOf(e.key) != -1){
//             return true;
//         }

//         if (e.key == 'Enter' || e.key == 'ArrowLeft')
//         {
//             next();
//         } else if (e.key == 'ArrowRight') {
//             prev();
//         }
//         if (/^(Digit|Numpad)\d$/.test(e.code))
//         {
//             var id = e.code.replace(/Digit|Numpad/, '');
//             $('input[value=' + id + ']').trigger('clicked.answer');
//         }
//     });

//     $(window).on('hashchange', function(){
//         if (blockEvents) {
//             return true;
//         }

//         var method = location.hash.replace('#', '');
//         if (!/^\d+$/.test(method)) {
//             var valid_panel = ['description', 'information', 'close'];
//             panel = valid_panel.indexOf(method) != -1 ? method : 'description';
//         }
//         else
//         {
//             panel = 'item';
//             method = parseInt(method);
//             current = Math.min(Math.max(1, method), items.length);
//         }
//         display();
//     });
//     $(document).ready(function () {
//         $('#skip').on('click', function(){
//             if($(this).is(':checked'))
//             {
//                 skip = true;
//             }
//             else
//             {
//                 skip = false;
//             }
//         });
//         var navigation_selection = $('<select class="form-control"></select>');
//         navigation_selection.on('change', function(){
//             if (blockEvents){
//                 return false;
//             }
//             location.hash = '#' + $(this).val();
//             $(this).attr('disabled', 'disabled');
//         });
//         $('<option value="description">توضیحات</option>').appendTo(navigation_selection);
//         if (prerequisite)
//         {
//             $('<option value="information">اطلاعات</option>').appendTo(navigation_selection);
//         }
//         items.forEach(function(item, index) {
//             $('<option value="' + (index + 1) + '">' + (index + 1) + '</option>').appendTo(navigation_selection);
//         });
//         $('<option value="close">پایان</option>').appendTo(navigation_selection);
//         $('#nav-count').append(navigation_selection);

//         $(window).trigger('hashchange');

//         if (typeof (Storage) !== "undefined") {
//             data = [];
//             if ((sData = localStorage.getItem(sample_id))) {
//                 data = sData.split(',');
//             }
//             data.forEach(function(value, index){
//                 if (!items[index].user_answered && value){
//                     items[index].user_answered = value;
//                     sync_log.push([index, value]);
//                 }
//             });
//             if (sync_log.length)
//             {
//                 send();
//             }
//         }
//     });

//     $('#download, #download-close').on('click', function(){
//         var data = [sample_id];
//         for (var i = 0; i < items.length; i++) {
//             data.push(items[i].user_answered || null);
//         }
//         var text = data.join('\n');
//         var information = [];
//         $('input, select, textarea', '[data-panel=information] form').each(function(){
//             information.push($(this).val().replace(',', ''));
//         });
//         text = text.replace(/^([^\n]+)/, "$1," + information.join(','));
//         var fileType = 'plain/text';
//         var fileName = sample_id + '.csv';
//         var blob = new Blob([text], { type: fileType });

//         var a = document.createElement('a');
//         a.download = fileName;
//         a.href = URL.createObjectURL(blob);
//         a.dataset.downloadurl = [fileType, a.download, a.href].join(':');
//         a.style.display = "none";
//         document.body.appendChild(a);
//         a.click();
//         document.body.removeChild(a);
//         setTimeout(function () { URL.revokeObjectURL(a.href); }, 1500);
//             return false;
//         });
//     $('#nav-prev, #nav-next').on('click', function(){
//         if(blockEvents) return false;
//         return true;
//     })
// })();

// $('[data-panel=information] form').on('statio:done', function (event, res) {
//     var _self = this;
//     if (res.is_ok) {
//         $(this).attr('data-on-request', 'false');
//         return;
//     }
//     if (!res.is_ok) {
//         setTimeout(function () {
//             $(_self).trigger('submit');
//         }, 5000);
//     }

// });

// $('[data-panel=information]').on('panel:hide', function(panel, current, items){
//     if ($('form', this).attr('data-on-request') == 'true')
//     {
//         return;
//     }
//     $('form', this).attr('data-on-request', 'true');
//     $('form', this).trigger('submit');
// });
