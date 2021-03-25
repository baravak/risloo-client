(function(davat){
    var xhr = undefined;
    var timeout = null;
    var samplsta = function(){
        if(xhr) return;
        send();
    }
    var send = function(){
        var samples = [];
        $('[data-samplsta]').each(function(){
            samples.push($(this).attr('data-samplsta'));
        });
        if(! samples.length){
            xhr = undefined;
            return;
        }
        xhr = true;
        new Statio({
            type : 'render',
            url : '/dashboard/live/samples-status-check',
            ajax : {
                data : {samples : samples},
                complete : function(){
                    if(timeout) clearTimeout(timeout);
                    timeout = setTimeout(send, 5000);
                }
            }
        });
    }
    davat.samplsta = function(element){
        samplsta.call();
    }
    davat.samplsta.profileShow = function(serial){

    }
})(window.davat);
