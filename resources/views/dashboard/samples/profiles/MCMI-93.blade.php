<style>
    #profile table{
        margin: 0 auto;
    }
    #profile td, #profile th{
        padding: .3cm 0;
        font-size: 12px;
    }
    #profile td, #profile th, #profile tr{
        border-color: #4c4c4c !important;
    }

    .bg-disorder{
        background: #b1b1b1
    }
    .bg-type{
        background: #e0e0e0;
    }
    .bg-style{
        background: #f7f7f7
    }
    .score-chart{
         height: .3cm;
         background: black;
         opacity: .7;
    }
    .border-split{
        border-width: 3px !important;
    }
</style>
<div class="page mx-auto" id="profile">
    @includeWhen(request()->has('single'), 'dashboard.samples.profiles.top-header')
    <div class="row fs-10">
        <div class="col-3">
            <span class="d-inline-block ltr">مقیاس (V):</span>
           {{$sample->score->v->raw}}
        </div>
        <div class="col-3">
            <span class="d-inline-block ltr">تست {{$sample->score->status == 'invalid' ? 'نامعتبر' : 'معتبر'}} است</span>
            @if ($sample->score->status == 'invalid')
                {{__($sample->score->message)}}
            @endif
        </div>
    </div>
    <hr>
    <table>
        <tr class="text-center">
            <th colspan="2">دسته‌بندی</th>
            <th colspan="2">نمره</th>
            <th colspan="4">نمودار نمرات</th>
            <th>مقیاس‌های تشخیصی</th>
        </tr>
        <tr class="text-center border-bottom">
            <td colspan="2"></td>
            <td class="fs-10">خام</td>
            <td class="fs-10">BR</td>
            <td class="fs-10 text-right" style="width: 2cm;">
                <span class="d-inline-block" style="margin-right: -3px">0</span>
            </td>
            <td class="fs-10 text-right" style="width: 4cm">
                <span class="d-inline-block" style="margin-right: -7px">60</span>
            </td>
            <td class="fs-10 text-right" style="width: 1.5cm">
                <span class="d-inline-block" style="margin-right: -7px">75</span>
            </td>
            <td class="fs-10 text-right" style="width: 1.5cm">
                <span class="d-inline-block" style="margin-right: -7px">85</span>
                <div style="float: left">115</div>
            </td>
            <td style="width: 4cm"></td>
        </tr>
        <tr>
            <td class="border-bottom border-split" rowspan="3" style="width: 3cm">
                شاخص‌های اصلاح
            </td>
            <td class="text-center border-left pr-3 pl-2">X</td>
            <td class="text-center border-left border-bottom" style="width: 1.5cm">{{$sample->score->x->raw}}</td>
            <td class="text-center border-left border-bottom" style="width: 1.5cm">{{$sample->score->x->br}}</td>
            <td class="border-bottom">
                <div class="score-chart" style="width: {{$sample->score->x->br >= 60 ? 100 : (100 * $sample->score->x->br) / 60}}%"></div>
            </td>
            <td class="border-bottom bg-style">
                <div class="score-chart" style="width: {{$sample->score->x->br >= 75 ? 100 : ($sample->score->x->br - 60 > 0 ? (100 * ($sample->score->x->br - 60)) / 15 : 0)}}%"></div>
            </td>
            <td class="border-bottom bg-type">
                <div class="score-chart" style="width: {{$sample->score->x->br >= 85 ? 100 : ($sample->score->x->br - 75 > 0 ? (100 * ($sample->score->x->br - 75)) / 10 : 0)}}%"></div>
            </td>
            <td class="border-left border-bottom bg-disorder">
                <div class="score-chart" style="width: {{$sample->score->x->br >= 115 ? 100 : ($sample->score->x->br - 85 > 0 ? (100 * ($sample->score->x->br - 85)) / 30 : 0)}}%"></div>
            </td>
            <td class="border-bottom pr-2">افشاگری</td>
        </tr>
        <tr>
            <td class="text-center border-left pr-3 pl-2">Y</td>
            <td class="text-center border-left border-bottom">{{$sample->score->y->raw}}</td>
            <td class="text-center border-left border-bottom">{{$sample->score->y->br}}</td>
            <td class="border-bottom">
                <div class="score-chart" style="width: {{$sample->score->y->br >= 60 ? 100 : (100 * $sample->score->y->br) / 60}}%"></div>
            </td>
            <td class="border-bottom bg-style">
                <div class="score-chart" style="width: {{$sample->score->y->br >= 75 ? 100 : ($sample->score->y->br - 60 > 0 ? (100 * ($sample->score->y->br - 60)) / 15 : 0)}}%"></div>
            </td>
            <td class="border-bottom bg-type">
                <div class="score-chart" style="width: {{$sample->score->y->br >= 85 ? 100 : ($sample->score->y->br - 75 > 0 ? (100 * ($sample->score->y->br - 75)) / 10 : 0)}}%"></div>
            </td>
            <td class="border-left border-bottom bg-disorder">
                <div class="score-chart" style="width: {{$sample->score->y->br >= 115 ? 100 : ($sample->score->y->br - 85 > 0 ? (100 * ($sample->score->y->br - 85)) / 30 : 0)}}%"></div>
            </td>
            <td class="border-bottom pr-2">جامعه‌پسندی</td>
        </tr>
        <tr class="border-bottom border-split">
            <td class="text-center border-left  pr-3 pl-2">Z</td>
            <td class="text-center border-left">{{$sample->score->z->raw}}</td>
            <td class="text-center border-left">{{$sample->score->z->br}}</td>
            <td>
                <div class="score-chart" style="width: {{$sample->score->z->br >= 60 ? 100 : (100 * $sample->score->z->br) / 60}}%"></div>
            </td>
            <td class="bg-style">
                <div class="score-chart" style="width: {{$sample->score->z->br >= 75 ? 100 : ($sample->score->z->br - 60 > 0 ? (100 * ($sample->score->z->br - 60)) / 15 : 0)}}%"></div>
            </td>
            <td class="bg-type">
                <div class="score-chart" style="width: {{$sample->score->z->br >= 85 ? 100 : ($sample->score->z->br - 75 > 0 ? (100 * ($sample->score->z->br - 75)) / 10 : 0)}}%"></div>
            </td>
            <td class="border-left  bg-disorder">
                <div class="score-chart" style="width: {{$sample->score->z->br >= 115 ? 100 : ($sample->score->z->br - 85 > 0 ? (100 * ($sample->score->z->br - 85)) / 30 : 0)}}%"></div>
            </td>
            <td class="pr-2">بدجلوه‌دهی</td>
        </tr>

        <tr>
            <td class="border-bottom border-split" rowspan="11">
                الگوهای بالینی شخصیت
            </td>
            <td class="text-center border-left pr-3 pl-2">1</td>
            <td class="text-center border-left border-bottom" style="width: 1.5cm">{{$sample->score->{'1'}->raw}}</td>
            <td class="text-center border-left border-bottom" style="width: 1.5cm">{{$sample->score->{'1'}->br}}</td>
            <td class="border-bottom">
                <div class="score-chart" style="width: {{$sample->score->{'1'}->br >= 60 ? 100 : (100 * $sample->score->{'1'}->br) / 60}}%"></div>
            </td>
            <td class="border-bottom bg-style">
                <div class="score-chart" style="width: {{$sample->score->{'1'}->br >= 75 ? 100 : ($sample->score->{'1'}->br - 60 > 0 ? (100 * ($sample->score->{'1'}->br - 60)) / 15 : 0)}}%"></div>
            </td>
            <td class="border-bottom bg-type">
                <div class="score-chart" style="width: {{$sample->score->{'1'}->br >= 85 ? 100 : ($sample->score->{'1'}->br - 75 > 0 ? (100 * ($sample->score->{'1'}->br - 75)) / 10 : 0)}}%"></div>
            </td>
            <td class="border-left border-bottom bg-disorder">
                <div class="score-chart" style="width: {{$sample->score->{'1'}->br >= 115 ? 100 : ($sample->score->{'1'}->br - 85 > 0 ? (100 * ($sample->score->{'1'}->br - 85)) / 30 : 0)}}%"></div>
            </td>
            <td class="border-bottom pr-2">اسکیزوئید</td>
        </tr>
        <tr>
            <td class="text-center border-left pr-3 pl-2">2A</td>
            <td class="text-center border-left border-bottom">{{$sample->score->{'2a'}->raw}}</td>
            <td class="text-center border-left border-bottom">{{$sample->score->{'2a'}->br}}</td>
            <td class="border-bottom">
                <div class="score-chart" style="width: {{$sample->score->{'2a'}->br >= 60 ? 100 : (100 * $sample->score->{'2a'}->br) / 60}}%"></div>
            </td>
            <td class="border-bottom bg-style">
                <div class="score-chart" style="width: {{$sample->score->{'2a'}->br >= 75 ? 100 : ($sample->score->{'2a'}->br - 60 > 0 ? (100 * ($sample->score->{'2a'}->br - 60)) / 15 : 0)}}%"></div>
            </td>
            <td class="border-bottom bg-type">
                <div class="score-chart" style="width: {{$sample->score->{'2a'}->br >= 85 ? 100 : ($sample->score->{'2a'}->br - 75 > 0 ? (100 * ($sample->score->{'2a'}->br - 75)) / 10 : 0)}}%"></div>
            </td>
            <td class="border-left border-bottom bg-disorder">
                <div class="score-chart" style="width: {{$sample->score->{'2a'}->br >= 115 ? 100 : ($sample->score->{'2a'}->br - 85 > 0 ? (100 * ($sample->score->{'2a'}->br - 85)) / 30 : 0)}}%"></div>
            </td>
            <td class="border-bottom pr-2">اجتنابی</td>
        </tr>
        <tr>
            <td class="text-center border-left pr-3 pl-2">2B</td>
            <td class="text-center border-left border-bottom">{{$sample->score->{'2b'}->raw}}</td>
            <td class="text-center border-left border-bottom">{{$sample->score->{'2b'}->br}}</td>
            <td class="border-bottom">
                <div class="score-chart" style="width: {{$sample->score->{'2b'}->br >= 60 ? 100 : (100 * $sample->score->{'2b'}->br) / 60}}%"></div>
            </td>
            <td class="border-bottom bg-style">
                <div class="score-chart" style="width: {{$sample->score->{'2b'}->br >= 75 ? 100 : ($sample->score->{'2b'}->br - 60 > 0 ? (100 * ($sample->score->{'2b'}->br - 60)) / 15 : 0)}}%"></div>
            </td>
            <td class="border-bottom bg-type">
                <div class="score-chart" style="width: {{$sample->score->{'2b'}->br >= 85 ? 100 : ($sample->score->{'2b'}->br - 75 > 0 ? (100 * ($sample->score->{'2b'}->br - 75)) / 10 : 0)}}%"></div>
            </td>
            <td class="border-left border-bottom bg-disorder">
                <div class="score-chart" style="width: {{$sample->score->{'2b'}->br >= 115 ? 100 : ($sample->score->{'2b'}->br - 85 > 0 ? (100 * ($sample->score->{'2b'}->br - 85)) / 30 : 0)}}%"></div>
            </td>
            <td class="border-bottom pr-2">افسرده</td>
        </tr>
        <tr>
            <td class="text-center border-left pr-3 pl-2">۳</td>
            <td class="text-center border-left border-bottom">{{$sample->score->{'3'}->raw}}</td>
            <td class="text-center border-left border-bottom">{{$sample->score->{'3'}->br}}</td>
            <td class="border-bottom">
                <div class="score-chart" style="width: {{$sample->score->{'3'}->br >= 60 ? 100 : (100 * $sample->score->{'3'}->br) / 60}}%"></div>
            </td>
            <td class="border-bottom bg-style">
                <div class="score-chart" style="width: {{$sample->score->{'3'}->br >= 75 ? 100 : ($sample->score->{'3'}->br - 60 > 0 ? (100 * ($sample->score->{'3'}->br - 60)) / 15 : 0)}}%"></div>
            </td>
            <td class="border-bottom bg-type">
                <div class="score-chart" style="width: {{$sample->score->{'3'}->br >= 85 ? 100 : ($sample->score->{'3'}->br - 75 > 0 ? (100 * ($sample->score->{'3'}->br - 75)) / 10 : 0)}}%"></div>
            </td>
            <td class="border-left border-bottom bg-disorder">
                <div class="score-chart" style="width: {{$sample->score->{'3'}->br >= 115 ? 100 : ($sample->score->{'3'}->br - 85 > 0 ? (100 * ($sample->score->{'3'}->br - 85)) / 30 : 0)}}%"></div>
            </td>
            <td class="border-bottom pr-2">وابسته</td>
        </tr>
        <tr>
            <td class="text-center border-left pr-3 pl-2">4</td>
            <td class="text-center border-left border-bottom">{{$sample->score->{'4'}->raw}}</td>
            <td class="text-center border-left border-bottom">{{$sample->score->{'4'}->br}}</td>
            <td class="border-bottom">
                <div class="score-chart" style="width: {{$sample->score->{'4'}->br >= 60 ? 100 : (100 * $sample->score->{'4'}->br) / 60}}%"></div>
            </td>
            <td class="border-bottom bg-style">
                <div class="score-chart" style="width: {{$sample->score->{'4'}->br >= 75 ? 100 : ($sample->score->{'4'}->br - 60 > 0 ? (100 * ($sample->score->{'4'}->br - 60)) / 15 : 0)}}%"></div>
            </td>
            <td class="border-bottom bg-type">
                <div class="score-chart" style="width: {{$sample->score->{'4'}->br >= 85 ? 100 : ($sample->score->{'4'}->br - 75 > 0 ? (100 * ($sample->score->{'4'}->br - 75)) / 10 : 0)}}%"></div>
            </td>
            <td class="border-left border-bottom bg-disorder">
                <div class="score-chart" style="width: {{$sample->score->{'4'}->br >= 115 ? 100 : ($sample->score->{'4'}->br - 85 > 0 ? (100 * ($sample->score->{'4'}->br - 85)) / 30 : 0)}}%"></div>
            </td>
            <td class="border-bottom pr-2">نمایشی</td>
        </tr>
        <tr>
            <td class="text-center border-left pr-3 pl-2">5</td>
            <td class="text-center border-left border-bottom">{{$sample->score->{'5'}->raw}}</td>
            <td class="text-center border-left border-bottom">{{$sample->score->{'5'}->br}}</td>
            <td class="border-bottom">
                <div class="score-chart" style="width: {{$sample->score->{'5'}->br >= 60 ? 100 : (100 * $sample->score->{'5'}->br) / 60}}%"></div>
            </td>
            <td class="border-bottom bg-style">
                <div class="score-chart" style="width: {{$sample->score->{'5'}->br >= 75 ? 100 : ($sample->score->{'5'}->br - 60 > 0 ? (100 * ($sample->score->{'5'}->br - 60)) / 15 : 0)}}%"></div>
            </td>
            <td class="border-bottom bg-type">
                <div class="score-chart" style="width: {{$sample->score->{'5'}->br >= 85 ? 100 : ($sample->score->{'5'}->br - 75 > 0 ? (100 * ($sample->score->{'5'}->br - 75)) / 10 : 0)}}%"></div>
            </td>
            <td class="border-left border-bottom bg-disorder">
                <div class="score-chart" style="width: {{$sample->score->{'5'}->br >= 115 ? 100 : ($sample->score->{'5'}->br - 85 > 0 ? (100 * ($sample->score->{'5'}->br - 85)) / 30 : 0)}}%"></div>
            </td>
            <td class="border-bottom pr-2">خودشیفته</td>
        </tr>
        <tr>
            <td class="text-center border-left pr-3 pl-2">6a</td>
            <td class="text-center border-left border-bottom">{{$sample->score->{'6a'}->raw}}</td>
            <td class="text-center border-left border-bottom">{{$sample->score->{'6a'}->br}}</td>
            <td class="border-bottom">
                <div class="score-chart" style="width: {{$sample->score->{'6a'}->br >= 60 ? 100 : (100 * $sample->score->{'6a'}->br) / 60}}%"></div>
            </td>
            <td class="border-bottom bg-style">
                <div class="score-chart" style="width: {{$sample->score->{'6a'}->br >= 75 ? 100 : ($sample->score->{'6a'}->br - 60 > 0 ? (100 * ($sample->score->{'6a'}->br - 60)) / 15 : 0)}}%"></div>
            </td>
            <td class="border-bottom bg-type">
                <div class="score-chart" style="width: {{$sample->score->{'6a'}->br >= 85 ? 100 : ($sample->score->{'6a'}->br - 75 > 0 ? (100 * ($sample->score->{'6a'}->br - 75)) / 10 : 0)}}%"></div>
            </td>
            <td class="border-left border-bottom bg-disorder">
                <div class="score-chart" style="width: {{$sample->score->{'6a'}->br >= 115 ? 100 : ($sample->score->{'6a'}->br - 85 > 0 ? (100 * ($sample->score->{'6a'}->br - 85)) / 30 : 0)}}%"></div>
            </td>
            <td class="border-bottom pr-2">ضداجتماعی</td>
        </tr>
        <tr>
            <td class="text-center border-left pr-3 pl-2">6b</td>
            <td class="text-center border-left border-bottom">{{$sample->score->{'6b'}->raw}}</td>
            <td class="text-center border-left border-bottom">{{$sample->score->{'6b'}->br}}</td>
            <td class="border-bottom">
                <div class="score-chart" style="width: {{$sample->score->{'6b'}->br >= 60 ? 100 : (100 * $sample->score->{'6b'}->br) / 60}}%"></div>
            </td>
            <td class="border-bottom bg-style">
                <div class="score-chart" style="width: {{$sample->score->{'6b'}->br >= 75 ? 100 : ($sample->score->{'6b'}->br - 60 > 0 ? (100 * ($sample->score->{'6b'}->br - 60)) / 15 : 0)}}%"></div>
            </td>
            <td class="border-bottom bg-type">
                <div class="score-chart" style="width: {{$sample->score->{'6b'}->br >= 85 ? 100 : ($sample->score->{'6b'}->br - 75 > 0 ? (100 * ($sample->score->{'6b'}->br - 75)) / 10 : 0)}}%"></div>
            </td>
            <td class="border-left border-bottom bg-disorder">
                <div class="score-chart" style="width: {{$sample->score->{'6b'}->br >= 115 ? 100 : ($sample->score->{'6b'}->br - 85 > 0 ? (100 * ($sample->score->{'6b'}->br - 85)) / 30 : 0)}}%"></div>
            </td>
            <td class="border-bottom pr-2">آزارگر</td>
        </tr>
        <tr>
            <td class="text-center border-left pr-3 pl-2">7</td>
            <td class="text-center border-left border-bottom">{{$sample->score->{'7'}->raw}}</td>
            <td class="text-center border-left border-bottom">{{$sample->score->{'7'}->br}}</td>
            <td class="border-bottom">
                <div class="score-chart" style="width: {{$sample->score->{'7'}->br >= 60 ? 100 : (100 * $sample->score->{'7'}->br) / 60}}%"></div>
            </td>
            <td class="border-bottom bg-style">
                <div class="score-chart" style="width: {{$sample->score->{'7'}->br >= 75 ? 100 : ($sample->score->{'7'}->br - 60 > 0 ? (100 * ($sample->score->{'7'}->br - 60)) / 15 : 0)}}%"></div>
            </td>
            <td class="border-bottom bg-type">
                <div class="score-chart" style="width: {{$sample->score->{'7'}->br >= 85 ? 100 : ($sample->score->{'7'}->br - 75 > 0 ? (100 * ($sample->score->{'7'}->br - 75)) / 10 : 0)}}%"></div>
            </td>
            <td class="border-left border-bottom bg-disorder">
                <div class="score-chart" style="width: {{$sample->score->{'7'}->br >= 115 ? 100 : ($sample->score->{'7'}->br - 85 > 0 ? (100 * ($sample->score->{'7'}->br - 85)) / 30 : 0)}}%"></div>
            </td>
            <td class="border-bottom pr-2">اجباری</td>
        </tr>
        <tr>
            <td class="text-center border-left pr-3 pl-2">8a</td>
            <td class="text-center border-left border-bottom">{{$sample->score->{'8a'}->raw}}</td>
            <td class="text-center border-left border-bottom">{{$sample->score->{'8a'}->br}}</td>
            <td class="border-bottom">
                <div class="score-chart" style="width: {{$sample->score->{'8a'}->br >= 60 ? 100 : (100 * $sample->score->{'8a'}->br) / 60}}%"></div>
            </td>
            <td class="border-bottom bg-style">
                <div class="score-chart" style="width: {{$sample->score->{'8a'}->br >= 75 ? 100 : ($sample->score->{'8a'}->br - 60 > 0 ? (100 * ($sample->score->{'8a'}->br - 60)) / 15 : 0)}}%"></div>
            </td>
            <td class="border-bottom bg-type">
                <div class="score-chart" style="width: {{$sample->score->{'8a'}->br >= 85 ? 100 : ($sample->score->{'8a'}->br - 75 > 0 ? (100 * ($sample->score->{'8a'}->br - 75)) / 10 : 0)}}%"></div>
            </td>
            <td class="border-left border-bottom bg-disorder">
                <div class="score-chart" style="width: {{$sample->score->{'8a'}->br >= 115 ? 100 : ($sample->score->{'8a'}->br - 85 > 0 ? (100 * ($sample->score->{'8a'}->br - 85)) / 30 : 0)}}%"></div>
            </td>
            <td class="border-bottom pr-2">منفی‌گرا</td>
        </tr>
        <tr class="border-split border-bottom">
            <td class="text-center border-left pr-3 pl-2">8b</td>
            <td class="text-center border-left">{{$sample->score->{'8b'}->raw}}</td>
            <td class="text-center border-left">{{$sample->score->{'8b'}->br}}</td>
            <td>
                <div class="score-chart" style="width: {{$sample->score->{'8b'}->br >= 60 ? 100 : (100 * $sample->score->{'8b'}->br) / 60}}%"></div>
            </td>
            <td class="bg-style">
                <div class="score-chart" style="width: {{$sample->score->{'8b'}->br >= 75 ? 100 : ($sample->score->{'8b'}->br - 60 > 0 ? (100 * ($sample->score->{'8b'}->br - 60)) / 15 : 0)}}%"></div>
            </td>
            <td class="bg-type">
                <div class="score-chart" style="width: {{$sample->score->{'8b'}->br >= 85 ? 100 : ($sample->score->{'8b'}->br - 75 > 0 ? (100 * ($sample->score->{'8b'}->br - 75)) / 10 : 0)}}%"></div>
            </td>
            <td class="border-left  bg-disorder">
                <div class="score-chart" style="width: {{$sample->score->{'8b'}->br >= 115 ? 100 : ($sample->score->{'8b'}->br - 85 > 0 ? (100 * ($sample->score->{'8b'}->br - 85)) / 30 : 0)}}%"></div>
            </td>
            <td class="pr-2">خودناکام‌ساز</td>
        </tr>

        <tr>
            <td class="border-bottom border-split" rowspan="3">
                آسیب‌شناسی شدید شخصیت
            </td>
            <td class="text-center border-left pr-3 pl-2">S</td>
            <td class="text-center border-left border-bottom" style="width: 1.5cm">{{$sample->score->{'s'}->raw}}</td>
            <td class="text-center border-left border-bottom" style="width: 1.5cm">{{$sample->score->{'s'}->br}}</td>
            <td class="border-bottom">
                <div class="score-chart" style="width: {{$sample->score->{'s'}->br >= 60 ? 100 : (100 * $sample->score->{'s'}->br) / 60}}%"></div>
            </td>
            <td class="border-bottom bg-style">
                <div class="score-chart" style="width: {{$sample->score->{'s'}->br >= 75 ? 100 : ($sample->score->{'s'}->br - 60 > 0 ? (100 * ($sample->score->{'s'}->br - 60)) / 15 : 0)}}%"></div>
            </td>
            <td class="border-bottom bg-type">
                <div class="score-chart" style="width: {{$sample->score->{'s'}->br >= 85 ? 100 : ($sample->score->{'s'}->br - 75 > 0 ? (100 * ($sample->score->{'s'}->br - 75)) / 10 : 0)}}%"></div>
            </td>
            <td class="border-left border-bottom bg-disorder">
                <div class="score-chart" style="width: {{$sample->score->{'s'}->br >= 115 ? 100 : ($sample->score->{'s'}->br - 85 > 0 ? (100 * ($sample->score->{'s'}->br - 85)) / 30 : 0)}}%"></div>
            </td>
            <td class="border-bottom pr-2">اسکیزوتایپی</td>
        </tr>
        <tr>
            <td class="text-center border-left pr-3 pl-2">C</td>
            <td class="text-center border-left border-bottom">{{$sample->score->{'c'}->raw}}</td>
            <td class="text-center border-left border-bottom">{{$sample->score->{'c'}->br}}</td>
            <td class="border-bottom">
                <div class="score-chart" style="width: {{$sample->score->{'c'}->br >= 60 ? 100 : (100 * $sample->score->{'c'}->br) / 60}}%"></div>
            </td>
            <td class="border-bottom bg-style">
                <div class="score-chart" style="width: {{$sample->score->{'c'}->br >= 75 ? 100 : ($sample->score->{'c'}->br - 60 > 0 ? (100 * ($sample->score->{'c'}->br - 60)) / 15 : 0)}}%"></div>
            </td>
            <td class="border-bottom bg-type">
                <div class="score-chart" style="width: {{$sample->score->{'c'}->br >= 85 ? 100 : ($sample->score->{'c'}->br - 75 > 0 ? (100 * ($sample->score->{'c'}->br - 75)) / 10 : 0)}}%"></div>
            </td>
            <td class="border-left border-bottom bg-disorder">
                <div class="score-chart" style="width: {{$sample->score->{'c'}->br >= 115 ? 100 : ($sample->score->{'c'}->br - 85 > 0 ? (100 * ($sample->score->{'c'}->br - 85)) / 30 : 0)}}%"></div>
            </td>
            <td class="border-bottom pr-2">مرزی</td>
        </tr>
        <tr class="border-split border-bottom">
            <td class="text-center border-left pr-3 pl-2">P</td>
            <td class="text-center border-left">{{$sample->score->{'p'}->raw}}</td>
            <td class="text-center border-left">{{$sample->score->{'p'}->br}}</td>
            <td>
                <div class="score-chart" style="width: {{$sample->score->{'p'}->br >= 60 ? 100 : (100 * $sample->score->{'p'}->br) / 60}}%"></div>
            </td>
            <td class="bg-style">
                <div class="score-chart" style="width: {{$sample->score->{'p'}->br >= 75 ? 100 : ($sample->score->{'p'}->br - 60 > 0 ? (100 * ($sample->score->{'p'}->br - 60)) / 15 : 0)}}%"></div>
            </td>
            <td class="bg-type">
                <div class="score-chart" style="width: {{$sample->score->{'p'}->br >= 85 ? 100 : ($sample->score->{'p'}->br - 75 > 0 ? (100 * ($sample->score->{'p'}->br - 75)) / 10 : 0)}}%"></div>
            </td>
            <td class="border-left  bg-disorder">
                <div class="score-chart" style="width: {{$sample->score->{'p'}->br >= 115 ? 100 : ($sample->score->{'p'}->br - 85 > 0 ? (100 * ($sample->score->{'p'}->br - 85)) / 30 : 0)}}%"></div>
            </td>
            <td class="pr-2">پارانوئید</td>
        </tr>

        <tr>
            <td class="border-bottom border-split" rowspan="7">
                نشانگان بالینی
            </td>
            <td class="text-center border-left pr-3 pl-2">A</td>
            <td class="text-center border-left border-bottom" style="width: 1.5cm">{{$sample->score->{'a'}->raw}}</td>
            <td class="text-center border-left border-bottom" style="width: 1.5cm">{{$sample->score->{'a'}->br}}</td>
            <td class="border-bottom">
                <div class="score-chart" style="width: {{$sample->score->{'a'}->br >= 60 ? 100 : (100 * $sample->score->{'a'}->br) / 60}}%"></div>
            </td>
            <td class="border-bottom bg-style">
                <div class="score-chart" style="width: {{$sample->score->{'a'}->br >= 75 ? 100 : ($sample->score->{'a'}->br - 60 > 0 ? (100 * ($sample->score->{'a'}->br - 60)) / 15 : 0)}}%"></div>
            </td>
            <td class="border-bottom bg-type">
                <div class="score-chart" style="width: {{$sample->score->{'a'}->br >= 85 ? 100 : ($sample->score->{'a'}->br - 75 > 0 ? (100 * ($sample->score->{'a'}->br - 75)) / 10 : 0)}}%"></div>
            </td>
            <td class="border-left border-bottom bg-disorder">
                <div class="score-chart" style="width: {{$sample->score->{'a'}->br >= 115 ? 100 : ($sample->score->{'a'}->br - 85 > 0 ? (100 * ($sample->score->{'a'}->br - 85)) / 30 : 0)}}%"></div>
            </td>
            <td class="border-bottom pr-2">اضطراب</td>
        </tr>
        <tr>
            <td class="text-center border-left pr-3 pl-2">H</td>
            <td class="text-center border-left border-bottom">{{$sample->score->{'h'}->raw}}</td>
            <td class="text-center border-left border-bottom">{{$sample->score->{'h'}->br}}</td>
            <td class="border-bottom">
                <div class="score-chart" style="width: {{$sample->score->{'h'}->br >= 60 ? 100 : (100 * $sample->score->{'h'}->br) / 60}}%"></div>
            </td>
            <td class="border-bottom bg-style">
                <div class="score-chart" style="width: {{$sample->score->{'h'}->br >= 75 ? 100 : ($sample->score->{'h'}->br - 60 > 0 ? (100 * ($sample->score->{'h'}->br - 60)) / 15 : 0)}}%"></div>
            </td>
            <td class="border-bottom bg-type">
                <div class="score-chart" style="width: {{$sample->score->{'h'}->br >= 85 ? 100 : ($sample->score->{'h'}->br - 75 > 0 ? (100 * ($sample->score->{'h'}->br - 75)) / 10 : 0)}}%"></div>
            </td>
            <td class="border-left border-bottom bg-disorder">
                <div class="score-chart" style="width: {{$sample->score->{'h'}->br >= 115 ? 100 : ($sample->score->{'h'}->br - 85 > 0 ? (100 * ($sample->score->{'h'}->br - 85)) / 30 : 0)}}%"></div>
            </td>
            <td class="border-bottom pr-2">شبه‌جسمی</td>
        </tr>
        <tr>
            <td class="text-center border-left pr-3 pl-2">N</td>
            <td class="text-center border-left border-bottom">{{$sample->score->{'n'}->raw}}</td>
            <td class="text-center border-left border-bottom">{{$sample->score->{'n'}->br}}</td>
            <td class="border-bottom">
                <div class="score-chart" style="width: {{$sample->score->{'n'}->br >= 60 ? 100 : (100 * $sample->score->{'n'}->br) / 60}}%"></div>
            </td>
            <td class="border-bottom bg-style">
                <div class="score-chart" style="width: {{$sample->score->{'n'}->br >= 75 ? 100 : ($sample->score->{'n'}->br - 60 > 0 ? (100 * ($sample->score->{'n'}->br - 60)) / 15 : 0)}}%"></div>
            </td>
            <td class="border-bottom bg-type">
                <div class="score-chart" style="width: {{$sample->score->{'n'}->br >= 85 ? 100 : ($sample->score->{'n'}->br - 75 > 0 ? (100 * ($sample->score->{'n'}->br - 75)) / 10 : 0)}}%"></div>
            </td>
            <td class="border-left border-bottom bg-disorder">
                <div class="score-chart" style="width: {{$sample->score->{'n'}->br >= 115 ? 100 : ($sample->score->{'n'}->br - 85 > 0 ? (100 * ($sample->score->{'n'}->br - 85)) / 30 : 0)}}%"></div>
            </td>
            <td class="border-bottom pr-2">دوقطبی؛ مانیا</td>
        </tr>
        <tr>
            <td class="text-center border-left pr-3 pl-2">D</td>
            <td class="text-center border-left border-bottom">{{$sample->score->{'d'}->raw}}</td>
            <td class="text-center border-left border-bottom">{{$sample->score->{'d'}->br}}</td>
            <td class="border-bottom">
                <div class="score-chart" style="width: {{$sample->score->{'d'}->br >= 60 ? 100 : (100 * $sample->score->{'d'}->br) / 60}}%"></div>
            </td>
            <td class="border-bottom bg-style">
                <div class="score-chart" style="width: {{$sample->score->{'d'}->br >= 75 ? 100 : ($sample->score->{'d'}->br - 60 > 0 ? (100 * ($sample->score->{'d'}->br - 60)) / 15 : 0)}}%"></div>
            </td>
            <td class="border-bottom bg-type">
                <div class="score-chart" style="width: {{$sample->score->{'d'}->br >= 85 ? 100 : ($sample->score->{'d'}->br - 75 > 0 ? (100 * ($sample->score->{'d'}->br - 75)) / 10 : 0)}}%"></div>
            </td>
            <td class="border-left border-bottom bg-disorder">
                <div class="score-chart" style="width: {{$sample->score->{'d'}->br >= 115 ? 100 : ($sample->score->{'d'}->br - 85 > 0 ? (100 * ($sample->score->{'d'}->br - 85)) / 30 : 0)}}%"></div>
            </td>
            <td class="border-bottom pr-2">افسرده‌خویی</td>
        </tr>
        <tr>
            <td class="text-center border-left pr-3 pl-2">B</td>
            <td class="text-center border-left border-bottom">{{$sample->score->{'b'}->raw}}</td>
            <td class="text-center border-left border-bottom">{{$sample->score->{'b'}->br}}</td>
            <td class="border-bottom">
                <div class="score-chart" style="width: {{$sample->score->{'b'}->br >= 60 ? 100 : (100 * $sample->score->{'b'}->br) / 60}}%"></div>
            </td>
            <td class="border-bottom bg-style">
                <div class="score-chart" style="width: {{$sample->score->{'b'}->br >= 75 ? 100 : ($sample->score->{'b'}->br - 60 > 0 ? (100 * ($sample->score->{'b'}->br - 60)) / 15 : 0)}}%"></div>
            </td>
            <td class="border-bottom bg-type">
                <div class="score-chart" style="width: {{$sample->score->{'b'}->br >= 85 ? 100 : ($sample->score->{'b'}->br - 75 > 0 ? (100 * ($sample->score->{'b'}->br - 75)) / 10 : 0)}}%"></div>
            </td>
            <td class="border-left border-bottom bg-disorder">
                <div class="score-chart" style="width: {{$sample->score->{'b'}->br >= 115 ? 100 : ($sample->score->{'b'}->br - 85 > 0 ? (100 * ($sample->score->{'b'}->br - 85)) / 30 : 0)}}%"></div>
            </td>
            <td class="border-bottom pr-2">وابستگی به الکل</td>
        </tr>
        <tr>
            <td class="text-center border-left pr-3 pl-2">T</td>
            <td class="text-center border-left border-bottom">{{$sample->score->{'t'}->raw}}</td>
            <td class="text-center border-left border-bottom">{{$sample->score->{'t'}->br}}</td>
            <td class="border-bottom">
                <div class="score-chart" style="width: {{$sample->score->{'t'}->br >= 60 ? 100 : (100 * $sample->score->{'t'}->br) / 60}}%"></div>
            </td>
            <td class="border-bottom bg-style">
                <div class="score-chart" style="width: {{$sample->score->{'t'}->br >= 75 ? 100 : ($sample->score->{'t'}->br - 60 > 0 ? (100 * ($sample->score->{'t'}->br - 60)) / 15 : 0)}}%"></div>
            </td>
            <td class="border-bottom bg-type">
                <div class="score-chart" style="width: {{$sample->score->{'t'}->br >= 85 ? 100 : ($sample->score->{'t'}->br - 75 > 0 ? (100 * ($sample->score->{'t'}->br - 75)) / 10 : 0)}}%"></div>
            </td>
            <td class="border-left border-bottom bg-disorder">
                <div class="score-chart" style="width: {{$sample->score->{'t'}->br >= 115 ? 100 : ($sample->score->{'t'}->br - 85 > 0 ? (100 * ($sample->score->{'t'}->br - 85)) / 30 : 0)}}%"></div>
            </td>
            <td class="border-bottom pr-2">وابستگی به مواد</td>
        </tr>
        <tr class="border-split border-bottom">
            <td class="text-center border-left pr-3 pl-2">R</td>
            <td class="text-center border-left">{{$sample->score->{'r'}->raw}}</td>
            <td class="text-center border-left">{{$sample->score->{'r'}->br}}</td>
            <td>
                <div class="score-chart" style="width: {{$sample->score->{'r'}->br >= 60 ? 100 : (100 * $sample->score->{'r'}->br) / 60}}%"></div>
            </td>
            <td class="bg-style">
                <div class="score-chart" style="width: {{$sample->score->{'r'}->br >= 75 ? 100 : ($sample->score->{'r'}->br - 60 > 0 ? (100 * ($sample->score->{'r'}->br - 60)) / 15 : 0)}}%"></div>
            </td>
            <td class="bg-type">
                <div class="score-chart" style="width: {{$sample->score->{'r'}->br >= 85 ? 100 : ($sample->score->{'r'}->br - 75 > 0 ? (100 * ($sample->score->{'r'}->br - 75)) / 10 : 0)}}%"></div>
            </td>
            <td class="border-left  bg-disorder">
                <div class="score-chart" style="width: {{$sample->score->{'r'}->br >= 115 ? 100 : ($sample->score->{'r'}->br - 85 > 0 ? (100 * ($sample->score->{'r'}->br - 85)) / 30 : 0)}}%"></div>
            </td>
            <td class="pr-2">اختلال استرس پس از حادثه</td>
        </tr>

        <tr>
            <td rowspan="3" class="border-bottom border-split">
                نشانگان شدید
            </td>
            <td class="text-center border-left pr-3 pl-2">SS</td>
            <td class="text-center border-left border-bottom" style="width: 1.5cm">{{$sample->score->{'ss'}->raw}}</td>
            <td class="text-center border-left border-bottom" style="width: 1.5cm">{{$sample->score->{'ss'}->br}}</td>
            <td class="border-bottom">
                <div class="score-chart" style="width: {{$sample->score->{'ss'}->br >= 60 ? 100 : (100 * $sample->score->{'ss'}->br) / 60}}%"></div>
            </td>
            <td class="border-bottom bg-style">
                <div class="score-chart" style="width: {{$sample->score->{'ss'}->br >= 75 ? 100 : ($sample->score->{'ss'}->br - 60 > 0 ? (100 * ($sample->score->{'ss'}->br - 60)) / 15 : 0)}}%"></div>
            </td>
            <td class="border-bottom bg-type">
                <div class="score-chart" style="width: {{$sample->score->{'ss'}->br >= 85 ? 100 : ($sample->score->{'ss'}->br - 75 > 0 ? (100 * ($sample->score->{'ss'}->br - 75)) / 10 : 0)}}%"></div>
            </td>
            <td class="border-left border-bottom bg-disorder">
                <div class="score-chart" style="width: {{$sample->score->{'ss'}->br >= 115 ? 100 : ($sample->score->{'ss'}->br - 85 > 0 ? (100 * ($sample->score->{'ss'}->br - 85)) / 30 : 0)}}%"></div>
            </td>
            <td class="border-bottom pr-2">اختلال تفکر</td>
        </tr>
        <tr>
            <td class="text-center border-left pr-3 pl-2">CC</td>
            <td class="text-center border-left border-bottom">{{$sample->score->{'cc'}->raw}}</td>
            <td class="text-center border-left border-bottom">{{$sample->score->{'cc'}->br}}</td>
            <td class="border-bottom">
                <div class="score-chart" style="width: {{$sample->score->{'cc'}->br >= 60 ? 100 : (100 * $sample->score->{'cc'}->br) / 60}}%"></div>
            </td>
            <td class="border-bottom bg-style">
                <div class="score-chart" style="width: {{$sample->score->{'cc'}->br >= 75 ? 100 : ($sample->score->{'cc'}->br - 60 > 0 ? (100 * ($sample->score->{'cc'}->br - 60)) / 15 : 0)}}%"></div>
            </td>
            <td class="border-bottom bg-type">
                <div class="score-chart" style="width: {{$sample->score->{'cc'}->br >= 85 ? 100 : ($sample->score->{'cc'}->br - 75 > 0 ? (100 * ($sample->score->{'cc'}->br - 75)) / 10 : 0)}}%"></div>
            </td>
            <td class="border-left border-bottom bg-disorder">
                <div class="score-chart" style="width: {{$sample->score->{'cc'}->br >= 115 ? 100 : ($sample->score->{'cc'}->br - 85 > 0 ? (100 * ($sample->score->{'cc'}->br - 85)) / 30 : 0)}}%"></div>
            </td>
            <td class="border-bottom pr-2">افسردگی اساسی</td>
        </tr>
        <tr class="border-bottom border-split">
            <td class="text-center border-left pr-3 pl-2">PP</td>
            <td class="text-center border-left">{{$sample->score->{'pp'}->raw}}</td>
            <td class="text-center border-left">{{$sample->score->{'pp'}->br}}</td>
            <td>
                <div class="score-chart" style="width: {{$sample->score->{'pp'}->br >= 60 ? 100 : (100 * $sample->score->{'pp'}->br) / 60}}%"></div>
            </td>
            <td class=" bg-style">
                <div class="score-chart" style="width: {{$sample->score->{'pp'}->br >= 75 ? 100 : ($sample->score->{'pp'}->br - 60 > 0 ? (100 * ($sample->score->{'pp'}->br - 60)) / 15 : 0)}}%"></div>
            </td>
            <td class=" bg-type">
                <div class="score-chart" style="width: {{$sample->score->{'pp'}->br >= 85 ? 100 : ($sample->score->{'pp'}->br - 75 > 0 ? (100 * ($sample->score->{'pp'}->br - 75)) / 10 : 0)}}%"></div>
            </td>
            <td class="border-left bg-disorder">
                <div class="score-chart" style="width: {{$sample->score->{'pp'}->br >= 115 ? 100 : ($sample->score->{'pp'}->br - 85 > 0 ? (100 * ($sample->score->{'pp'}->br - 85)) / 30 : 0)}}%"></div>
            </td>
            <td class=" pr-2">اختلال هذیان</td>
        </tr>
    </table>
</div>
