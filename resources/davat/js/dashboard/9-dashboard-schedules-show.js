$('body').on('statio:dashboard:schedules:show', function () {
    $('#case_id').on('change', function(){
        var case_id = $(this).val();
        if(case_id){
            $('#problem-element').fadeOut('fast');
        }else{
            $('#problem-element').fadeIn('fast');
        }
    }).trigger('change');
});
