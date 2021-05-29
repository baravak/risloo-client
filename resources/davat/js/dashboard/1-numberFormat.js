;(function(){
    davat.numberFormat = function(elemetns){
        $(elemetns).each(function(){
            $(this).on('change keyup', function(){
                $('#' + $(this).attr('data-numberformat')).text($(this).val() ? $(this).val().replace(/\B(?=(\d{3})+(?!\d))/g, ",") : '0');
            });
        });
        elemetns.trigger('change');
    }
})(davat);
