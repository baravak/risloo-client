$('body').on('statio:dashboard:center:users:edit', function () {
    $("#position").on('change', function(){
        if($(this).val() == 'client'){
            $("#name").parent().fadeIn('fast');
        }else{
            $("#name").parent().fadeOut('fast');
        }
    }).trigger('change');
});
