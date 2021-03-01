window.davat = {};
$(document).on('statio:global:renderResponse', function (event, base, context) {
    base.each(function () {

        davat.select2($('.select2-select', base));
        if($(base).has('[data-tabs]').length){
            window.tabs = new Tabby((base.attr('data-xhr') ? '[data-xhr="' + base.attr('data-xhr') + '"] ' : '') + '[data-tabs]');


        }
        $('[data-tabs] a[role=tab]', base).on('click', function(){
            var href = $(this).attr('href').match(/(\#.+)$/);
            if (href[1]) {
                // location.hash = href[1];
                // return false;
                history.pushState(null, null, $(this).attr('href'));

            }
        })
    });
});
