$(document).ready(function() {
    $('#aside-open').click(function(event) {
        $('body').toggleClass('aside-open');
    });

    $('#content').click(function(event) {
        if ($('body').hasClass('aside-open'))
        {
            $('body').removeClass('aside-open');
        }
    });

    $('.dropdown').each(function(event) {
        $(this).find('button').click(function(event) {
            $(this).next().toggleClass('show')
        });
    });
});