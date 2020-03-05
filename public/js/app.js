$(document).ready(function () {
    $(document).trigger('statio:global:renderResponse', [$(document)]);
});

function statio_each(event, base, context){
    $('.user-types [name=type]', this).on('change', function(){
        if ($(this).val() == 'psychologist')
        {
            $('#position').attr('disabled', 'disable').parents('.form-group').addClass('d-none');
            $('#psychologist-position').removeAttr('disabled').parents('.form-group').removeClass('d-none');
        }
        else if ($('#position').attr('disabled'))
        {
            $('#position').removeAttr('disabled').parents('.form-group').removeClass('d-none');
            $('#psychologist-position').attr('disabled', 'disabled').parents('.form-group').addClass('d-none');
        }
    });
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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImFwcC5qcyIsInN0YXRpby1lYWNoLmpzIiwic3RhdGlvLWdsb2JhbC5qcyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQTtBQUNBO0FBQ0E7QUFDQTtBQ0hBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUN2REE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBIiwiZmlsZSI6ImFwcC5qcyIsInNvdXJjZXNDb250ZW50IjpbIiQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uICgpIHtcbiAgICAkKGRvY3VtZW50KS50cmlnZ2VyKCdzdGF0aW86Z2xvYmFsOnJlbmRlclJlc3BvbnNlJywgWyQoZG9jdW1lbnQpXSk7XG59KTtcbiIsImZ1bmN0aW9uIHN0YXRpb19lYWNoKGV2ZW50LCBiYXNlLCBjb250ZXh0KXtcbiAgICAkKCcudXNlci10eXBlcyBbbmFtZT10eXBlXScsIHRoaXMpLm9uKCdjaGFuZ2UnLCBmdW5jdGlvbigpe1xuICAgICAgICBpZiAoJCh0aGlzKS52YWwoKSA9PSAncHN5Y2hvbG9naXN0JylcbiAgICAgICAge1xuICAgICAgICAgICAgJCgnI3Bvc2l0aW9uJykuYXR0cignZGlzYWJsZWQnLCAnZGlzYWJsZScpLnBhcmVudHMoJy5mb3JtLWdyb3VwJykuYWRkQ2xhc3MoJ2Qtbm9uZScpO1xuICAgICAgICAgICAgJCgnI3BzeWNob2xvZ2lzdC1wb3NpdGlvbicpLnJlbW92ZUF0dHIoJ2Rpc2FibGVkJykucGFyZW50cygnLmZvcm0tZ3JvdXAnKS5yZW1vdmVDbGFzcygnZC1ub25lJyk7XG4gICAgICAgIH1cbiAgICAgICAgZWxzZSBpZiAoJCgnI3Bvc2l0aW9uJykuYXR0cignZGlzYWJsZWQnKSlcbiAgICAgICAge1xuICAgICAgICAgICAgJCgnI3Bvc2l0aW9uJykucmVtb3ZlQXR0cignZGlzYWJsZWQnKS5wYXJlbnRzKCcuZm9ybS1ncm91cCcpLnJlbW92ZUNsYXNzKCdkLW5vbmUnKTtcbiAgICAgICAgICAgICQoJyNwc3ljaG9sb2dpc3QtcG9zaXRpb24nKS5hdHRyKCdkaXNhYmxlZCcsICdkaXNhYmxlZCcpLnBhcmVudHMoJy5mb3JtLWdyb3VwJykuYWRkQ2xhc3MoJ2Qtbm9uZScpO1xuICAgICAgICB9XG4gICAgfSk7XG4gICAgJCgnW2RhdGEtTGlqYXhdLCAubGlqYXgnLCB0aGlzKS5lYWNoKGZ1bmN0aW9uICgpIHtcbiAgICAgICAgbmV3IExpamF4KHRoaXMpO1xuICAgIH0pO1xuICAgICQoXCJhXCIsIHRoaXMpLm5vdCgnLmRpcmVjdCwgW2RhdGEtZGlyZWN0XSwgW3RhcmdldD1fYmxhbmtdLCAubGlqYXgsIFtkYXRhLWxpamF4XScpLm9uKCdjbGljaycsIGZ1bmN0aW9uICgpIHtcbiAgICAgICAgbmV3IFN0YXRpbyh7XG4gICAgICAgICAgICB1cmw6ICQodGhpcykuYXR0cignaHJlZicpLFxuICAgICAgICAgICAgdHlwZTogJCh0aGlzKS5pcygnLmFjdGlvbicpID8gJ3JlbmRlcicgOiAnYm90aCcsXG4gICAgICAgICAgICBjb250ZXh0OiAkKHRoaXMpLFxuICAgICAgICAgICAgZ2xvYmFsczoge1xuICAgICAgICAgICAgICAgIGNhcnQ6IGZ1bmN0aW9uIChjYXJ0KSB7XG4gICAgICAgICAgICAgICAgICAgICQoJy5jYXJ0LWJhZGdlLXBhY2thZ2VzLWNvdW50JykuaHRtbChjYXJ0Lmludm9pY2UucHJvZHVjdHMpO1xuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgIH1cbiAgICAgICAgfSk7XG4gICAgICAgIHJldHVybiBmYWxzZTtcbiAgICB9KTtcblxuICAgICQoJ2Zvcm1bYWN0aW9uXScsIHRoaXMpLm5vdCgnLmRpcmVjdCwgW2RhdGEtZGlyZWN0XSwgW3RhcmdldD1fYmxhbmtdLCAubGlqYXgnKS5lYWNoKGZ1bmN0aW9uICgpIHtcbiAgICAgICAgbmV3IExpamF4KHRoaXMpO1xuICAgIH0pLm9uKCdqcmVzcCcsIGZ1bmN0aW9uIChlLCBkKSB7XG4gICAgICAgICQoJy5pcy1pbnZhbGlkJywgdGhpcykucmVtb3ZlQ2xhc3MoJ2lzLWludmFsaWQnKTtcbiAgICAgICAgJCgnLmludmFsaWQtZmVlZGJhY2snLCB0aGlzKS5yZW1vdmUoKTtcbiAgICAgICAgaWYgKGQuZXJyb3JzKSB7XG4gICAgICAgICAgICBmb3IgKHZhciBpZCBpbiBkLmVycm9ycykge1xuICAgICAgICAgICAgICAgICQoJyMnICsgaWQgKyAnLCBbZGF0YS1hbGlhc349JyArIGlkICsgJ10nKS5hZGRDbGFzcygnaXMtaW52YWxpZCcpO1xuICAgICAgICAgICAgICAgICQoJzxkaXYgY2xhc3M9XCJpbnZhbGlkLWZlZWRiYWNrXCI+JyArIGQuZXJyb3JzW2lkXVswXSArICc8L2Rpdj4nKS5pbnNlcnRBZnRlcigkKCcjJyArIGlkICsgJywgW2RhdGEtYWxpYXN+PScgKyBpZCArICddJykpO1xuICAgICAgICAgICAgfVxuICAgICAgICB9XG4gICAgfSk7XG5cbiAgICAkKCdbZGF0YS1mb3JtLXBhZ2U9bG9naW5dJykub24oJ2pyZXNwJywgZnVuY3Rpb24gKGV2ZW50LCBkYXRhKSB7XG4gICAgICAgIGlmKGRhdGEuaXNfb2spXG4gICAgICAgIHtcbiAgICAgICAgICAgIGRvY3VtZW50LmNvb2tpZSA9ICdsb2dpbl91c2VybmFtZT0nICsgKGRhdGEudXNlci5tb2JpbGUgfHwgZGF0YS51c2VyLnVzZXJuYW1lIHx8IGRhdGEudXNlci5lbWFpbCk7XG4gICAgICAgICAgICBkb2N1bWVudC5jb29raWUgPSAnbG9naW5fbmFtZT0nICsgZGF0YS51c2VyLm5hbWU7XG4gICAgICAgICAgICBuZXcgU3RhdGlvKHtcbiAgICAgICAgICAgICAgICBjb250ZXh0IDogdGhpcyxcbiAgICAgICAgICAgICAgICB1cmw6IGRhdGEudXJsXG4gICAgICAgICAgICB9KTtcbiAgICAgICAgfVxuICAgIH0pO1xufVxuIiwiJChkb2N1bWVudCkub24oJ3N0YXRpbzpnbG9iYWw6cmVuZGVyUmVzcG9uc2UnLCBmdW5jdGlvbiAoZXZlbnQsIGJhc2UsIGNvbnRleHQpIHtcbiAgICBiYXNlLmVhY2goZnVuY3Rpb24gKCkge1xuICAgICAgICBzdGF0aW9fZWFjaC5jYWxsKHRoaXMsIGV2ZW50LCBiYXNlLCBjb250ZXh0KTtcbiAgICB9KTtcbn0pO1xuIl19
