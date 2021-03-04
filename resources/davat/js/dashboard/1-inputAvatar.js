(function(davat){
    var avatar = function(){
        var _self = this;
        var id = $(this).attr('id');
        var filed_text = $(_self).attr('data-afile-field');
        var filed = $('#'+filed_text);
        $(this).parents('form').on('lijax:data', function(e, data){
            data.set(filed.attr('name'), filed.data('afile-value'));
        });
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
                    update : function(cropData){
                        $('img.afile-img', pannel).croppie('result', {
                            type : 'blob',
                            circle : false
                        }).then(function(blob){
                            blob.arrayBuffer().then(function(result){
                                var file = new File([result], $(_self)[0].files[0].name , {
                                    type: $(_self)[0].files[0].type,
                                  });
                                  filed.data('afile-value', file);
                            });
                        });
                    }
                });
                $('.afile-destroy', pannel).click(function(){
                    $(_self).val('');
                    pannel.fadeOut('fast', function(){
                        $('.croppie-container', pannel).remove();
                        $('.afile-img', pannel).croppie('destroy');
                        $('[data-afile-default]').show();
                        $('#'+$(_self).attr('data-afile-field')).val('');
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
