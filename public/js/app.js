$(document).ready(function () {
    $(document).trigger('statio:global:renderResponse', [$(document)]);
});

function statio_each(event, base, context){
    $('[data-Lijax], .lijax', this).each(function () {
        new Lijax(this);
    });
    $("a", this).not('.direct, [data-direct], [target=_blank], .lijax, [data-lijax]').on('click', function () {
        new Statio({
            url: $(this).attr('href'),
            type: $(this).is('.action') ? 'render' : 'both',
            context: $(this),
            globals: {
                cart: function (cart) {
                    $('.cart-badge-packages-count').html(cart.invoice.products);
                }
            }
        });
        return false;
    });

    $('form[action]', this).not('.direct, [data-direct], [target=_blank], .lijax').each(function () {
        new Lijax(this);
    }).on('jresp', function (e, d) {
        $('.is-invalid', this).removeClass('is-invalid');
        $('.invalid-feedback', this).remove();
        if (d.errors) {
            for (var id in d.errors) {
                $('#' + id + ', [data-alias~=' + id + ']').addClass('is-invalid');
                $('<div class="invalid-feedback">' + d.errors[id][0] + '</div>').insertAfter($('#' + id + ', [data-alias~=' + id + ']'));
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

$(document).on('statio:global:renderResponse', function (event, base, context) {
    base.each(function () {
        statio_each.call(this, event, base, context);
    });
});
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImFwcC5qcyIsInN0YXRpby1lYWNoLmpzIiwic3RhdGlvLWdsb2JhbC5qcyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQTtBQUNBO0FBQ0E7QUFDQTtBQ0hBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUMzQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBIiwiZmlsZSI6ImFwcC5qcyIsInNvdXJjZXNDb250ZW50IjpbIiQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uICgpIHtcbiAgICAkKGRvY3VtZW50KS50cmlnZ2VyKCdzdGF0aW86Z2xvYmFsOnJlbmRlclJlc3BvbnNlJywgWyQoZG9jdW1lbnQpXSk7XG59KTtcbiIsImZ1bmN0aW9uIHN0YXRpb19lYWNoKGV2ZW50LCBiYXNlLCBjb250ZXh0KXtcbiAgICAkKCdbZGF0YS1MaWpheF0sIC5saWpheCcsIHRoaXMpLmVhY2goZnVuY3Rpb24gKCkge1xuICAgICAgICBuZXcgTGlqYXgodGhpcyk7XG4gICAgfSk7XG4gICAgJChcImFcIiwgdGhpcykubm90KCcuZGlyZWN0LCBbZGF0YS1kaXJlY3RdLCBbdGFyZ2V0PV9ibGFua10sIC5saWpheCwgW2RhdGEtbGlqYXhdJykub24oJ2NsaWNrJywgZnVuY3Rpb24gKCkge1xuICAgICAgICBuZXcgU3RhdGlvKHtcbiAgICAgICAgICAgIHVybDogJCh0aGlzKS5hdHRyKCdocmVmJyksXG4gICAgICAgICAgICB0eXBlOiAkKHRoaXMpLmlzKCcuYWN0aW9uJykgPyAncmVuZGVyJyA6ICdib3RoJyxcbiAgICAgICAgICAgIGNvbnRleHQ6ICQodGhpcyksXG4gICAgICAgICAgICBnbG9iYWxzOiB7XG4gICAgICAgICAgICAgICAgY2FydDogZnVuY3Rpb24gKGNhcnQpIHtcbiAgICAgICAgICAgICAgICAgICAgJCgnLmNhcnQtYmFkZ2UtcGFja2FnZXMtY291bnQnKS5odG1sKGNhcnQuaW52b2ljZS5wcm9kdWN0cyk7XG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgfVxuICAgICAgICB9KTtcbiAgICAgICAgcmV0dXJuIGZhbHNlO1xuICAgIH0pO1xuXG4gICAgJCgnZm9ybVthY3Rpb25dJywgdGhpcykubm90KCcuZGlyZWN0LCBbZGF0YS1kaXJlY3RdLCBbdGFyZ2V0PV9ibGFua10sIC5saWpheCcpLmVhY2goZnVuY3Rpb24gKCkge1xuICAgICAgICBuZXcgTGlqYXgodGhpcyk7XG4gICAgfSkub24oJ2pyZXNwJywgZnVuY3Rpb24gKGUsIGQpIHtcbiAgICAgICAgJCgnLmlzLWludmFsaWQnLCB0aGlzKS5yZW1vdmVDbGFzcygnaXMtaW52YWxpZCcpO1xuICAgICAgICAkKCcuaW52YWxpZC1mZWVkYmFjaycsIHRoaXMpLnJlbW92ZSgpO1xuICAgICAgICBpZiAoZC5lcnJvcnMpIHtcbiAgICAgICAgICAgIGZvciAodmFyIGlkIGluIGQuZXJyb3JzKSB7XG4gICAgICAgICAgICAgICAgJCgnIycgKyBpZCArICcsIFtkYXRhLWFsaWFzfj0nICsgaWQgKyAnXScpLmFkZENsYXNzKCdpcy1pbnZhbGlkJyk7XG4gICAgICAgICAgICAgICAgJCgnPGRpdiBjbGFzcz1cImludmFsaWQtZmVlZGJhY2tcIj4nICsgZC5lcnJvcnNbaWRdWzBdICsgJzwvZGl2PicpLmluc2VydEFmdGVyKCQoJyMnICsgaWQgKyAnLCBbZGF0YS1hbGlhc349JyArIGlkICsgJ10nKSk7XG4gICAgICAgICAgICB9XG4gICAgICAgIH1cbiAgICB9KTtcblxuICAgICQoJ1tkYXRhLWZvcm0tcGFnZT1sb2dpbl0nKS5vbignanJlc3AnLCBmdW5jdGlvbiAoZXZlbnQsIGRhdGEpIHtcbiAgICAgICAgaWYoZGF0YS5pc19vaylcbiAgICAgICAge1xuICAgICAgICAgICAgZG9jdW1lbnQuY29va2llID0gJ2xvZ2luX3VzZXJuYW1lPScgKyAoZGF0YS51c2VyLm1vYmlsZSB8fCBkYXRhLnVzZXIudXNlcm5hbWUgfHwgZGF0YS51c2VyLmVtYWlsKTtcbiAgICAgICAgICAgIGRvY3VtZW50LmNvb2tpZSA9ICdsb2dpbl9uYW1lPScgKyBkYXRhLnVzZXIubmFtZTtcbiAgICAgICAgICAgIG5ldyBTdGF0aW8oe1xuICAgICAgICAgICAgICAgIGNvbnRleHQgOiB0aGlzLFxuICAgICAgICAgICAgICAgIHVybDogZGF0YS51cmxcbiAgICAgICAgICAgIH0pO1xuICAgICAgICB9XG4gICAgfSk7XG59XG4iLCIkKGRvY3VtZW50KS5vbignc3RhdGlvOmdsb2JhbDpyZW5kZXJSZXNwb25zZScsIGZ1bmN0aW9uIChldmVudCwgYmFzZSwgY29udGV4dCkge1xuICAgIGJhc2UuZWFjaChmdW5jdGlvbiAoKSB7XG4gICAgICAgIHN0YXRpb19lYWNoLmNhbGwodGhpcywgZXZlbnQsIGJhc2UsIGNvbnRleHQpO1xuICAgIH0pO1xufSk7XG4iXX0=
