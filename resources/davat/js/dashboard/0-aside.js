;$(document).ready(function() {
    $('body', document).on('click' ,function(e){
        if(!$(e.target).parents('#aside-open, #aside').length && !$(e.target).is('#aside-open, #aside') && $('body').hasClass('aside-open')){
            $('body').removeClass('aside-open');
        }
    });
    $('#aside-open').click(function(event) {
        $('body').toggleClass('aside-open');
    });
});
