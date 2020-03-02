$.ajaxSetup(
    {
        headers:
        {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        }
    }
);
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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImFwcC5qcyIsInN0YXRpby1lYWNoLmpzIiwic3RhdGlvLWdsb2JhbC5qcyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUNYQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDM0NBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSIsImZpbGUiOiJhcHAuanMiLCJzb3VyY2VzQ29udGVudCI6WyIkLmFqYXhTZXR1cChcbiAgICB7XG4gICAgICAgIGhlYWRlcnM6XG4gICAgICAgIHtcbiAgICAgICAgICAgICdYLUNTUkYtVG9rZW4nOiAkKCdtZXRhW25hbWU9XCJjc3JmLXRva2VuXCJdJykuYXR0cignY29udGVudCcpXG4gICAgICAgIH1cbiAgICB9XG4pO1xuJChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24gKCkge1xuICAgICQoZG9jdW1lbnQpLnRyaWdnZXIoJ3N0YXRpbzpnbG9iYWw6cmVuZGVyUmVzcG9uc2UnLCBbJChkb2N1bWVudCldKTtcbn0pO1xuIiwiZnVuY3Rpb24gc3RhdGlvX2VhY2goZXZlbnQsIGJhc2UsIGNvbnRleHQpe1xuICAgICQoJ1tkYXRhLUxpamF4XSwgLmxpamF4JywgdGhpcykuZWFjaChmdW5jdGlvbiAoKSB7XG4gICAgICAgIG5ldyBMaWpheCh0aGlzKTtcbiAgICB9KTtcbiAgICAkKFwiYVwiLCB0aGlzKS5ub3QoJy5kaXJlY3QsIFtkYXRhLWRpcmVjdF0sIFt0YXJnZXQ9X2JsYW5rXSwgLmxpamF4LCBbZGF0YS1saWpheF0nKS5vbignY2xpY2snLCBmdW5jdGlvbiAoKSB7XG4gICAgICAgIG5ldyBTdGF0aW8oe1xuICAgICAgICAgICAgdXJsOiAkKHRoaXMpLmF0dHIoJ2hyZWYnKSxcbiAgICAgICAgICAgIHR5cGU6ICQodGhpcykuaXMoJy5hY3Rpb24nKSA/ICdyZW5kZXInIDogJ2JvdGgnLFxuICAgICAgICAgICAgY29udGV4dDogJCh0aGlzKSxcbiAgICAgICAgICAgIGdsb2JhbHM6IHtcbiAgICAgICAgICAgICAgICBjYXJ0OiBmdW5jdGlvbiAoY2FydCkge1xuICAgICAgICAgICAgICAgICAgICAkKCcuY2FydC1iYWRnZS1wYWNrYWdlcy1jb3VudCcpLmh0bWwoY2FydC5pbnZvaWNlLnByb2R1Y3RzKTtcbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICB9XG4gICAgICAgIH0pO1xuICAgICAgICByZXR1cm4gZmFsc2U7XG4gICAgfSk7XG5cbiAgICAkKCdmb3JtW2FjdGlvbl0nLCB0aGlzKS5ub3QoJy5kaXJlY3QsIFtkYXRhLWRpcmVjdF0sIFt0YXJnZXQ9X2JsYW5rXSwgLmxpamF4JykuZWFjaChmdW5jdGlvbiAoKSB7XG4gICAgICAgIG5ldyBMaWpheCh0aGlzKTtcbiAgICB9KS5vbignanJlc3AnLCBmdW5jdGlvbiAoZSwgZCkge1xuICAgICAgICAkKCcuaXMtaW52YWxpZCcsIHRoaXMpLnJlbW92ZUNsYXNzKCdpcy1pbnZhbGlkJyk7XG4gICAgICAgICQoJy5pbnZhbGlkLWZlZWRiYWNrJywgdGhpcykucmVtb3ZlKCk7XG4gICAgICAgIGlmIChkLmVycm9ycykge1xuICAgICAgICAgICAgZm9yICh2YXIgaWQgaW4gZC5lcnJvcnMpIHtcbiAgICAgICAgICAgICAgICAkKCcjJyArIGlkICsgJywgW2RhdGEtYWxpYXN+PScgKyBpZCArICddJykuYWRkQ2xhc3MoJ2lzLWludmFsaWQnKTtcbiAgICAgICAgICAgICAgICAkKCc8ZGl2IGNsYXNzPVwiaW52YWxpZC1mZWVkYmFja1wiPicgKyBkLmVycm9yc1tpZF1bMF0gKyAnPC9kaXY+JykuaW5zZXJ0QWZ0ZXIoJCgnIycgKyBpZCArICcsIFtkYXRhLWFsaWFzfj0nICsgaWQgKyAnXScpKTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgfVxuICAgIH0pO1xuXG4gICAgJCgnW2RhdGEtZm9ybS1wYWdlPWxvZ2luXScpLm9uKCdqcmVzcCcsIGZ1bmN0aW9uIChldmVudCwgZGF0YSkge1xuICAgICAgICBpZihkYXRhLmlzX29rKVxuICAgICAgICB7XG4gICAgICAgICAgICBkb2N1bWVudC5jb29raWUgPSAnbG9naW5fdXNlcm5hbWU9JyArIChkYXRhLnVzZXIubW9iaWxlIHx8IGRhdGEudXNlci51c2VybmFtZSB8fCBkYXRhLnVzZXIuZW1haWwpO1xuICAgICAgICAgICAgZG9jdW1lbnQuY29va2llID0gJ2xvZ2luX25hbWU9JyArIGRhdGEudXNlci5uYW1lO1xuICAgICAgICAgICAgbmV3IFN0YXRpbyh7XG4gICAgICAgICAgICAgICAgY29udGV4dCA6IHRoaXMsXG4gICAgICAgICAgICAgICAgdXJsOiBkYXRhLnVybFxuICAgICAgICAgICAgfSk7XG4gICAgICAgIH1cbiAgICB9KTtcbn1cbiIsIiQoZG9jdW1lbnQpLm9uKCdzdGF0aW86Z2xvYmFsOnJlbmRlclJlc3BvbnNlJywgZnVuY3Rpb24gKGV2ZW50LCBiYXNlLCBjb250ZXh0KSB7XG4gICAgYmFzZS5lYWNoKGZ1bmN0aW9uICgpIHtcbiAgICAgICAgc3RhdGlvX2VhY2guY2FsbCh0aGlzLCBldmVudCwgYmFzZSwgY29udGV4dCk7XG4gICAgfSk7XG59KTtcbiJdfQ==
