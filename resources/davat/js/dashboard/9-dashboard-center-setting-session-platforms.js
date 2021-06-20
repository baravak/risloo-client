$('body').on('statio:dashboard:center:setting:session:platforms statio:dashboard:room:setting:session:platforms statio:dashboard:room:schedules:create statio:dashboard:sessions:edit', function () {
    $(".platform-available-input").on('change', function(){
        if($(this).is(':checked')){
            $('.platform-detail', $(this).parents('.platform-card')).removeClass('opacity-40');
        }else{
            $('.platform-detail', $(this).parents('.platform-card')).addClass('opacity-40');
        }
    });
    $('.platform-pin-input').on('change', function(){
        if($(this).is(':checked')){
            $('[name^=identifier]', $(this).parents('.platform-card')).attr('disabled', 'disabled').addClass('opacity-60');
        }else{
            $('[name^=identifier]', $(this).parents('.platform-card')).removeAttr('disabled').removeClass('opacity-60');
        }
    });
});
