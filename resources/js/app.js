$.ajaxSetup(
    {
        headers:
        {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        }
    }
);
$(document).ready(function () {
    $(document).trigger('statio:global:renderResponse', [$(document)]);
});
