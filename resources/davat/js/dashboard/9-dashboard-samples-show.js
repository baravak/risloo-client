(function(){
    var timeout = undefined;
    var xhr = undefined;
    $('body').on('statio:dashboard:samples:show', function () {
        var check = function(){
            var _self = this;
            if($('#' + $(this).attr('id')).length == 0) return;
            var status = $(this).attr('data-status');
            if(['scoring', 'creating_files'].indexOf(status)  == -1) return;
            xhr = new Statio({
                type : 'render',
                url : '/dashboard/samples/'+ $(this).attr('data-sample') +'/scoring',
                ajax : {
                    complete : function(xhr){
                        if(timeout) clearTimeout(timeout);
                       if(xhr.responseJSON && !xhr.responseJSON.redirect){
                           timeout = setTimeout(check.bind(_self), 3000);
                       }
                    }
                }
            });
        }
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
        check.call($('#sample-show', this)[0])

    }).on('statio:dashboard:samples:show:onunload', function () {
        try{
            xhr.ajax.abort();
        }catch(e){}
    });
})();
