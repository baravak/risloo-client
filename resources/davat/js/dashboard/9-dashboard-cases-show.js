$('body').on('statio:dashboard:cases:show', function () {
    $('.sample-record').hover(function(){
        $('[data-xhr="client-'+ $(this).attr('data-client') +'"], [data-xhr="session-'+ $(this).attr('data-session') +'"]').addClass('bg-gray-50');
    }, function(){
        $('[data-xhr="client-'+ $(this).attr('data-client') +'"], [data-xhr="session-'+ $(this).attr('data-session') +'"]').removeClass('bg-gray-50');
    });

    $('.client-record').hover(function(){
        $('[data-client="'+ $(this).attr('data-id') +'"]').addClass('bg-gray-50');
    }, function(){
        $('[data-client="'+ $(this).attr('data-id') +'"]').removeClass('bg-gray-50');
    });
});
