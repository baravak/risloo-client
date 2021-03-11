;(function(davat){
    function dropdown(){
        var _self = this;
        $(document).on('click', function(e){
            if(e.target != $('.dropdown-toggle', this)[0] && $(e.target).parents('.dropdown-toggle')[0] != $('.dropdown-toggle', this)[0]){
                $('button + div.dropdown-open', _self).fadeOut('fast').removeClass('dropdown-open');
            }
        });
        $('.dropdown-toggle', this).on('click', function(){
            if(!$('button + div', _self).is('.dropdown-open')){
                $('button + div', _self).fadeIn('fast').addClass('dropdown-open');
            }else{
                $('button + div.dropdown-open', _self).fadeOut('fast').removeClass('dropdown-open');
            }
        });
    }
    davat.dropdown = function(e){
        e.each(function(){
            dropdown.call(this);
        });
    }
})(davat);
