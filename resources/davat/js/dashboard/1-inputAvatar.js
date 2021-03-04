(function(davat){
    var avatar = function(){
        var _self = this;
        var id = $(this).attr('id');
        $('[data-afile-pannel="'+id+'"]').hide();
        $(this).on('change', function(){
            var reader = new FileReader();
            reader.onload = function(e){
                $('[data-afile-default="'+id+'"]').hide();
                var pannel = $('[data-afile-pannel="'+id+'"]');
                $('<img class="afile-img" />').appendTo(pannel);
                $('.afile-img', pannel).attr('src', e.target.result);
                pannel.fadeIn('fast');
                $('img.afile-img', pannel).croppie({
                    viewport : {
                        width: 250,
                        height: 250,
                        type: 'circle',
                    },
                });
                $('.afile-destroy', pannel).click(function(){
                    $(_self).val('');
                    pannel.fadeOut('fast', function(){
                        $('.croppie-container', pannel).remove();
                        $('.afile-img', pannel).croppie('destroy');
                        $('[data-afile-default]').show();
                    })
                });
            }
            reader.readAsDataURL(this.files[0]);
        });
    }
    davat.avatar = function(element){
        element.each(function(){
            avatar.call(this);
        });
    }
})(window.davat);
