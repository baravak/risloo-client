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
