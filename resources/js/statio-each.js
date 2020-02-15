function statio_each(event, base, context){
    $('form[action]', this).not('.direct, [data-direct], [target=_blank], .lijax').each(function () {
        new Lijax(this);
    }).on('jresp', function (e, d) {
        $('.is-invalid', this).removeClass('is-invalid');
        $('.invalid-feedback', this).remove();
        if (d.errors) {
            for (var id in d.errors) {
                $('#' + id).addClass('is-invalid');
                $('<div class="invalid-feedback">' + d.errors[id][0] + '</div>').insertAfter($('#' + id));
            }
        }
    });

    $('[data-form-page=login]').on('jresp', function (event, data) {
        if(data.is_ok)
        {
            document.cookie = 'login_username=' + (data.user.mobile || data.user.username || data.user.email);
            document.cookie = 'login_name=' + data.user.name;
            new Statio({
                context : this,
                url: data.url
            });
        }
    });
}
