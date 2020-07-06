<style>
    .group{
        height: 7cm;
    }
    .rows line{
        stroke-width: .5px;
        stroke:#ababab;
    }
    .x_title text{
        font-size: 10px;
    }
    .back_rows rect, rect.origin{
        stroke-width: .5px;
        stroke: #737373;
        transform-box: fill-box;
        transform-origin: top;
        transform: rotate(180deg);
    }
    .x_title text:nth-of-type(6){
        font-weight: bold;
    }
    rect.origin{
        stroke-width: 0;
        stroke: none;
    }
    .back_rows text{
        font-size: 12px;
    }
    .factor_n .back_rows rect, .factor_n rect.origin{
        fill: #d26b6b;
    }
    .factor_c .back_rows rect, .factor_c rect.origin{
        fill: #d2a343;
    }
    .factor_o .back_rows rect, .factor_o rect.origin{
        fill: #43b8d2;
    }
    .factor_a .back_rows rect, .factor_a rect.origin{
        fill: #43d251;
    }
    .factor_e .back_rows rect, .factor_e rect.origin{
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
    .deg90{
        transform-box: fill-box;
        transform-origin: right;
        transform: rotate(270deg);
        font-size: 10px !important;
        fill:#ffffff;
        /* font-weight: bold; */
    }
</style>
<div class="page" id="profile">
    @includeWhen(request()->has('single'), 'dashboard.samples.profiles.top-header')
    <div class="row">
        {{-- Factor N --}}
        <div class="col-5 group m-4 factor_n">
            <svg width="10cm" height="100%" xmlns="http://www.w3.org/2000/svg">
                <g class="rows">
                    <rect class="origin level{{$sample->score->n}}" height="{{$sample->score->n + 2}}cm" width="100%" y="7cm" x="0"/>
                    <rect height="1cm" width="8.4cm" y="0cm" x="1.7cm" fill="#b1b1b1"/>
                    <line y2="1cm" x2="0" y1="1cm" x1="100%"/>
                    <rect height="1cm" width="8.4cm" y="1cm" x="1.7cm" fill="#e0e0e0"/>
                    <line y2="2cm" x2="0" y1="2cm" x1="100%"/>
                    <rect height="1cm" width="8.4cm" y="2cm" x="1.7cm" fill="#f7f7f7"/>
                    <line y2="3cm" x2="0" y1="3cm" x1="100%"/>
                    <rect height="1cm" width="8.4cm" y="3cm" x="1.7cm" fill="#f9f9f9"/>
                    <line y2="4cm" x2="0" y1="4cm" x1="100%"/>
                    <rect height="2cm" width="8.4cm" y="4cm" x="1.7cm" fill="#ffffff"/>
                    <line y2="5cm" x2="0" y1="5cm" x1="100%"/>
                </g>
                <g class="x_title">
                        <text y=".5cm" x="1.3cm">خیلی زیاد</text>
                        <text y="1.5cm" x="1.3cm">زیاد</text>
                        <text y="2.5cm" x="1.3cm">متوسط</text>
                        <text y="3.5cm" x="1.3cm">کم</text>
                        <text y="4.5cm" x="1.3cm">خیلی کم</text>
                        <text y="6.5cm" x="6.5cm">روان‌آزرده‌گرایی (N)</text>
                        <text y="5.5cm" x="2.65cm">N1</text>
                        <text y="5.5cm" x="4.05cm">N2</text>
                        <text y="5.5cm" x="5.45cm">N3</text>
                        <text y="5.5cm" x="6.85cm">N4</text>
                        <text y="5.5cm" x="8.25cm">N5</text>
                        <text y="5.5cm" x="9.65cm">N6</text>
                </g>
                <g class="back_rows">
                    <rect class="level{{$sample->score->n1}}" height="{{$sample->score->n1}}cm" width=".7cm" y="5cm" x="2.1cm"/>
                    <text y="4.9cm" x="2.65cm">{{$sample->score->n1_raw}}</text>
                    <text class="deg90" y=".1cm" x="2.5cm">اضطراب</text>
                    <rect class="level{{$sample->score->n2}}" height="{{$sample->score->n2}}cm" width=".7cm" y="5cm" x="3.5cm"/>
                    <text y="4.9cm" x="4.05cm">{{$sample->score->n2_raw}}</text>
                    <text class="deg90" y=".1cm" x="3.8cm">خصومت</text>
                    <rect class="level{{$sample->score->n3}}" height="{{$sample->score->n3}}cm" width=".7cm" y="5cm" x="4.9cm"/>
                    <text y="4.9cm" x="5.45cm">{{$sample->score->n3_raw}}</text>
                    <text class="deg90" y=".1cm" x="5.25cm">افسردگی</text>
                    <rect class="level{{$sample->score->n4}}" height="{{$sample->score->n4}}cm" width=".7cm" y="5cm" x="6.3cm"/>
                    <text y="4.9cm" x="6.85cm">{{$sample->score->n4_raw}}</text>
                    <text class="deg90" y=".1cm" x="6.6cm">کم‌رویی</text>
                    <rect class="level{{$sample->score->n5}}" height="{{$sample->score->n5}}cm" width=".7cm" y="5cm" x="7.7cm"/>
                    <text y="4.9cm" x="8.25cm">{{$sample->score->n5_raw}}</text>
                    <text class="deg90" y=".1cm" x="8cm">تکانش‌گری</text>
                    <rect class="level{{$sample->score->n6}}" height="{{$sample->score->n6}}cm" width=".7cm" y="5cm" x="9.1cm"/>
                    <text y="4.9cm" x="9.65cm">{{$sample->score->n6_raw}}</text>
                    <text class="deg90" y=".1cm" x="9.4cm">آسیب‌پذیری</text>
                    <text y="5.5cm" x="1cm">{{$sample->score->n_raw}}</text>
                </g>
            </svg>
        </div>
        {{-- Factor E --}}
        <div class="col-5 group m-4 factor_e">
            <svg width="10cm" height="100%" xmlns="http://www.w3.org/2000/svg">
                <g class="rows">
                    <rect class="origin level{{$sample->score->e}}" height="{{$sample->score->e + 2}}cm" width="100%" y="7cm" x="0"/>
                    <rect height="1cm" width="8.4cm" y="0cm" x="1.7cm" fill="#b1b1b1"/>
                    <line y2="1cm" x2="0" y1="1cm" x1="100%"/>
                    <rect height="1cm" width="8.4cm" y="1cm" x="1.7cm" fill="#e0e0e0"/>
                    <line y2="2cm" x2="0" y1="2cm" x1="100%"/>
                    <rect height="1cm" width="8.4cm" y="2cm" x="1.7cm" fill="#f7f7f7"/>
                    <line y2="3cm" x2="0" y1="3cm" x1="100%"/>
                    <rect height="1cm" width="8.4cm" y="3cm" x="1.7cm" fill="#f9f9f9"/>
                    <line y2="4cm" x2="0" y1="4cm" x1="100%"/>
                    <rect height="2cm" width="8.4cm" y="4cm" x="1.7cm" fill="#ffffff"/>
                    <line y2="5cm" x2="0" y1="5cm" x1="100%"/>
                </g>
                <g class="x_title">
                        <text y=".5cm" x="1.3cm">خیلی زیاد</text>
                        <text y="1.5cm" x="1.3cm">زیاد</text>
                        <text y="2.5cm" x="1.3cm">متوسط</text>
                        <text y="3.5cm" x="1.3cm">کم</text>
                        <text y="4.5cm" x="1.3cm">خیلی کم</text>
                        <text y="6.5cm" x="6.5cm">برون‌گرایی (E)</text>
                        <text y="5.5cm" x="2.65cm">E1</text>
                        <text y="5.5cm" x="4.05cm">E2</text>
                        <text y="5.5cm" x="5.45cm">E3</text>
                        <text y="5.5cm" x="6.85cm">E4</text>
                        <text y="5.5cm" x="8.25cm">E5</text>
                        <text y="5.5cm" x="9.65cm">E6</text>
                </g>
                <g class="back_rows">
                    <rect class="level{{$sample->score->e1}}" height="{{$sample->score->e1}}cm" width=".7cm" y="5cm" x="2.1cm"/>
                    <text y="4.9cm" x="2.65cm">{{$sample->score->e1_raw}}</text>
                    <text class="deg90" y=".1cm" x="2.5cm">گرم</text>
                    <rect class="level{{$sample->score->e2}}" height="{{$sample->score->e2}}cm" width=".7cm" y="5cm" x="3.5cm"/>
                    <text y="4.9cm" x="4.05cm">{{$sample->score->e2_raw}}</text>
                    <text class="deg90" y=".1cm" x="3.8cm">معاشرتی</text>
                    <rect class="level{{$sample->score->e3}}" height="{{$sample->score->e3}}cm" width=".7cm" y="5cm" x="4.9cm"/>
                    <text y="4.9cm" x="5.45cm">{{$sample->score->e3_raw}}</text>
                    <text class="deg90" y=".1cm" x="5.25cm">ابرازوجود</text>
                    <rect class="level{{$sample->score->e4}}" height="{{$sample->score->e4}}cm" width=".7cm" y="5cm" x="6.3cm"/>
                    <text y="4.9cm" x="6.85cm">{{$sample->score->e4_raw}}</text>
                    <text class="deg90" y=".1cm" x="6.6cm">فعال</text>
                    <rect class="level{{$sample->score->e5}}" height="{{$sample->score->e5}}cm" width=".7cm" y="5cm" x="7.7cm"/>
                    <text y="4.9cm" x="8.25cm">{{$sample->score->e5_raw}}</text>
                    <text class="deg90" y=".1cm" x="8cm">هیجان‌خواهی</text>
                    <rect class="level{{$sample->score->e6}}" height="{{$sample->score->e6}}cm" width=".7cm" y="5cm" x="9.1cm"/>
                    <text y="4.9cm" x="9.65cm">{{$sample->score->e6_raw}}</text>
                    <text class="deg90" y=".1cm" x="9.4cm">هیجان مثبت</text>
                    <text y="5.5cm" x="1cm">{{$sample->score->e_raw}}</text>
                </g>
            </svg>
        </div>
        {{-- Factor O --}}
        <div class="col-5 group m-4 factor_o">
            <svg width="10cm" height="100%" xmlns="http://www.w3.org/2000/svg">
                <g class="rows">
                    <rect class="origin level{{$sample->score->o}}" height="{{$sample->score->o + 2}}cm" width="100%" y="7cm" x="0"/>
                    <rect height="1cm" width="8.4cm" y="0cm" x="1.7cm" fill="#b1b1b1"/>
                    <line y2="1cm" x2="0" y1="1cm" x1="100%"/>
                    <rect height="1cm" width="8.4cm" y="1cm" x="1.7cm" fill="#e0e0e0"/>
                    <line y2="2cm" x2="0" y1="2cm" x1="100%"/>
                    <rect height="1cm" width="8.4cm" y="2cm" x="1.7cm" fill="#f7f7f7"/>
                    <line y2="3cm" x2="0" y1="3cm" x1="100%"/>
                    <rect height="1cm" width="8.4cm" y="3cm" x="1.7cm" fill="#f9f9f9"/>
                    <line y2="4cm" x2="0" y1="4cm" x1="100%"/>
                    <rect height="2cm" width="8.4cm" y="4cm" x="1.7cm" fill="#ffffff"/>
                    <line y2="5cm" x2="0" y1="5cm" x1="100%"/>
                </g>
                <g class="x_title">
                        <text y=".5cm" x="1.3cm">خیلی زیاد</text>
                        <text y="1.5cm" x="1.3cm">زیاد</text>
                        <text y="2.5cm" x="1.3cm">متوسط</text>
                        <text y="3.5cm" x="1.3cm">کم</text>
                        <text y="4.5cm" x="1.3cm">خیلی کم</text>
                        <text y="6.5cm" x="6.5cm">گشودگی (O)</text>
                        <text y="5.5cm" x="2.65cm">O1</text>
                        <text y="5.5cm" x="4.05cm">O2</text>
                        <text y="5.5cm" x="5.45cm">O3</text>
                        <text y="5.5cm" x="6.85cm">O4</text>
                        <text y="5.5cm" x="8.25cm">O5</text>
                        <text y="5.5cm" x="9.65cm">O6</text>
                </g>
                <g class="back_rows">
                    <rect class="level{{$sample->score->o1}}" height="{{$sample->score->o1}}cm" width=".7cm" y="5cm" x="2.1cm"/>
                    <text y="4.9cm" x="2.65cm">{{$sample->score->o1_raw}}</text>
                    <text class="deg90" y=".1cm" x="2.5cm">تخیل</text>
                    <rect class="level{{$sample->score->o2}}" height="{{$sample->score->o2}}cm" width=".7cm" y="5cm" x="3.5cm"/>
                    <text y="4.9cm" x="4.05cm">{{$sample->score->o2_raw}}</text>
                    <text class="deg90" y=".1cm" x="3.8cm">زیبایی‌شناسی</text>
                    <rect class="level{{$sample->score->o3}}" height="{{$sample->score->o3}}cm" width=".7cm" y="5cm" x="4.9cm"/>
                    <text y="4.9cm" x="5.45cm">{{$sample->score->o3_raw}}</text>
                    <text class="deg90" y=".1cm" x="5.25cm">احساسات</text>
                    <rect class="level{{$sample->score->o4}}" height="{{$sample->score->o4}}cm" width=".7cm" y="5cm" x="6.3cm"/>
                    <text y="4.9cm" x="6.85cm">{{$sample->score->o4_raw}}</text>
                    <text class="deg90" y=".1cm" x="6.6cm">کنش‌ها</text>
                    <rect class="level{{$sample->score->o5}}" height="{{$sample->score->o5}}cm" width=".7cm" y="5cm" x="7.7cm"/>
                    <text y="4.9cm" x="8.25cm">{{$sample->score->o5_raw}}</text>
                    <text class="deg90" y=".1cm" x="8cm">دیدگاه‌ها</text>
                    <rect class="level{{$sample->score->o6}}" height="{{$sample->score->o6}}cm" width=".7cm" y="5cm" x="9.1cm"/>
                    <text y="4.9cm" x="9.65cm">{{$sample->score->o6_raw}}</text>
                    <text class="deg90" y=".1cm" x="9.4cm">ارزش‌ها</text>
                    <text y="5.5cm" x="1cm">{{$sample->score->o_raw}}</text>
                </g>
            </svg>
        </div>
        {{-- Factor A --}}
        <div class="col-5 group m-4 factor_a">
            <svg width="10cm" height="100%" xmlns="http://www.w3.org/2000/svg">
                <g class="rows">
                    <rect class="origin level{{$sample->score->a}}" height="{{$sample->score->a + 2}}cm" width="100%" y="7cm" x="0"/>
                    <rect height="1cm" width="8.4cm" y="0cm" x="1.7cm" fill="#b1b1b1"/>
                    <line y2="1cm" x2="0" y1="1cm" x1="100%"/>
                    <rect height="1cm" width="8.4cm" y="1cm" x="1.7cm" fill="#e0e0e0"/>
                    <line y2="2cm" x2="0" y1="2cm" x1="100%"/>
                    <rect height="1cm" width="8.4cm" y="2cm" x="1.7cm" fill="#f7f7f7"/>
                    <line y2="3cm" x2="0" y1="3cm" x1="100%"/>
                    <rect height="1cm" width="8.4cm" y="3cm" x="1.7cm" fill="#f9f9f9"/>
                    <line y2="4cm" x2="0" y1="4cm" x1="100%"/>
                    <rect height="2cm" width="8.4cm" y="4cm" x="1.7cm" fill="#ffffff"/>
                    <line y2="5cm" x2="0" y1="5cm" x1="100%"/>
                </g>
                <g class="x_title">
                        <text y=".5cm" x="1.3cm">خیلی زیاد</text>
                        <text y="1.5cm" x="1.3cm">زیاد</text>
                        <text y="2.5cm" x="1.3cm">متوسط</text>
                        <text y="3.5cm" x="1.3cm">کم</text>
                        <text y="4.5cm" x="1.3cm">خیلی کم</text>
                        <text y="6.5cm" x="6.5cm">موافق بودن (A)</text>
                        <text y="5.5cm" x="2.65cm">A1</text>
                        <text y="5.5cm" x="4.05cm">A2</text>
                        <text y="5.5cm" x="5.45cm">A3</text>
                        <text y="5.5cm" x="6.85cm">A4</text>
                        <text y="5.5cm" x="8.25cm">A5</text>
                        <text y="5.5cm" x="9.65cm">A6</text>
                </g>
                <g class="back_rows">
                    <rect class="level{{$sample->score->a1}}" height="{{$sample->score->a1}}cm" width=".7cm" y="5cm" x="2.1cm"/>
                    <text y="4.9cm" x="2.65cm">{{$sample->score->a1_raw}}</text>
                    <text class="deg90" y=".1cm" x="2.5cm">اعتماد</text>
                    <rect class="level{{$sample->score->a2}}" height="{{$sample->score->a2}}cm" width=".7cm" y="5cm" x="3.5cm"/>
                    <text y="4.9cm" x="4.05cm">{{$sample->score->a2_raw}}</text>
                    <text class="deg90" y=".1cm" x="3.8cm">رک‌گویی</text>
                    <rect class="level{{$sample->score->a3}}" height="{{$sample->score->a3}}cm" width=".7cm" y="5cm" x="4.9cm"/>
                    <text y="4.9cm" x="5.45cm">{{$sample->score->a3_raw}}</text>
                    <text class="deg90" y=".1cm" x="5.25cm">نوع‌دوستی</text>
                    <rect class="level{{$sample->score->a4}}" height="{{$sample->score->a4}}cm" width=".7cm" y="5cm" x="6.3cm"/>
                    <text y="4.9cm" x="6.85cm">{{$sample->score->a4_raw}}</text>
                    <text class="deg90" y=".1cm" x="6.6cm">همراهی</text>
                    <rect class="level{{$sample->score->a5}}" height="{{$sample->score->a5}}cm" width=".7cm" y="5cm" x="7.7cm"/>
                    <text y="4.9cm" x="8.25cm">{{$sample->score->a5_raw}}</text>
                    <text class="deg90" y=".1cm" x="8cm">تواضع</text>
                    <rect class="level{{$sample->score->a6}}" height="{{$sample->score->a6}}cm" width=".7cm" y="5cm" x="9.1cm"/>
                    <text y="4.9cm" x="9.65cm">{{$sample->score->a6_raw}}</text>
                    <text class="deg90" y=".1cm" x="9.4cm">دلرحم</text>
                    <text y="5.5cm" x="1cm">{{$sample->score->a_raw}}</text>
                </g>
            </svg>
        </div>
        {{-- Factor C--}}
        <div class="col-5 group m-4 factor_c">
            <svg width="10cm" height="100%" xmlns="http://www.w3.org/2000/svg">
                <g class="rows">
                    <rect class="origin level{{$sample->score->c}}" height="{{$sample->score->c + 2}}cm" width="100%" y="7cm" x="0"/>
                    <rect height="1cm" width="8.4cm" y="0cm" x="1.7cm" fill="#b1b1b1"/>
                    <line y2="1cm" x2="0" y1="1cm" x1="100%"/>
                    <rect height="1cm" width="8.4cm" y="1cm" x="1.7cm" fill="#e0e0e0"/>
                    <line y2="2cm" x2="0" y1="2cm" x1="100%"/>
                    <rect height="1cm" width="8.4cm" y="2cm" x="1.7cm" fill="#f7f7f7"/>
                    <line y2="3cm" x2="0" y1="3cm" x1="100%"/>
                    <rect height="1cm" width="8.4cm" y="3cm" x="1.7cm" fill="#f9f9f9"/>
                    <line y2="4cm" x2="0" y1="4cm" x1="100%"/>
                    <rect height="2cm" width="8.4cm" y="4cm" x="1.7cm" fill="#ffffff"/>
                    <line y2="5cm" x2="0" y1="5cm" x1="100%"/>
                </g>
                <g class="x_title">
                        <text y=".5cm" x="1.3cm">خیلی زیاد</text>
                        <text y="1.5cm" x="1.3cm">زیاد</text>
                        <text y="2.5cm" x="1.3cm">متوسط</text>
                        <text y="3.5cm" x="1.3cm">کم</text>
                        <text y="4.5cm" x="1.3cm">خیلی کم</text>
                        <text y="6.5cm" x="6.5cm">باوجدان بودن (C)</text>
                        <text y="5.5cm" x="2.65cm">C1</text>
                        <text y="5.5cm" x="4.05cm">C2</text>
                        <text y="5.5cm" x="5.45cm">C3</text>
                        <text y="5.5cm" x="6.85cm">C4</text>
                        <text y="5.5cm" x="8.25cm">C5</text>
                        <text y="5.5cm" x="9.65cm">C6</text>
                </g>
                <g class="back_rows">
                    <rect class="level{{$sample->score->c1}}" height="{{$sample->score->c1}}cm" width=".7cm" y="5cm" x="2.1cm"/>
                    <text y="4.9cm" x="2.65cm">{{$sample->score->c1_raw}}</text>
                    <text class="deg90" y=".1cm" x="2.5cm">شایستگی</text>
                    <rect class="level{{$sample->score->c2}}" height="{{$sample->score->c2}}cm" width=".7cm" y="5cm" x="3.5cm"/>
                    <text y="4.9cm" x="4.05cm">{{$sample->score->c2_raw}}</text>
                    <text class="deg90" y=".1cm" x="3.8cm">نظم و ترتیب</text>
                    <rect class="level{{$sample->score->c3}}" height="{{$sample->score->c3}}cm" width=".7cm" y="5cm" x="4.9cm"/>
                    <text y="4.9cm" x="5.45cm">{{$sample->score->c3_raw}}</text>
                    <text class="deg90" y=".1cm" x="5.25cm">وظیفه‌شناسی</text>
                    <rect class="level{{$sample->score->c4}}" height="{{$sample->score->c4}}cm" width=".7cm" y="5cm" x="6.3cm"/>
                    <text y="4.9cm" x="6.85cm">{{$sample->score->c4_raw}}</text>
                    <text class="deg90" y=".1cm" x="6.6cm">تلاش برای موفقیت</text>
                    <rect class="level{{$sample->score->c5}}" height="{{$sample->score->c5}}cm" width=".7cm" y="5cm" x="7.7cm"/>
                    <text y="4.9cm" x="8.25cm">{{$sample->score->c5_raw}}</text>
                    <text class="deg90" y=".1cm" x="8cm">خویشتن‌داری</text>
                    <rect class="level{{$sample->score->c6}}" height="{{$sample->score->c6}}cm" width=".7cm" y="5cm" x="9.1cm"/>
                    <text y="4.9cm" x="9.65cm">{{$sample->score->c6_raw}}</text>
                    <text class="deg90" y=".1cm" x="9.4cm">محتاط</text>
                    <text y="5.5cm" x="1cm">{{$sample->score->c_raw}}</text>
                </g>
            </svg>
        </div>
    </div>
</div>
