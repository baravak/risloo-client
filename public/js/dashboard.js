am4chart_fa = {
    Export : 'خروجی',
    Image: 'تصویر',
    Data: 'داده',
    Print: 'پرینت   ',
};
var score_chart = {};
score_chart['16PF-93'] = function(scores){
    var chart = am4core.create($(this).attr('id'), am4charts.XYChart);
    chart.language.locale = am4chart_fa;

    chart.rtl = true;

    var factors = {
        A : {
            min : 'مردم‌گریزی',
            max : 'مردم‌آمیزی',
        },
        B: {
            min: 'استدلال عینی',
            max: 'استدلال انتزاعی',
        },
        C : {
            min: 'ناپایداری هیجانی',
            max: 'پایداری هیجانی',
        },
        E : {
            min: 'سلطه‌پذیری',
            max: 'سلطه‌گری',
        },
        F : {
            min: 'دل‌مردگی',
            max: 'سرزندگی',
        },
        G : {
            min: 'مصلحت‌گرا',
            max: 'باوجدان',
        },
        H : {
            min: 'ترسو',
            max: 'جسور',
        },
        I : {
            min: 'یک‌دنده',
            max: 'حساس',
        },
        L : {
            min: 'زودباور',
            max: 'شکاک',
        },
        M : {
            min: 'عمل‌گرا',
            max: 'کولی‌باز',
        },
        N : {
            min: 'بی‌ظرافت',
            max: 'ظرافت',
        },
        O : {
            min: 'مستعد احساس گناه',
            max: 'اطمینان به خود',
        },
        Q1 : {
            min: 'بازبودن نسبت به تغییر',
            max: 'بنیاد‌گرایی',
        },
        Q2 : {
            min: 'متکی به دیگران',
            max: 'مسلط بر خود',
        },
        Q3 : {
            min: 'اختلال‌مدار',
            max: 'کمال‌گرا',
        },
        Q4 : {
            min: 'آرام',
            max: 'اضطراب',
        }
    };

    for (var key in factors) {
        chart.data.push({
            factor: key,
            score: ++(scores[key.toLowerCase()]),
            min: factors[key].min,
            max: factors[key].max,
        });
    }
    chart.paddingTop = 100;
    var label = chart.chartContainer.createChild(am4core.Label);
    label.text = "عوامل مرتبه اول";
    label.align = "center";
    var factor = chart.xAxes.push(new am4charts.CategoryAxis());
    factor.dataFields.category = "factor";
    factor.renderer.minGridDistance = 1;


    var min = chart.xAxes.push(new am4charts.CategoryAxis());
    min.dataFields.category = "min";
    min.renderer.labels.template.rotation = 90;
    min.renderer.labels.template.paddingTop = -10;
    min.renderer.minGridDistance = 1;
    min.renderer.labels.template.fontSize = 12;
    min.renderer.labels.template.fontSize = 12;
    min.renderer.labels.template.valign = "top";
    min.renderer.grid.template.strokeOpacity = .1;
    min.renderer.grid.template.strokeWidth = 0;
    min.renderer.grid.template.stroke = 'white';
    min.renderer.labels.template.adapter.add('fill', function (fill, target) {
        if (target.dataItem._dataContext) {
            if (target.dataItem._dataContext.score <= 3) {
                return 'black';
            }
            if (target.dataItem._dataContext.score == 4) {
                return '#888888';
            }
        }
        return '#dedede';
    });
    min.renderer.labels.template.adapter.add('fontWeight', function (fill, target) {
        if (target.dataItem._dataContext) {
            if (target.dataItem._dataContext.score <= 3) {
                return '900';
            }
            if (target.dataItem._dataContext.score == 4) {
                return '700';
            }
        }
        return 'normal';
    });
    var max = chart.xAxes.push(new am4charts.CategoryAxis());
    max.dataFields.category = "max";
    max.renderer.inside = true;
    max.renderer.labels.template.paddingTop = -10;
    max.renderer.labels.template.paddingLeft = -100;
    max.renderer.labels.template.rotation = 90;
    max.renderer.labels.template.fontSize = 12;
    max.renderer.minGridDistance = 1;

    max.renderer.labels.template.align = "left";
    max.renderer.labels.template.valign = "top";
    max.renderer.labels.template.adapter.add('fill', function(fill, target){
        if (target.dataItem._dataContext)
        {
            if (target.dataItem._dataContext.score >= 8)
            {
                return 'black';
            }
            if (target.dataItem._dataContext.score == 7) {
                return '#888888';
            }
        }
        return '#dedede';
    });

    max.renderer.labels.template.adapter.add('fontWeight', function (fill, target) {
        if (target.dataItem._dataContext) {
            if (target.dataItem._dataContext.score >= 8) {
                return '900';
            }
            if (target.dataItem._dataContext.score == 7) {
                return '700';
            }
        }
        return 'normal';
    });


    // Add value axis
    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
    valueAxis.renderer.minGridDistance = 10;
    valueAxis.min = 0;
    valueAxis.max = 10;
    // valueAxis.renderer.grid.template.strokeOpacity = 1;
    // valueAxis.renderer.grid.template.stroke = am4core.color("black");
    valueAxis.renderer.grid.template.strokeWidth = 1;


    // Add series
    var series = chart.series.push(new am4charts.ColumnSeries());
    series.dataFields.categoryX = "factor";
    series.dataFields.categoryX1 = "min";
    series.dataFields.categoryZ = "min";

    series.dataFields.valueY = "score";
    series.columns.template.width = 0;
    series.columns.template.align = 'left';

    var bullet = series.bullets.create(am4charts.CircleBullet);
    bullet.fill = '#1A5276';
    bullet.scale = 2.5;
    bullet.strokeWidth = 0;
    bullet.stroke = '#1A5276';
    bullet.dy = 14;

    var labelBullet = series.bullets.push(new am4charts.LabelBullet());
    labelBullet.label.text = "{score}";
    labelBullet.label.fontSize = 12;
    labelBullet.label.fill = '#ffffff';
    labelBullet.label.dy = 13;
    labelBullet.label.dx = 0;
    labelBullet.label.hideOversized = false;
    labelBullet.label.truncate = false;

    function createRange(axis, from, to, color) {
        var range = axis.axisRanges.create();
        range.value = from;
        range.endValue = to;
        range.axisFill.fill = color;
        range.axisFill.fillOpacity = 1;
        // range.label.disabled = true;
        range.grid.strokeOpacity = 0;

    }
    window.test = {
        min: min,
        max: max,
        valueAxis : valueAxis
    };

    createRange(valueAxis, 0, 1, am4core.color("#5DADE2"));
    createRange(valueAxis, 1, 2, am4core.color("#5DADE2"));
    createRange(valueAxis, 2, 3, am4core.color("#5DADE2"));

    createRange(valueAxis, 7, 8, am4core.color("#5DADE2"));
    createRange(valueAxis, 8, 9, am4core.color("#5DADE2"));
    createRange(valueAxis, 9, 10, am4core.color("#5DADE2"));

    createRange(valueAxis, 3, 4, am4core.color("#D6EAF8"));
    createRange(valueAxis, 6, 7, am4core.color("#D6EAF8"));

    createRange(valueAxis, 4, 5, am4core.color("#EBF5FB"));
    createRange(valueAxis, 5, 6, am4core.color("#EBF5FB"));

    chart.exporting.menu = new am4core.ExportMenu();
    chart.exporting.menu.items = [{
        label: 'خروجی',
        menu: [
            {
                "type": "pdf", "label": "PDF"
            },
            {
                "type": "xlsx", "label": "اکسل"
            }
        ]
    }];
    var watermark = chart.createChild(am4core.Label);
    watermark.text = "risloo.com";
    watermark.fontSize = 12;
    watermark.align = "left";
    watermark.fillOpacity = 0.5;
    chart.exporting.adapter.add("pdfmakeDocument", function (pdf, target) {

        pdf.doc.content.unshift({
            text: "ریسلو",
            margin: [0, 30],
            style: {
                fontSize: 25,
                bold: true,
            }
        });
        return pdf;
    });
    chart.exporting.getFormatOptions("pdf").addURL = false;

}

$('body').on('statio:dashboard:centers:create statio:dashboard:centers:edit', function(){
    $('[name=type]', this).on('change', function(event, start){
        var manage_field = $('#manager_id');
        var endpoint = manage_field.attr('data-url');
        var data_url = endpoint;
        endpoint = url.parse(endpoint);
        endpoint.get = endpoint.get ? endpoint.get : {};
        if ($('#type-personal_clinic[name=type]').is(':checked'))
        {
            endpoint.get.personal_clinic = 'no';
            $('#avatar, #title').prop('disabled', true);
            $('#avatar, #title').parents('.form-group').fadeOut('fast');
        }
        else
        {
            if(!start)
            {
                $('#title').val('');
            }
            $('#avatar, #title').prop('disabled', false);
            $('#avatar, #title').parents('.form-group').fadeIn('fast');
            endpoint.get.personal_clinic = 'yes';
        }

        if (url.build(endpoint) != data_url) {
            manage_field.attr('data-url', url.build(endpoint));
            $('*', manage_field).remove();
            manage_field.select2('destroy');
            select2element.call(manage_field[0]);
        }
    });
    $('[name=type]').eq(0).trigger('change', [true]);
});
$('body').on('statio:dashboard:samples:show', function () {
    $('#editable', this).on('change', function(){
        if ($(this).is(':checked'))
        {
            $('.form-items').removeAttr('disabled');
        }
        else
        {
            $('.form-items').attr('disabled', 'disabled');
        }
    });
});

$('body').on('statio:dashboard:reserves:create', function () {
    $('#started_at').on('change', function(event, picker, unix){
        var start = $("#calendar").attr('data-from');
        var end = $("#calendar").attr('data-to');
        var val = $(this).val();
        if (start <= val && end >= val){

        }
        else
        {
            new Statio({
                type: 'render',
                context: this,
                ajax: {
                    cache: false,
                    method: 'get',
                    data: {
                        room_id: $('#room_id').val(),
                        time: val
                    }
                },
                url: $("#calendar").attr('data-url')
            });
        }
    });
});

$('body').on('statio:dashboard:samples:create', function(){
    $('#room-tab').on('show.bs.tab', function () {
        $('input, select, checkbox, radio', '#room').each(function () {
            if ($(this).is('.disabled:disabled')) {
                $(this).removeAttr('disabled').removeClass('disabled');
            }
        });
        $('input, select, checkbox, radio', '#case').each(function () {
            if (!$(this).is(':disabled')) {
                $(this).attr('disabled', 'disabled').addClass('disabled');
            }
        });
    }).on('hide.bs.tab', function () {
        $('input, select, checkbox, radio', '#room').each(function () {
            if (!$(this).is(':disabled')) {
                $(this).attr('disabled', 'disabled').addClass('disabled');
            }
        });
        $('input, select, checkbox, radio', '#case').each(function () {
            if ($(this).is('.disabled:disabled')) {
                $(this).removeAttr('disabled').removeClass('disabled');
            }
        });
    });


    $('#room_client_id.sample-page').on('change', function () {
        if (!$(this).val() || !$(this).val().length) {
            $('#count').removeAttr('disabled');
        }
        else {
            $('#count').attr('disabled', 'disabled');
        }
    });
    $('#count.sample-page').on('change', function () {
        if (!$(this).val()) {
            $('#room_client_id.sample-page').removeAttr('disabled');
        }
        else {
            $('#room_client_id.sample-page').attr('disabled', 'disabled');
        }
    });

    $('#case_id').on('select2:select', function(event){
        $('#client-null-tamplate').hide();
        event.params.data.all.clients.forEach(function(e, i){
            var template = $('#client-template').clone();
            template.removeClass('d-none');
            template.removeAttr('id');
            $('.data-name', template).text(e.user.name);
            var avatar = e.user.avatar ? e.user.avatar.small : null;
            if(avatar)
            {
                $('img', template).attr('src', e.user.avatar.small.url);
            }
            else
            {
                $('img', template).remove();
                $('.media', template).append('<span>' + (e.user.name.substr(0, 1)) + '</span>');
            }
            $('input', template).attr('id', 'client-' + e.user.id).attr('name', 'client_id[]').attr('value', e.id);
            $('label', template).attr('for', 'client-' + e.user.id);
            template.appendTo('#client-list');
        });
    });
    $('#case_id').on('change', function(){
        $('#client-list .richak').remove();
        if (!$(this).val())
        {
            $('#client-null-tamplate').show();
        }
    });
});

$(document).on('statio:global:renderResponse', function (event, base, context) {
    var selectedTab = location.hash;
    var tabNav = $('[data-toggle=tab][href$="' + selectedTab + '"]');
    tabNav.trigger('click');

    base.each(function () {
        $('[data-toggle=tab]', base).on('click', function () {
            var href = $(this).attr('href').match(/(\#.+)$/);
            if (href) {
                location.hash = href[1];
            }
        });
        $('.score_data', this).each(function(){
            var score = JSON.parse($(this).text());
            var chart_function = ($(this).attr('data-scale-id'));
            score_chart[chart_function].call(this, score);
        });
    });
});


function select2result_room(data, option){
    if (!data.all && data.element)
    {
        data.all = JSON.parse($(data.element).attr('data-json'));
        $(data.element).attr('data-json', '');
    }
    if (data.all) {
        var span = $('<div class="d-flex align-items-center fs-12 d-inline-block"><span class="media media-sm media-primary"><img alt="A"></span><div class="pr-1"><div class="font-weight-bold data-name"></div><div class="fs-10 data-id"></div></div></div>');
        var avatar = select2find_data(data.all, $(this).attr('data-avatar') || 'avatar.tiny.url avatar.small.url');
        if (avatar) {
            $('img', span).attr('src', avatar);
        }
        else {
            $('img', span).remove();
            $('.media', span).html('<span>' + (data.text ? data.text.substr(0, 1) : 'IR') + '</span>');
        }
        var name = data.text || data.id;
        $('div.data-name', span).html(name);
        var clinic = data.all.center.detail.title;
        $('div.data-id', span).html(clinic);
        return span;
    }
    return data.text;
}

function select2result_center(data, option) {
    if (!data.all && data.element) {
        data.all = JSON.parse($(data.element).attr('data-json'));
        $(data.element).attr('data-json', '');
    }
    if (data.all) {
        var span = $('<div class="d-flex align-items-center fs-12 d-inline-block"><span class="media media-sm media-primary"><img alt="A"></span><div class="pr-1"><div class="font-weight-bold data-name"></div><div class="fs-10 data-id"></div></div></div>');
        var avatar = select2find_data(data.all, $(this).attr('data-avatar') || 'detail.avatar.tiny.url detail.avatar.small.url');
        if (avatar) {
            $('img', span).attr('src', avatar);
        }
        else {
            $('img', span).remove();
            $('.media', span).html('<span>' + (data.text ? data.text.substr(0, 1) : 'RS') + '</span>');
        }
        var name = select2find_data(data.all, $(this).attr('data-title') || 'detail.title');
        $('div.data-name', span).html(name);
        var clinic = data.text;
        $('div.data-id', span).html(data.id);
        return span;
    }
    return data.text;
}

function select2result_case_clients(data, option) {
    if (!data.all) return data.text;
    var clients = [];
    data.all.clients.forEach(function(client){
        clients.push(client.user.name || client.user.id);
    });
    return $('<span></span>').text(clients.join('- ')).addClass('fs-12');
}
