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

$(document).on('statio:global:renderResponse', function (event, base, context) {
    base.each(function () {
        statio_each.call(this, event, base, context);
    });
});

// module.exports = function (event, base, context) {
//     $('.kt-avatar', this).each(function () {
//         new KTAvatar(this);
//     });

//     $('[data-Lijax], .lijax', this).each(function () {
//         new Lijax(this);
//     });
//     $("a", this).not('.direct, [data-direct], [target=_blank], .lijax, [data-lijax]').on('click', function () {
//         new Statio({
//             url: $(this).attr('href'),
//             type: $(this).is('.action') ? 'render' : 'both',
//             context: $(this),
//             globals: {
//                 cart: function (cart) {
//                     $('.cart-badge-packages-count').html(cart.invoice.products);
//                 }
//             }
//         });
//         return false;
//     });

//     $('form[action]', this).not('.direct, [data-direct], [target=_blank], .lijax').each(function () {
//         new Lijax(this);
//     }).on('jresp', function (e, d) {
//         if (d.errors) {
//             $('.is-invalid', this).removeClass('is-invalid');
//             $('.invalid-feedback', this).remove();
//             for (var id in d.errors) {
//                 $('#' + id).addClass('is-invalid');
//                 $('<div class="invalid-feedback">' + d.errors[id][0] + '</div>').insertAfter($('#' + id).next());
//             }
//         }
//     });
// }
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImFwcC5qcyIsInN0YXRpby1lYWNoLmpzIiwic3RhdGlvLWdsb2JhbC5qcyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUNYQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUMxQkE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBIiwiZmlsZSI6ImFwcC5qcyIsInNvdXJjZXNDb250ZW50IjpbIiQuYWpheFNldHVwKFxuICAgIHtcbiAgICAgICAgaGVhZGVyczpcbiAgICAgICAge1xuICAgICAgICAgICAgJ1gtQ1NSRi1Ub2tlbic6ICQoJ21ldGFbbmFtZT1cImNzcmYtdG9rZW5cIl0nKS5hdHRyKCdjb250ZW50JylcbiAgICAgICAgfVxuICAgIH1cbik7XG4kKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbiAoKSB7XG4gICAgJChkb2N1bWVudCkudHJpZ2dlcignc3RhdGlvOmdsb2JhbDpyZW5kZXJSZXNwb25zZScsIFskKGRvY3VtZW50KV0pO1xufSk7XG4iLCJmdW5jdGlvbiBzdGF0aW9fZWFjaChldmVudCwgYmFzZSwgY29udGV4dCl7XG4gICAgJCgnZm9ybVthY3Rpb25dJywgdGhpcykubm90KCcuZGlyZWN0LCBbZGF0YS1kaXJlY3RdLCBbdGFyZ2V0PV9ibGFua10sIC5saWpheCcpLmVhY2goZnVuY3Rpb24gKCkge1xuICAgICAgICBuZXcgTGlqYXgodGhpcyk7XG4gICAgfSkub24oJ2pyZXNwJywgZnVuY3Rpb24gKGUsIGQpIHtcbiAgICAgICAgJCgnLmlzLWludmFsaWQnLCB0aGlzKS5yZW1vdmVDbGFzcygnaXMtaW52YWxpZCcpO1xuICAgICAgICAkKCcuaW52YWxpZC1mZWVkYmFjaycsIHRoaXMpLnJlbW92ZSgpO1xuICAgICAgICBpZiAoZC5lcnJvcnMpIHtcbiAgICAgICAgICAgIGZvciAodmFyIGlkIGluIGQuZXJyb3JzKSB7XG4gICAgICAgICAgICAgICAgJCgnIycgKyBpZCkuYWRkQ2xhc3MoJ2lzLWludmFsaWQnKTtcbiAgICAgICAgICAgICAgICAkKCc8ZGl2IGNsYXNzPVwiaW52YWxpZC1mZWVkYmFja1wiPicgKyBkLmVycm9yc1tpZF1bMF0gKyAnPC9kaXY+JykuaW5zZXJ0QWZ0ZXIoJCgnIycgKyBpZCkpO1xuICAgICAgICAgICAgfVxuICAgICAgICB9XG4gICAgfSk7XG5cbiAgICAkKCdbZGF0YS1mb3JtLXBhZ2U9bG9naW5dJykub24oJ2pyZXNwJywgZnVuY3Rpb24gKGV2ZW50LCBkYXRhKSB7XG4gICAgICAgIGlmKGRhdGEuaXNfb2spXG4gICAgICAgIHtcbiAgICAgICAgICAgIGRvY3VtZW50LmNvb2tpZSA9ICdsb2dpbl91c2VybmFtZT0nICsgKGRhdGEudXNlci5tb2JpbGUgfHwgZGF0YS51c2VyLnVzZXJuYW1lIHx8IGRhdGEudXNlci5lbWFpbCk7XG4gICAgICAgICAgICBkb2N1bWVudC5jb29raWUgPSAnbG9naW5fbmFtZT0nICsgZGF0YS51c2VyLm5hbWU7XG4gICAgICAgICAgICBuZXcgU3RhdGlvKHtcbiAgICAgICAgICAgICAgICBjb250ZXh0IDogdGhpcyxcbiAgICAgICAgICAgICAgICB1cmw6IGRhdGEudXJsXG4gICAgICAgICAgICB9KTtcbiAgICAgICAgfVxuICAgIH0pO1xufVxuIiwiJChkb2N1bWVudCkub24oJ3N0YXRpbzpnbG9iYWw6cmVuZGVyUmVzcG9uc2UnLCBmdW5jdGlvbiAoZXZlbnQsIGJhc2UsIGNvbnRleHQpIHtcbiAgICBiYXNlLmVhY2goZnVuY3Rpb24gKCkge1xuICAgICAgICBzdGF0aW9fZWFjaC5jYWxsKHRoaXMsIGV2ZW50LCBiYXNlLCBjb250ZXh0KTtcbiAgICB9KTtcbn0pO1xuXG4vLyBtb2R1bGUuZXhwb3J0cyA9IGZ1bmN0aW9uIChldmVudCwgYmFzZSwgY29udGV4dCkge1xuLy8gICAgICQoJy5rdC1hdmF0YXInLCB0aGlzKS5lYWNoKGZ1bmN0aW9uICgpIHtcbi8vICAgICAgICAgbmV3IEtUQXZhdGFyKHRoaXMpO1xuLy8gICAgIH0pO1xuXG4vLyAgICAgJCgnW2RhdGEtTGlqYXhdLCAubGlqYXgnLCB0aGlzKS5lYWNoKGZ1bmN0aW9uICgpIHtcbi8vICAgICAgICAgbmV3IExpamF4KHRoaXMpO1xuLy8gICAgIH0pO1xuLy8gICAgICQoXCJhXCIsIHRoaXMpLm5vdCgnLmRpcmVjdCwgW2RhdGEtZGlyZWN0XSwgW3RhcmdldD1fYmxhbmtdLCAubGlqYXgsIFtkYXRhLWxpamF4XScpLm9uKCdjbGljaycsIGZ1bmN0aW9uICgpIHtcbi8vICAgICAgICAgbmV3IFN0YXRpbyh7XG4vLyAgICAgICAgICAgICB1cmw6ICQodGhpcykuYXR0cignaHJlZicpLFxuLy8gICAgICAgICAgICAgdHlwZTogJCh0aGlzKS5pcygnLmFjdGlvbicpID8gJ3JlbmRlcicgOiAnYm90aCcsXG4vLyAgICAgICAgICAgICBjb250ZXh0OiAkKHRoaXMpLFxuLy8gICAgICAgICAgICAgZ2xvYmFsczoge1xuLy8gICAgICAgICAgICAgICAgIGNhcnQ6IGZ1bmN0aW9uIChjYXJ0KSB7XG4vLyAgICAgICAgICAgICAgICAgICAgICQoJy5jYXJ0LWJhZGdlLXBhY2thZ2VzLWNvdW50JykuaHRtbChjYXJ0Lmludm9pY2UucHJvZHVjdHMpO1xuLy8gICAgICAgICAgICAgICAgIH1cbi8vICAgICAgICAgICAgIH1cbi8vICAgICAgICAgfSk7XG4vLyAgICAgICAgIHJldHVybiBmYWxzZTtcbi8vICAgICB9KTtcblxuLy8gICAgICQoJ2Zvcm1bYWN0aW9uXScsIHRoaXMpLm5vdCgnLmRpcmVjdCwgW2RhdGEtZGlyZWN0XSwgW3RhcmdldD1fYmxhbmtdLCAubGlqYXgnKS5lYWNoKGZ1bmN0aW9uICgpIHtcbi8vICAgICAgICAgbmV3IExpamF4KHRoaXMpO1xuLy8gICAgIH0pLm9uKCdqcmVzcCcsIGZ1bmN0aW9uIChlLCBkKSB7XG4vLyAgICAgICAgIGlmIChkLmVycm9ycykge1xuLy8gICAgICAgICAgICAgJCgnLmlzLWludmFsaWQnLCB0aGlzKS5yZW1vdmVDbGFzcygnaXMtaW52YWxpZCcpO1xuLy8gICAgICAgICAgICAgJCgnLmludmFsaWQtZmVlZGJhY2snLCB0aGlzKS5yZW1vdmUoKTtcbi8vICAgICAgICAgICAgIGZvciAodmFyIGlkIGluIGQuZXJyb3JzKSB7XG4vLyAgICAgICAgICAgICAgICAgJCgnIycgKyBpZCkuYWRkQ2xhc3MoJ2lzLWludmFsaWQnKTtcbi8vICAgICAgICAgICAgICAgICAkKCc8ZGl2IGNsYXNzPVwiaW52YWxpZC1mZWVkYmFja1wiPicgKyBkLmVycm9yc1tpZF1bMF0gKyAnPC9kaXY+JykuaW5zZXJ0QWZ0ZXIoJCgnIycgKyBpZCkubmV4dCgpKTtcbi8vICAgICAgICAgICAgIH1cbi8vICAgICAgICAgfVxuLy8gICAgIH0pO1xuLy8gfVxuIl19
