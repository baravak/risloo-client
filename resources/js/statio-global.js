$(document).on('statio:global:renderResponse', function (event, base, context) {
    base.each(function () {
        statio_each.call(this, event, base, context);
    });
});
