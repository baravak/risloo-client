$(document).on('tabby', function(e){
    $(e.detail.previousContent).trigger('tabby.hide');
    $(e.detail.content).trigger('tabby.show');
});
