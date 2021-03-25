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
            if(target['centers-myclinics']()){
                return false;
            }
            return /\/dashboard\/centers.*/.test(location.pathname);
        },
        'centers-myclinics' : function(){
            var loc = url.parse(location.href);
            if(loc.get && loc.get.my == 'yes' && loc.path == "/dashboard/centers"){
                return true;
            }
            return false;
        }
    }
    window.metarget = function(){
        removeTargets();
        $('[data-metarget]').each(function(){
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
        target.addClass(['active', 'metarget']);
    }
    function removeTargets(){
        $('.metarget, [data-metarget]').removeClass(['active', 'metarget']);
    }
})();
