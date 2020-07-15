@php
    $score = $sample->score;
    $groups = [
        'n' => [
            'title' => 'روان‌آزرده‌گرایی',
            'x' => '328',
            'y' => 0,
            'subs' => [
                'n1' => 'اضطراب',
                'n2' => 'خصومت',
                'n3' => 'افسردگی',
                'n4' => 'کم‌رویی',
                'n5' => 'تکانش‌گری',
                'n6' => 'آسیب‌پذیری'
            ]
        ],
        'e' => [
            'title' => 'برون‌گرایی',
            'x' => 0,
            'y' => 0,
            'subs' => [
                'e1' => 'گرم',
                'e2' => 'معاشرتی',
                'e3' => 'ابرازوجود',
                'e4' => 'فعال',
                'e5' => 'هیجان‌خواهی',
                'e6' => 'هیجان مثبت'
            ]
        ],
        'o' => [
            'title' => 'گشودگی',
            'x' => '328',
            'y' => '218',
            'subs' => [
                'o1' => 'تخیل',
                'o2' => 'زیبایی‌شناسی',
                'o3' => 'احساسات',
                'o4' => 'کنش‌ها',
                'o5' => 'دیدگاه‌ها',
                'o6' => 'ارزش‌ها'
            ]
        ],
        'a' => [
            'title' => 'موافق بودن',
            'x' => 0,
            'y'=> '218',
            'subs' => [
                'a1' => 'اعتماد',
                'a2' => 'رک‌گویی',
                'a3' => 'نوع‌دوستی',
                'a4' => 'همراهی',
                'a5' => 'تواضع',
                'a6' => 'دلرحم'
            ]
        ],
        'c' => [
            'title' => 'باوجدان بودن',
            'x' => '328',
            'y'=> '436',
            'subs' => [
                'c1' => 'شایستگی',
                'c2' => 'نظم و ترتیب',
                'c3' => 'وظیفه‌شناسی',
                'c4' => 'تلاش برای موفقیت',
                'c5' => 'خویشتن‌داری',
                'c6' => 'محتاط'
            ]
        ]
    ];
    $options = ['کاملا موافقم', 'موافقم', 'نظری ندارم', 'مخالفم', 'کاملا مخالفم'];
@endphp
<?xml version="1.0" encoding="utf-8"?>
<svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 644 644" xml:space="preserve">
    <style>
        @font-face {
            font-family:Dana-fanum;
            font-style: normal;
            font-weight: normal;
            src: url("data:application/font-woff;base64,{{base64_encode(file_get_contents(public_path('fonts/Dana/woff/dana-fanum-regular.woff')))}}")
        }
        text{
            font-family:Dana-fanum;
            font-size: .4rem;
            text-align: right;
            direction: rtl;
        }
        .factor_n .color{
            fill: #d26b6b;
        }
        .factor_c .color{
            fill: #d2a343;
        }
        .factor_o .color{
            fill: #43b8d2;
        }
        .factor_a .color{
            fill: #43d251;
        }
        .factor_e .color{
            fill: #8443d2;
        }
        .level1{
            opacity: .2;
        }
        .level2{
            opacity: .4;
        }
        .level3{
            opacity: .6;
        }
        .level4{
            opacity: .8;
        }
        .level5{
            opacity: 1;
        }

    </style>
    <rect  y="0" fill="#ffffff" height="644" width="644" x="0"/>
    @foreach ($groups as $key => $factor)
        <svg class="factor_{{$key}}" height="208" width="316" x="{{$factor['x']}}" y="{{$factor['y']}}">
            <g class="rows">
                <rect class="color level{{$score->$key}}" transform="rotate(180 158 208)" height="{{($score->$key + 2) * 26}}" width="316" y="208" x="0"/>


                <rect y="26" fill="#b1b1b1" height="26" width="260" x="56" stroke="none"></rect>
                <rect y="52" fill="#e0e0e0" height="26" width="260" x="56" stroke="none"></rect>
                <rect y="78" fill="#f7f7f7" height="26" width="260" x="56" stroke="none"></rect>
                <rect y="104" fill="#f9f9f9" height="26" width="260" x="56" stroke="none"></rect>
                <rect y="130" fill="#ffffff" height="26" width="260" x="56" stroke="none"></rect>
                <rect  y="156" fill="#ffffff" height="26" width="260" x="56"/>

                <line y1="52" y2="52" x1="316" x2="0" stroke-width="0.5px" stroke="#ababab"></line>
                <line y1="78" y2="78" x1="316" x2="0" stroke-width="0.5px" stroke="#ababab"></line>
                <line y1="104" y2="104" x1="316" x2="0" stroke-width="0.5px" stroke="#ababab"></line>
                <line y1="130" y2="130" x1="316" x2="0" stroke-width="0.5px" stroke="#ababab"></line>
                <line y1="156" y2="156" x1="316" x2="0" stroke-width="0.5px" stroke="#ababab"></line>

            </g>
            <g>
                @for ($i = 1; $i <= 6; $i++)
                    <rect x="{{63.5 + (($i-1) * 44.5)}}" y="156" transform="rotate(180 {{12.5 + 63.5 + (($i-1) * 44.5)}} 156)" class="color level{{ $score->{$key . $i} }}" height="{{$score->{$key . $i} * 26}}" width="25" />
                @endfor
            </g>
            <g class="x_title">
                <text y="41" x="40">خیلی زیاد</text>
                <text y="67" x="40">زیاد</text>
                <text y="93" x="40">متوسط</text>
                <text y="119" x="40">کم</text>
                <text y="145" x="40">خیلی کم</text>

                    @for ($i = 1; $i <= 6; $i++)
                    <text dominant-baseline="middle" text-anchor="middle" y="165" x="{{76 + (44.5 * ($i-1))}}">
                        {{ucfirst($key) . $i}}
                        @if ($score->{$key . $i . '_null'} > 3)
                            !
                        @endif
                    </text>
                    <text dominant-baseline="middle" text-anchor="middle" y="150" x="{{76 + (44.5 * ($i-1))}}">{{$score->{$key . $i . '_raw'} }}</text>
                    <text direction="ltr" y="2" x="{{76 + (44.5 * ($i-1))}}" transform='rotate(-90 {{76 + (44.5 * ($i-1))}} 2)'>{{$factor['subs'][$key.$i]}}</text>
                @endfor
                <text dominant-baseline="middle" text-anchor="middle" y="196" x="158" font-weight="bold">{{$factor['title']}} ({{ucfirst($key)}})</text>
                <text dominant-baseline="middle" text-anchor="middle" y="165" x="28" font-weight="bold">{{$score->{$key .  '_raw'} }}</text>
            </g>
        </svg>
    @endforeach
    <svg height="208" width="316" y="{{last($groups)['y']}}">
        @php
            $row = 1;
        @endphp

        <text y="{{13 + (15 * (($row++) - 1))}}" x="316">
            <tspan>
                {{$score->count_option_3}}
            </tspan>
            <tspan>پاسخ</tspan>
            <tspan>
                «نظری ندارم»
            </tspan>
            @if ($score->count_option_3 > 41)
                <tspan fill="#e63c3c">⊝ نامعتر</tspan>
            @endif
        </text>

        <text y="{{13 + (15 * (($row++) - 1))}}" x="316">
            <tspan>
                {{$score->count_option_1 + $score->count_option_2}}
            </tspan>
            <tspan>پاسخ</tspan>
            <tspan>
                «موافق»
            </tspan>
            @if ($score->count_option_1 + $score->count_option_2 > 150)
                <tspan fill="#e63c3c">⊝ نامعتر</tspan>
            @endif
        </text>

        <text y="{{13 + (15 * (($row++) - 1))}}" x="316">
            <tspan>
                {{$score->count_option_4 + $score->count_option_5}}
            </tspan>
            <tspan>پاسخ</tspan>
            <tspan>
                «مخالف»
            </tspan>
            @if ($score->count_option_1 + $score->count_option_2 < 50)
                <tspan fill="#e63c3c">⊝ نامعتر</tspan>
            @endif
        </text>

        @php
            $invalid = 0;
        @endphp
        @for ($i = 1; $i <=3; $i++)
            @if (!$score->{'vq_' . $i})
                @php
                    $invalid = 1;
                @endphp
                <text fill="#e63c3c" y="{{13 + (15 * (($row++) - 1))}}" x="316">⊝ نامعتبر در پاسخ سؤال اعتبارسنجی {{$i}}</text>
            @endif
        @endfor

        @if (!$invalid)
            <text y="{{13 + (15 * (($row++) - 1))}}" x="316">نسبت به سؤالات اضافی معتبر است</text>
        @endif

        @php
            $invalid = 0;
        @endphp
        @for ($i = 1; $i <=5; $i++)
            @if (!$score->{'voption_' . $i})
                @php
                    $invalid = 1;
                @endphp
                <text fill="#e63c3c" y="{{13 + (15 * (($row++) - 1))}}" x="316">⊝ نامعتبر به دلیل پاسخ‌های تصادفی «{{$options[$i-1]}}»</text>
            @endif
        @endfor
        @if (!$invalid)
            <text y="{{13 + (15 * (($row++) - 1))}}" x="316">نسبت به پاسخ‌های تصادفی معتبر است</text>
        @endif
    </svg>
</svg>
