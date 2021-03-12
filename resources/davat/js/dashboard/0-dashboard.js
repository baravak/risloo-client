window.davat = {};
$(document).on('statio:global:renderResponse', function (event, base, context) {
    metarget();
    base.each(function () {
        davat.select2($('.select2-select', base));
        davat.avatar($('.input-avatar', base));
        davat.dropdown($('.dropdown', base));
        sampleChain($('[data-chain]', base));
        $('.magnific-popup', base).magnificPopup({
            type:'image',
            zoom: {
                enabled: true
            }
        });
        davat.samplsta();
        if($(base).has('[data-tabs]').length){
            window.tabs = new Tabby((base.attr('data-xhr') ? '[data-xhr="' + base.attr('data-xhr') + '"] ' : '') + '[data-tabs]');
        }
        $('[data-tabs] a[role=tab]', base).on('click', function(){
            var href = $(this).attr('href').match(/(\#.+)$/);
            if (href[1]) {
                history.pushState(null, null, $(this).attr('href'));

            }
        })
    });
});
