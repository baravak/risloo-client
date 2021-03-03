(function(){
    var target = {
        'centers-index' : function(){
            var myclinic = $('[data-metarget^=centers-myclinic]');
            if(myclinic.length){
                for(var ci = 0; ci < myclinic.length; ci++){
                    var pattern = new RegExp(myclinic.eq(ci).attr('href') + '.*');
                    if((pattern.test(location.href))){
                        return false;
                    }
                }
            }
            return /\/dashboard\/centers.*/.test(location.pathname);
        }
    }
    window.metarget = function(){
        removeTargets();
        $('[data-metarget').each(function(){
            var tg = $(this).attr('data-metarget');
            if($(this).attr('data-metarget-pattern')){
                target[tg] = new RegExp($(this).attr('data-metarget-pattern'));
            }
            if(target[tg] && target[tg].constructor.name == 'RegExp' && target[tg].test(location.pathname)){
                initTarget($(this));
            }else if(typeof(target[tg]) == 'function' && target[tg].call()){
                initTarget($(this));
            }
        });
        if(!$('.metarget').length){
            initTarget($('[data-metarget-default]'));
        }
    }
    function initTarget(target){
        target.addClass(['bg-brand', 'metarget']);
    }
    function removeTargets(){
        $('.metarget, [data-metarget]').removeClass(['bg-brand', 'metarget']);
    }
})();
