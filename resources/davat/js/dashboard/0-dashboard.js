window.davat = {};
$(document).on('statio:global:renderResponse', function (event, base, context) {
    base.each(function () {

        davat.select2($('.select2-select', base));
        try {
            new Tabby('[data-tabs]');
        } catch (error) {

        }
    });
});
