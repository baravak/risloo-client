$(document).ready(function () {
    $(document).trigger('statio:global:renderResponse', [$(document)]);
});

function statio_each(event, base, context){
    $('.input-avatar', this).change(function () {
        readURL(this);
    });
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

    $(".select2-select", this).each(function () {
        var options = {
            width: '100%',
            amdLanguageBase: 'dist/vendors/select2-4.0.13/dist/js/i18n',
            language: 'fa',
            minimumInputLength: 0,
            allowClear: $(this).is('[data-allowClear]') || $(this).is('.has-clear'),
            dir: "rtl",
            tags: $(this).is('.tag-type'),
            dropdownParent: $('#' + $(this).attr('data-dropdownParent')).length ? $('#' + $(this).attr('data-dropdownParent')) : undefined
        };
        $(this).attr('data-mr-value', $('[name=' + $(this).attr('data-multi-round') + ']').val());
        $('[name=' + $(this).attr('data-multi-round') + ']').remove();
        if (options.allowClear) {
            options.placeholder = {};
            options.placeholder.text = $('option', this).first().text();
            options.placeholder.id = $('option', this).first().attr('value');
        }
        if ($(this).is('[data-url]')) {
            var title = $(this).attr('data-title') || 'title';
            var _self = this;
            options.ajax = {
                delay: 250,
                url: $(this).attr('data-url'),
                dataType: 'json',
                quietMillis: 250,
                data: function (params) {
                    return {
                        q: params.term || ''
                    };
                },
                processResults: function (data) {
                    data = data.data || data;
                    var id_property = $(_self).attr('data-id') || 'id';
                    var title_property = $(_self).attr('data-title') || 'title';
                    var result = { results: [] };
                    if ($(_self).is('[data-allowClear]')) {
                        result.results.push({
                            id: '',
                            text: '-',
                            all: null
                        });
                    }
                    for (var i = 0; i < data.length; i++) {
                        var sub_title_property = title_property;
                        if (sub_title_property.indexOf(' ') >= 0) {
                            var sub_title_properties = sub_title_property.split(' ');
                            for (var is = 0; is < sub_title_properties.length; is++) {
                                if (data[i][sub_title_properties[is]]) {
                                    sub_title_property = sub_title_properties[is];
                                    break;
                                }

                            }
                        }
                        result.results.push({
                            id: data[i][id_property],
                            text: data[i][sub_title_property],
                            all: data[i]
                        });
                    }
                    return result;
                },
                cache: false
            };
        }
        $(this).select2(options);
    });
    // $('#filter-parent.select2-select', this).on('change', function(){
    // });
    $('.dropdown-menu.keep-open', this).on('click', function (event) {
        event.stopPropagation();
    });
}

$(document).on('statio:global:renderResponse', function (event, base, context) {
    base.each(function () {
        statio_each.call(this, event, base, context);
    });
});
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbImFwcC5qcyIsInN0YXRpby1lYWNoLmpzIiwic3RhdGlvLWdsb2JhbC5qcyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQTtBQUNBO0FBQ0E7QUFDQTtBQ0hBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FDcElBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSIsImZpbGUiOiJhcHAuanMiLCJzb3VyY2VzQ29udGVudCI6WyIkKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbiAoKSB7XG4gICAgJChkb2N1bWVudCkudHJpZ2dlcignc3RhdGlvOmdsb2JhbDpyZW5kZXJSZXNwb25zZScsIFskKGRvY3VtZW50KV0pO1xufSk7XG4iLCJmdW5jdGlvbiBzdGF0aW9fZWFjaChldmVudCwgYmFzZSwgY29udGV4dCl7XG4gICAgJCgnLmlucHV0LWF2YXRhcicsIHRoaXMpLmNoYW5nZShmdW5jdGlvbiAoKSB7XG4gICAgICAgIHJlYWRVUkwodGhpcyk7XG4gICAgfSk7XG4gICAgJCgnLnVzZXItdHlwZXMgW25hbWU9dHlwZV0nLCB0aGlzKS5vbignY2hhbmdlJywgZnVuY3Rpb24oKXtcbiAgICAgICAgaWYgKCQodGhpcykudmFsKCkgPT0gJ3BzeWNob2xvZ2lzdCcpXG4gICAgICAgIHtcbiAgICAgICAgICAgICQoJyNwb3NpdGlvbicpLmF0dHIoJ2Rpc2FibGVkJywgJ2Rpc2FibGUnKS5wYXJlbnRzKCcuZm9ybS1ncm91cCcpLmFkZENsYXNzKCdkLW5vbmUnKTtcbiAgICAgICAgICAgICQoJyNwc3ljaG9sb2dpc3QtcG9zaXRpb24nKS5yZW1vdmVBdHRyKCdkaXNhYmxlZCcpLnBhcmVudHMoJy5mb3JtLWdyb3VwJykucmVtb3ZlQ2xhc3MoJ2Qtbm9uZScpO1xuICAgICAgICB9XG4gICAgICAgIGVsc2UgaWYgKCQoJyNwb3NpdGlvbicpLmF0dHIoJ2Rpc2FibGVkJykpXG4gICAgICAgIHtcbiAgICAgICAgICAgICQoJyNwb3NpdGlvbicpLnJlbW92ZUF0dHIoJ2Rpc2FibGVkJykucGFyZW50cygnLmZvcm0tZ3JvdXAnKS5yZW1vdmVDbGFzcygnZC1ub25lJyk7XG4gICAgICAgICAgICAkKCcjcHN5Y2hvbG9naXN0LXBvc2l0aW9uJykuYXR0cignZGlzYWJsZWQnLCAnZGlzYWJsZWQnKS5wYXJlbnRzKCcuZm9ybS1ncm91cCcpLmFkZENsYXNzKCdkLW5vbmUnKTtcbiAgICAgICAgfVxuICAgIH0pO1xuICAgICQoJ1tkYXRhLUxpamF4XSwgLmxpamF4JywgdGhpcykuZWFjaChmdW5jdGlvbiAoKSB7XG4gICAgICAgIG5ldyBMaWpheCh0aGlzKTtcbiAgICB9KTtcbiAgICAkKFwiYVwiLCB0aGlzKS5ub3QoJy5kaXJlY3QsIFtkYXRhLWRpcmVjdF0sIFt0YXJnZXQ9X2JsYW5rXSwgLmxpamF4LCBbZGF0YS1saWpheF0nKS5vbignY2xpY2snLCBmdW5jdGlvbiAoKSB7XG4gICAgICAgIG5ldyBTdGF0aW8oe1xuICAgICAgICAgICAgdXJsOiAkKHRoaXMpLmF0dHIoJ2hyZWYnKSxcbiAgICAgICAgICAgIHR5cGU6ICQodGhpcykuaXMoJy5hY3Rpb24nKSA/ICdyZW5kZXInIDogJ2JvdGgnLFxuICAgICAgICAgICAgY29udGV4dDogJCh0aGlzKSxcbiAgICAgICAgICAgIGdsb2JhbHM6IHtcbiAgICAgICAgICAgICAgICBjYXJ0OiBmdW5jdGlvbiAoY2FydCkge1xuICAgICAgICAgICAgICAgICAgICAkKCcuY2FydC1iYWRnZS1wYWNrYWdlcy1jb3VudCcpLmh0bWwoY2FydC5pbnZvaWNlLnByb2R1Y3RzKTtcbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICB9XG4gICAgICAgIH0pO1xuICAgICAgICByZXR1cm4gZmFsc2U7XG4gICAgfSk7XG5cbiAgICAkKCdmb3JtW2FjdGlvbl0nLCB0aGlzKS5ub3QoJy5kaXJlY3QsIFtkYXRhLWRpcmVjdF0sIFt0YXJnZXQ9X2JsYW5rXSwgLmxpamF4JykuZWFjaChmdW5jdGlvbiAoKSB7XG4gICAgICAgIG5ldyBMaWpheCh0aGlzKTtcbiAgICB9KS5vbignanJlc3AnLCBmdW5jdGlvbiAoZSwgZCkge1xuICAgICAgICAkKCcuaXMtaW52YWxpZCcsIHRoaXMpLnJlbW92ZUNsYXNzKCdpcy1pbnZhbGlkJyk7XG4gICAgICAgICQoJy5pbnZhbGlkLWZlZWRiYWNrJywgdGhpcykucmVtb3ZlKCk7XG4gICAgICAgIGlmIChkLmVycm9ycykge1xuICAgICAgICAgICAgZm9yICh2YXIgaWQgaW4gZC5lcnJvcnMpIHtcbiAgICAgICAgICAgICAgICAkKCcjJyArIGlkICsgJywgW2RhdGEtYWxpYXN+PScgKyBpZCArICddJykuYWRkQ2xhc3MoJ2lzLWludmFsaWQnKTtcbiAgICAgICAgICAgICAgICAkKCc8ZGl2IGNsYXNzPVwiaW52YWxpZC1mZWVkYmFja1wiPicgKyBkLmVycm9yc1tpZF1bMF0gKyAnPC9kaXY+JykuaW5zZXJ0QWZ0ZXIoJCgnIycgKyBpZCArICcsIFtkYXRhLWFsaWFzfj0nICsgaWQgKyAnXScpKTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgfVxuICAgIH0pO1xuXG4gICAgJCgnW2RhdGEtZm9ybS1wYWdlPWxvZ2luXScpLm9uKCdqcmVzcCcsIGZ1bmN0aW9uIChldmVudCwgZGF0YSkge1xuICAgICAgICBpZihkYXRhLmlzX29rKVxuICAgICAgICB7XG4gICAgICAgICAgICBkb2N1bWVudC5jb29raWUgPSAnbG9naW5fdXNlcm5hbWU9JyArIChkYXRhLnVzZXIubW9iaWxlIHx8IGRhdGEudXNlci51c2VybmFtZSB8fCBkYXRhLnVzZXIuZW1haWwpO1xuICAgICAgICAgICAgZG9jdW1lbnQuY29va2llID0gJ2xvZ2luX25hbWU9JyArIGRhdGEudXNlci5uYW1lO1xuICAgICAgICAgICAgbmV3IFN0YXRpbyh7XG4gICAgICAgICAgICAgICAgY29udGV4dCA6IHRoaXMsXG4gICAgICAgICAgICAgICAgdXJsOiBkYXRhLnVybFxuICAgICAgICAgICAgfSk7XG4gICAgICAgIH1cbiAgICB9KTtcblxuICAgICQoXCIuc2VsZWN0Mi1zZWxlY3RcIiwgdGhpcykuZWFjaChmdW5jdGlvbiAoKSB7XG4gICAgICAgIHZhciBvcHRpb25zID0ge1xuICAgICAgICAgICAgd2lkdGg6ICcxMDAlJyxcbiAgICAgICAgICAgIGFtZExhbmd1YWdlQmFzZTogJ2Rpc3QvdmVuZG9ycy9zZWxlY3QyLTQuMC4xMy9kaXN0L2pzL2kxOG4nLFxuICAgICAgICAgICAgbGFuZ3VhZ2U6ICdmYScsXG4gICAgICAgICAgICBtaW5pbXVtSW5wdXRMZW5ndGg6IDAsXG4gICAgICAgICAgICBhbGxvd0NsZWFyOiAkKHRoaXMpLmlzKCdbZGF0YS1hbGxvd0NsZWFyXScpIHx8ICQodGhpcykuaXMoJy5oYXMtY2xlYXInKSxcbiAgICAgICAgICAgIGRpcjogXCJydGxcIixcbiAgICAgICAgICAgIHRhZ3M6ICQodGhpcykuaXMoJy50YWctdHlwZScpLFxuICAgICAgICAgICAgZHJvcGRvd25QYXJlbnQ6ICQoJyMnICsgJCh0aGlzKS5hdHRyKCdkYXRhLWRyb3Bkb3duUGFyZW50JykpLmxlbmd0aCA/ICQoJyMnICsgJCh0aGlzKS5hdHRyKCdkYXRhLWRyb3Bkb3duUGFyZW50JykpIDogdW5kZWZpbmVkXG4gICAgICAgIH07XG4gICAgICAgICQodGhpcykuYXR0cignZGF0YS1tci12YWx1ZScsICQoJ1tuYW1lPScgKyAkKHRoaXMpLmF0dHIoJ2RhdGEtbXVsdGktcm91bmQnKSArICddJykudmFsKCkpO1xuICAgICAgICAkKCdbbmFtZT0nICsgJCh0aGlzKS5hdHRyKCdkYXRhLW11bHRpLXJvdW5kJykgKyAnXScpLnJlbW92ZSgpO1xuICAgICAgICBpZiAob3B0aW9ucy5hbGxvd0NsZWFyKSB7XG4gICAgICAgICAgICBvcHRpb25zLnBsYWNlaG9sZGVyID0ge307XG4gICAgICAgICAgICBvcHRpb25zLnBsYWNlaG9sZGVyLnRleHQgPSAkKCdvcHRpb24nLCB0aGlzKS5maXJzdCgpLnRleHQoKTtcbiAgICAgICAgICAgIG9wdGlvbnMucGxhY2Vob2xkZXIuaWQgPSAkKCdvcHRpb24nLCB0aGlzKS5maXJzdCgpLmF0dHIoJ3ZhbHVlJyk7XG4gICAgICAgIH1cbiAgICAgICAgaWYgKCQodGhpcykuaXMoJ1tkYXRhLXVybF0nKSkge1xuICAgICAgICAgICAgdmFyIHRpdGxlID0gJCh0aGlzKS5hdHRyKCdkYXRhLXRpdGxlJykgfHwgJ3RpdGxlJztcbiAgICAgICAgICAgIHZhciBfc2VsZiA9IHRoaXM7XG4gICAgICAgICAgICBvcHRpb25zLmFqYXggPSB7XG4gICAgICAgICAgICAgICAgZGVsYXk6IDI1MCxcbiAgICAgICAgICAgICAgICB1cmw6ICQodGhpcykuYXR0cignZGF0YS11cmwnKSxcbiAgICAgICAgICAgICAgICBkYXRhVHlwZTogJ2pzb24nLFxuICAgICAgICAgICAgICAgIHF1aWV0TWlsbGlzOiAyNTAsXG4gICAgICAgICAgICAgICAgZGF0YTogZnVuY3Rpb24gKHBhcmFtcykge1xuICAgICAgICAgICAgICAgICAgICByZXR1cm4ge1xuICAgICAgICAgICAgICAgICAgICAgICAgcTogcGFyYW1zLnRlcm0gfHwgJydcbiAgICAgICAgICAgICAgICAgICAgfTtcbiAgICAgICAgICAgICAgICB9LFxuICAgICAgICAgICAgICAgIHByb2Nlc3NSZXN1bHRzOiBmdW5jdGlvbiAoZGF0YSkge1xuICAgICAgICAgICAgICAgICAgICBkYXRhID0gZGF0YS5kYXRhIHx8IGRhdGE7XG4gICAgICAgICAgICAgICAgICAgIHZhciBpZF9wcm9wZXJ0eSA9ICQoX3NlbGYpLmF0dHIoJ2RhdGEtaWQnKSB8fCAnaWQnO1xuICAgICAgICAgICAgICAgICAgICB2YXIgdGl0bGVfcHJvcGVydHkgPSAkKF9zZWxmKS5hdHRyKCdkYXRhLXRpdGxlJykgfHwgJ3RpdGxlJztcbiAgICAgICAgICAgICAgICAgICAgdmFyIHJlc3VsdCA9IHsgcmVzdWx0czogW10gfTtcbiAgICAgICAgICAgICAgICAgICAgaWYgKCQoX3NlbGYpLmlzKCdbZGF0YS1hbGxvd0NsZWFyXScpKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICByZXN1bHQucmVzdWx0cy5wdXNoKHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBpZDogJycsXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgdGV4dDogJy0nLFxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIGFsbDogbnVsbFxuICAgICAgICAgICAgICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICAgICAgZm9yICh2YXIgaSA9IDA7IGkgPCBkYXRhLmxlbmd0aDsgaSsrKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICB2YXIgc3ViX3RpdGxlX3Byb3BlcnR5ID0gdGl0bGVfcHJvcGVydHk7XG4gICAgICAgICAgICAgICAgICAgICAgICBpZiAoc3ViX3RpdGxlX3Byb3BlcnR5LmluZGV4T2YoJyAnKSA+PSAwKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgdmFyIHN1Yl90aXRsZV9wcm9wZXJ0aWVzID0gc3ViX3RpdGxlX3Byb3BlcnR5LnNwbGl0KCcgJyk7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgZm9yICh2YXIgaXMgPSAwOyBpcyA8IHN1Yl90aXRsZV9wcm9wZXJ0aWVzLmxlbmd0aDsgaXMrKykge1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBpZiAoZGF0YVtpXVtzdWJfdGl0bGVfcHJvcGVydGllc1tpc11dKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBzdWJfdGl0bGVfcHJvcGVydHkgPSBzdWJfdGl0bGVfcHJvcGVydGllc1tpc107XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICBicmVhaztcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgfVxuXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgICAgICAgICAgcmVzdWx0LnJlc3VsdHMucHVzaCh7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgaWQ6IGRhdGFbaV1baWRfcHJvcGVydHldLFxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHRleHQ6IGRhdGFbaV1bc3ViX3RpdGxlX3Byb3BlcnR5XSxcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICBhbGw6IGRhdGFbaV1cbiAgICAgICAgICAgICAgICAgICAgICAgIH0pO1xuICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgICAgIHJldHVybiByZXN1bHQ7XG4gICAgICAgICAgICAgICAgfSxcbiAgICAgICAgICAgICAgICBjYWNoZTogZmFsc2VcbiAgICAgICAgICAgIH07XG4gICAgICAgIH1cbiAgICAgICAgJCh0aGlzKS5zZWxlY3QyKG9wdGlvbnMpO1xuICAgIH0pO1xuICAgIC8vICQoJyNmaWx0ZXItcGFyZW50LnNlbGVjdDItc2VsZWN0JywgdGhpcykub24oJ2NoYW5nZScsIGZ1bmN0aW9uKCl7XG4gICAgLy8gfSk7XG4gICAgJCgnLmRyb3Bkb3duLW1lbnUua2VlcC1vcGVuJywgdGhpcykub24oJ2NsaWNrJywgZnVuY3Rpb24gKGV2ZW50KSB7XG4gICAgICAgIGV2ZW50LnN0b3BQcm9wYWdhdGlvbigpO1xuICAgIH0pO1xufVxuIiwiJChkb2N1bWVudCkub24oJ3N0YXRpbzpnbG9iYWw6cmVuZGVyUmVzcG9uc2UnLCBmdW5jdGlvbiAoZXZlbnQsIGJhc2UsIGNvbnRleHQpIHtcbiAgICBiYXNlLmVhY2goZnVuY3Rpb24gKCkge1xuICAgICAgICBzdGF0aW9fZWFjaC5jYWxsKHRoaXMsIGV2ZW50LCBiYXNlLCBjb250ZXh0KTtcbiAgICB9KTtcbn0pO1xuIl19
