@extends('public.app')

@section('content')
    <section class="section-header section-padding" id="home">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <img src="{{ asset('/public/images/main.jpg') }}" alt="" class="img-fluid d-block mx-auto">
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="d-flex flex-column justify-content-center text-center mt-5">
                        <h5 class="text-secondary mb-3">با ریسلو کارهای خود را آسان کنید</h5>
                        <h2 class="h1 mb-3 font-weight-bolder">درمان، آموزش و پژوهش</h2>
                        <p class="mb-0">شما به عنوان روان‌شناس، روی کار اصلی خود تمرکز کنید؛ دغدغه کارهای جانبی درمان، آموزش و پژوهش را نداشته باشید و به خود آن‌ها فقط فکر کنید. ریسلو بستری یکپارچه است که کارهای شما را در این سه حوزه تسهیل می‌کند.</p>
                        <div class="mt-3">
                            <a href="#" class="btn btn-secondary rounded-pill" style="min-width: 300px;">ثبت نام</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-support">
        <div class="d-flex align-items-center">
            <div class="container">
                <div class="card border-0 shadow">
                    <div class="card-body p-5">
                        <div class="text-center fs-20">این‌جا محل قرارگیری شعار ریسلو است</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-features section-padding section-colored" id="features">
        <div class="container">
            <div class="d-flex justify-content-center align-items-center mb-5 fs-20 font-weight-bold text-center section-title">
                <span class="px-3">چرا به ریسلو اعتماد کنیم؟</span>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6 order-2 order-md-1 order-lg-1 order-xl-1">
                    <div
                        class="d-flex flex-column justify-content-center mb-5 mb-xl-0 h-100 direction-md-ltr text-md-left">
                        <h3 class="font-weight-bold">حریم خصوصی</h3>
                        <p class="mb-0">اگر حریم خصوصی در یک پروژه رعایت نشود، دلیلی نیست که به آن پروژه اعتماد کنیم. ریسلو به حریم خصوصی مخاطبین خود احترام قائل است و به هیچ وجه اطلاعات شخصی مخاطبانش را در دسترس قرار نمی‌دهد و از آن‌ها استفاده نمی‌کند. برای شناخت قوانین حریم خصوصی ریسلو به قسمت حریم خصوصی مراجعه کنید.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 order-1 order-md-2 order-lg-2 order-xl-2">
                    <div class="d-flex justify-content-center align-items-center mb-3 mb-md-5 mb-lg-5">
                        <img src="{{ asset('/public/images/services-sales-header.png') }}" alt="" class="img-fluid img-landing">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <div class="d-flex justify-content-center align-items-center mb-3 mb-md-0 mb-lg-0 mb-xl-0">
                        <img src="{{ asset('/public/images/services-header.png') }}" alt="" class="img-fluid img-landing">
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="d-flex flex-column justify-content-center h-100">
                        <h3 class="font-weight-bold">امنیت</h3>
                        <p>امنیت مهم‌ترین مسئله در سیستم‌های تحت اینترنت است و نبود آن، به تنهایی کافی است که کاربر به یک سیستم اعتماد نکند؛ لذا اگر ریسلو بخواهد کاربر خود را جذب و نگه دارد، باید امنیت برای او در اولویت باشد. امنیت ریسلو هم از جهت رعایت اصول حریم خصوصی و هم به کدگذاری و ... در حد قابل قبولی خواهد بود.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6 order-2 order-md-1 order-lg-1 order-xl-1">
                    <div
                        class="d-flex flex-column justify-content-center mb-5 mb-xl-0 h-100 direction-md-ltr text-md-left">
                        <h3 class="font-weight-bold">اخلاق حرفه‌ای روان‌شناسی</h3>
                        <p class="mb-0">پایبندی به اصول اخلاق حرفه‌ای روان‌شناسی،‌ یعنی مراجع و روان‌شناس با خیال آسوده از نرم‌افزار استفاده کند و نگران اطلاعات شخصی و پایبندی به اصول اخلاقی نیست.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 order-1 order-md-2 order-lg-2 order-xl-2">
                    <div class="d-flex justify-content-center align-items-center mb-3 mb-md-5 mb-lg-5">
                        <img src="{{ asset('/public/images/services-sales-header.png') }}" alt="" class="img-fluid img-landing">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <div class="d-flex justify-content-center align-items-center mb-3 mb-md-0 mb-lg-0 mb-xl-0">
                        <img src="{{ asset('/public/images/services-header.png') }}" alt="" class="img-fluid img-landing">
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="d-flex flex-column justify-content-center h-100">
                        <h3 class="font-weight-bold">علمی و پژوهشی</h3>
                        <p>ما برای ترویج علم و پژوهش در حوزه روان‌شناسی تلاش می‌کنیم، پس نگران نباشید، هدف اصلی ریسلو علم و پژوهش است و در این راستا حرکت می‌کند.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-benefits section-padding" id="benefits">
        <div class="container">
            <div class="d-flex justify-content-center align-items-center mb-5 fs-20 font-weight-bold text-center section-title">
                <span class="px-3">مزایا</span>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="mb-5">
                        <img src="{{ asset('/public/images/services-sales-header.png') }}" alt="" class="img-fluid mb-3">
                        <h3 class="h6 font-weight-bolder text-center">سرعت</h3>
                        <div class="text-center fs-14">سرعت پردازش و سرعت دسترسی کاربران در استفاده از خدمات، اهمیت بالائی برای ریسلو دارد</div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="mb-5">
                        <img src="{{ asset('/public/images/services-sales-header.png') }}" alt="" class="img-fluid mb-3">
                        <h3 class="h6 font-weight-bolder text-center">امنیت</h3>
                        <div class="text-center fs-14">اطلاعات در ریسلو به صورت کدگذاری شده است و از سطح امنیت بالائی برخوردار است</div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="mb-5">
                        <img src="{{ asset('/public/images/services-sales-header.png') }}" alt="" class="img-fluid mb-3">
                        <h3 class="h6 font-weight-bolder text-center">آنلاین بودن</h3>
                        <div class="fs-14">ریسلو تمام خدمات خود را به صورت آنلاین ارائه می‌دهد که دسترسی برای کاربر را آسان می‌کند؛ البته برای زمان‌های نبود اینترنت، امکان استفاده آفلاین هم وجود دارد</div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="mb-5">
                        <img src="{{ asset('/public/images/services-sales-header.png') }}" alt="" class="img-fluid mb-3">
                        <h3 class="h6 font-weight-bolder text-center">یکپارچه بودن</h3>
                        <div class="fs-14">تمام خدمات مورد نیاز یک روان‌شناس در سه حوزه آموزش، درمان و پژوهش به صورت یکپارچه در ریسلو قابل دسترسی است</div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="mb-5">
                        <img src="{{ asset('/public/images/services-sales-header.png') }}" alt="" class="img-fluid mb-3">
                        <h3 class="h6 font-weight-bolder text-center">توسعه و به روز بودن دائمی</h3>
                        <div class="text-center fs-14">ریسلو تضمین می‌کند که سیستم خود را همیشه به روز نگه دارد و در راستای توسعه آن تلاش کند</div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="mb-5">
                        <img src="{{ asset('/public/images/services-sales-header.png') }}" alt="" class="img-fluid mb-3">
                        <h3 class="h6 font-weight-bolder text-center">قابلیت دسترسی با هر وسیله‌ای</h3>
                        <div class="text-center fs-14">با گوشی، لبتاب، تبلت، تلوزیون هوشمند و ... از ریسلو استفاده کنید. ریسلو نرم‌افزاری است که با هر وسیله‌ای و در هر جائی قابلیت دسترسی دارد</div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="mb-5">
                        <img src="{{ asset('/public/images/services-sales-header.png') }}" alt="" class="img-fluid mb-3">
                        <h3 class="h6 font-weight-bolder text-center">پشتیبانی دائمی</h3>
                        <div class="text-center fs-14">ریسلو به صورت ۲۴ ساعته پشتیبانی از نیازهای کاربران خود را انجام می‌دهد</div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="mb-5">
                        <img src="{{ asset('/public/images/services-sales-header.png') }}" alt="" class="img-fluid mb-3">
                        <h3 class="h6 font-weight-bolder text-center">رعایت اخلاق حرفه‌ای روان‌شناسی و مشاوره</h3>
                        <div class="text-center fs-14">ریسلو متعهد به رعایت این اصول است و همین موضوع سبب شده است که مراجعین و متخصصین روان‌شناسی با خیالی آسوده از این سیستم استفاده کنند</div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="mb-5">
                        <img src="{{ asset('/public/images/services-sales-header.png') }}" alt="" class="img-fluid mb-3">
                        <h3 class="h6 font-weight-bolder text-center">داشتن اهداف علمی و پژوهشی</h3>
                        <div class="text-center fs-14">هدف ریسلو ارتقا سطح علمی در حوزه روان‌شناسی است؛ لذا اهداف دیگر مانند اقتصادی و... در اولویت بعدی است</div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="mb-5">
                        <img src="{{ asset('/public/images/services-sales-header.png') }}" alt="" class="img-fluid mb-3">
                        <h3 class="h6 font-weight-bolder text-center">توجه به ابرداده</h3>
                        <div class="text-center fs-14">ریسلو تحلیل‌های ابرداده‌ها و ارائه راه‌کار در راستای این تحلیل‌ها را مورد توجه قرار می‌دهد</div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="mb-5">
                        <img src="{{ asset('/public/images/services-sales-header.png') }}" alt="" class="img-fluid mb-3">
                        <h3 class="h6 font-weight-bolder text-center">شخصی‌سازی</h3>
                        <div class="text-center fs-14">با ریسلو شما می‌توانید یک کاربری شخصی در امور روان‌شناسی را تجربه کنید</div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="mb-5">
                        <img src="{{ asset('/public/images/services-sales-header.png') }}" alt="" class="img-fluid mb-3">
                        <h3 class="h6 font-weight-bolder text-center">جامعه آماری علمی و معتبر</h3>
                        <div class="text-center fs-14">جامعه آماری معتبر و علمی، می‌داند اعتبار اطلاعات و داده‌های ریسلو را ارتقا بخشد</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-blog section-padding section-colored" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <a href="#" class="text-decoration-none">
                        <div>
                            <img src="{{ asset('/public/images/services-sales-header.png') }}" alt="" class="img-fluid mb-5">
                            <div class="mb-2">
                                <h4 class="font-weight-bolder fs-20 font-weight-bolder mb-2">
                                    <a href="single.html" class="text-dark">روان‌شناسی و فقدانِ نگاهی به آن سوی دیوار</a>
                                </h4>
                                <div class="fs-14 text-dark">واقعا ما انسان ها طوری درست شدیم که اگر در هر شرایطی باشیم کم کم به اون عادت میکنیم مثلا فرض کنید شما در خانواده ای متوسط بدنیا میایید و دوستتان در خانواده فوق العاده پولدار.</div>
                            </div>
                            <div class="text-dark fs-12">۲۱ تیر ۱۳۹۹</div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6">
                    <a href="#" class="text-decoration-none">
                        <div>
                            <img src="{{ asset('/public/images/services-sales-header.png') }}" alt="" class="img-fluid mb-5">
                            <div class="mb-2">
                                <h4 class="font-weight-bolder fs-20 font-weight-bolder mb-2">
                                    <a href="single.html" class="text-dark">خوشبختی و موفقیت واقعی ✌️ یعنی فقط پیشرفت کردن!</a>
                                </h4>
                                <div class="fs-14 text-dark">خوشبختی واقعی یعنی چی؟ چطوری موفق شویم؟ چگونه همیشه خوشحال باشیم؟ ✅ این ها سوالاتی می باشد که خیلی ها از خود می پرسیم و جواب های گوناگونی برای آن وجود دارد.</div>
                            </div>
                            <div class="text-dark fs-12">۲۰ اردیبهشت ۱۳۹۹</div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="mt-5 text-center">
                <a href="#" class="text-dark fs-14 font-weight-bold">رفتن به بلاگ</a>
            </div>
        </div>
    </section>

    <section class="section-endorsement section-padding" id="endorsement">
        <div class="container">
            <div class="d-flex justify-content-center endorsement-separator">
                <span class="d-flex justify-content-center align-items-center">
                    <img src="{{ asset('/public/images/icons/quote.svg') }}" alt="" width="24">
                </span>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <div class="d-flex flex-column justify-content-between align-items-center mb-xl-0 h-100">
                        <p class="fs-14 text-center">بسیار خوشحالم که از ریسلو خرید کردم. ظاهر ساعت دقیقا مطابق عکس داخل سایت بود. بسته‌بندی کادو بسیار زیبا و مطابق عکس بود. سپاسگزارم</p>
                        <div class="text-center">
                            <div>
                                <img src="{{ asset('/public/images/profile/doctor1.jpg') }}" alt="" width="64"
                                    class="rounded-circle shadow-sm mb-3">
                                <div class="fs-12 font-weight-bold mb-1">مسلم هادلی</div>
                                <div class="fs-12 text-secondary">مشاوره تخصصی</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="d-flex flex-column justify-content-between align-items-center mt-5 mt-md-0 h-100">
                        <p class="fs-14 text-center">سلام من مدتیه این سایت و میشناسم و به خیلی ها پیشنهاد دادم من جمله برادر خودم ولی خودم اولین باره سفارش زدم اطلاعات دقیقی در مورد ساعت ها داره</p>
                        <div class="d-flex align-items-center">
                            <div class="text-center">
                                <img src="{{ asset('/public/images/profile/doctor2.jpg') }}" alt="" width="64"
                                    class="rounded-circle shadow-sm mb-3">
                                <div class="fs-12 font-weight-bold mb-1">زهرا عبدی</div>
                                <div class="fs-12 text-secondary">روانشناس و روان درمانگر</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-services section-padding section-colored" id="services">
        <div class="container">
            <div class="d-flex justify-content-center align-items-center mb-5 fs-20 font-weight-bold text-center section-title">
                <span class="px-3">خدمات</span>
            </div>
            <div class="row">
                <div class="col-xl-3">
                    <div class="bg-white rounded shadow-sm p-3 text-center mb-4 fs-14 font-weight-bolder">
                        <img src="{{ asset('/public/images/services/undraw_Responsiveness_re_cuv5.svg') }}" alt="" class="img-fluid mb-3">
                        مدیریت مالی مراکز درمانی
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="bg-white rounded shadow-sm p-3 text-center mb-4 fs-14 font-weight-bolder">
                        <img src="{{ asset('/public/images/services/undraw_Responsiveness_re_cuv5.svg') }}" alt="" class="img-fluid mb-3">
                        مدیریت رزرواسیون مراکز درمانی
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="bg-white rounded shadow-sm p-3 text-center mb-4 fs-14 font-weight-bolder">
                        <img src="{{ asset('/public/images/services/undraw_Responsiveness_re_cuv5.svg') }}" alt="" class="img-fluid mb-3">
                        مدیریت اداری مراکز درمانی
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="bg-white rounded shadow-sm p-3 text-center mb-4 fs-14 font-weight-bolder">
                        <img src="{{ asset('/public/images/services/undraw_Responsiveness_re_cuv5.svg') }}" alt="" class="img-fluid mb-3">
                        هماهنگی برنامه‌های درمانی
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="bg-white rounded shadow-sm p-3 text-center mb-4 fs-14 font-weight-bolder">
                        <img src="{{ asset('/public/images/services/undraw_Responsiveness_re_cuv5.svg') }}" alt="" class="img-fluid mb-3">
                        ثبت گزارش‌های درمان‌گر برای مراجع
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="bg-white rounded shadow-sm p-3 text-center mb-4 fs-14 font-weight-bolder">
                        <img src="{{ asset('/public/images/services/undraw_Responsiveness_re_cuv5.svg') }}" alt="" class="img-fluid mb-3">
                        هماهنگی تمرین مراجع و درمان‌گر
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="bg-white rounded shadow-sm p-3 text-center mb-4 fs-14 font-weight-bolder">
                        <img src="{{ asset('/public/images/services/undraw_Responsiveness_re_cuv5.svg') }}" alt="" class="img-fluid mb-3">
                        اجرای آزمون‌های روان‌شناختی
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="bg-white rounded shadow-sm p-3 text-center mb-4 fs-14 font-weight-bolder">
                        <img src="{{ asset('/public/images/services/undraw_Responsiveness_re_cuv5.svg') }}" alt="" class="img-fluid mb-3">
                        نمره‌گذاری و تحلیل آزمون‌های روان‌شناختی
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="bg-white rounded shadow-sm p-3 text-center mb-4 fs-14 font-weight-bolder">
                        <img src="{{ asset('/public/images/services/undraw_Responsiveness_re_cuv5.svg') }}" alt="" class="img-fluid mb-3">
                        مشاوره مجازی
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="bg-white rounded shadow-sm p-3 text-center mb-4 fs-14 font-weight-bolder">
                        <img src="{{ asset('/public/images/services/undraw_Responsiveness_re_cuv5.svg') }}" alt="" class="img-fluid mb-3">
                        شبکه اجتماعی مشاوران
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="bg-white rounded shadow-sm p-3 text-center mb-4 fs-14 font-weight-bolder">
                        <img src="{{ asset('/public/images/services/undraw_Responsiveness_re_cuv5.svg') }}" alt="" class="img-fluid mb-3">
                        ارائه بسته‌های آموزشی
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="bg-white rounded shadow-sm p-3 text-center mb-4 fs-14 font-weight-bolder">
                        <img src="{{ asset('/public/images/services/undraw_Responsiveness_re_cuv5.svg') }}" alt="" class="img-fluid mb-3">
                        بستر آموزش
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="bg-white rounded shadow-sm p-3 text-center mb-4 fs-14 font-weight-bolder">
                        <img src="{{ asset('/public/images/services/undraw_Responsiveness_re_cuv5.svg') }}" alt="" class="img-fluid mb-3">
                        بستری برای پژوهش پژوهش‌گران
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="bg-white rounded shadow-sm p-3 text-center mb-4 fs-14 font-weight-bolder">
                        <img src="{{ asset('/public/images/services/undraw_Responsiveness_re_cuv5.svg') }}" alt="" class="img-fluid mb-3">
                        تحلیل‌های آماری
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-call-to-action section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-6 order-2 order-md-1">
                    <div class="d-flex flex-column justify-content-center h-100">
                        <span class="font-weight-bold text-secondary mb-2">با ریسلو کارهای خود را آسان کنید</span>
                        <h3 class="mb-3">درمان، آموزش و پژوهش</h3>
                        <p>شما به عنوان روان‌شناس، روی کار اصلی خود تمرکز کنید؛ دغدغه کارهای جانبی درمان، آموزش و پژوهش را نداشته باشید و به خود آن‌ها فقط فکر کنید</p>
                        <div>
                            <a href="#" class="btn btn-primary rounded-pill">ثبت‌نام کنید</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 order-1 order-md-2">
                    <div class="d-flex justify-content-center align-items-center mb-3 mb-md-0 mb-lg-0">
                        <img src="{{ asset('/public/images/contact-header-img.png') }}" alt="" class="img-fluid img-landing">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-who section-padding section-colored" id="target">
        <div class="container">
            <div class="d-flex justify-content-center align-items-center mb-5 fs-20 font-weight-bold text-center section-title">
                <span class="px-3">چه کسانی از سیستم استفاده می‌کنند؟</span>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="d-flex flex-column flex-sm-row align-items-center mb-5">
                        <div class="bg-white shadow rounded mb-3 mb-sm-0 who-square"></div>
                        <div class="pr-0 pr-lg-3">
                            <h3 class="fs-16 font-weight-bolder text-center text-lg-right">روان‌درمان‌گرها</h3>
                            <p class="fs-14 mb-0 text-center text-lg-right">تسهیل کارهای اتاق درمان روان‌درمان‌گران</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="d-flex flex-column flex-sm-row align-items-center mb-5">
                        <div class="bg-white shadow rounded mb-3 mb-sm-0 who-square"></div>
                        <div class="pr-0 pr-lg-3">
                            <h3 class="fs-16 font-weight-bolder text-center text-lg-right">روان‌شناس‌ها</h3>
                            <p class="fs-14 mb-0 text-center text-lg-right">تسهیل کارهای آموزشی و پژوهشی</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="d-flex flex-column flex-sm-row align-items-center mb-5">
                        <div class="bg-white shadow rounded mb-3 mb-sm-0 who-square"></div>
                        <div class="pr-0 pr-lg-3">
                            <h3 class="fs-16 font-weight-bolder text-center text-lg-right">روان‌سنج‌ها</h3>
                            <p class="fs-14 mb-0 text-center text-lg-right">تسهیل اجرای آزمونها، کارهای آماری و اصول روان‌سنجی</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="d-flex flex-column flex-sm-row align-items-center mb-5">
                        <div class="bg-white shadow rounded mb-3 mb-sm-0 who-square"></div>
                        <div class="pr-0 pr-lg-3">
                            <h3 class="fs-16 font-weight-bolder text-center text-lg-right">دانشجوها</h3>
                            <p class="fs-14 mb-0 text-center text-lg-right">تسهیل کارهای آموزشی، پژوهشی و پایان‌نامه‌های دانشجویان</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="d-flex flex-column flex-sm-row align-items-center mb-5">
                        <div class="bg-white shadow rounded mb-3 mb-sm-0 who-square"></div>
                        <div class="pr-0 pr-lg-3">
                            <h3 class="fs-16 font-weight-bolder text-center text-lg-right">مراکز مشاوره و درمانی</h3>
                            <p class="fs-14 mb-0 text-center text-lg-right">تسهیل اداره مراکز مشاوره و درمانی و مدیریت آن</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="d-flex flex-column flex-sm-row align-items-center mb-5">
                        <div class="bg-white shadow rounded mb-3 mb-sm-0 who-square"></div>
                        <div class="pr-0 pr-lg-3">
                            <h3 class="fs-16 font-weight-bolder text-center text-lg-right">مراجعین مراکز درمانی</h3>
                            <p class="fs-14 mb-0 text-center text-lg-right">تسهیل رزرو و ارتباط مراجع با درمانگر و مرکز درمانی</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="d-flex flex-column flex-sm-row align-items-center mb-5">
                        <div class="bg-white shadow rounded mb-3 mb-sm-0 who-square"></div>
                        <div class="pr-0 pr-lg-3">
                            <h3 class="fs-16 font-weight-bolder text-center text-lg-right">افراد عادی برای مهارت‌افزایی</h3>
                            <p class="fs-14 mb-0 text-center text-lg-right">آموزش آسان مباحث کاربردی روان‌شناسی برای عموم افراد</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="d-flex flex-column flex-sm-row align-items-center mb-5">
                        <div class="bg-white shadow rounded mb-3 mb-sm-0 who-square"></div>
                        <div class="pr-0 pr-lg-3">
                            <h3 class="fs-16 font-weight-bolder text-center text-lg-right">پژوهشگران</h3>
                            <p class="fs-14 mb-0 text-center text-lg-right">تسهیل کارهای پژوهشگران حوزه روان‌شناسی در جهت معرفی منابع، کارهای آماری، ارائه جامعه آماری معتبر، ترجمه منابع معتبر و...</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="d-flex flex-column flex-sm-row align-items-center mb-5">
                        <div class="bg-white shadow rounded mb-3 mb-sm-0 who-square"></div>
                        <div class="pr-0 pr-lg-3">
                            <h3 class="fs-16 font-weight-bolder text-center text-lg-right">مشاوران</h3>
                            <p class="fs-14 mb-0 text-center text-lg-right">تسهیل کارهای مشاوران در رابطه با مراجعین خودشان</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="d-flex flex-column flex-sm-row align-items-center mb-5">
                        <div class="bg-white shadow rounded mb-3 mb-sm-0 who-square"></div>
                        <div class="pr-0 pr-lg-3">
                            <h3 class="fs-16 font-weight-bolder text-center text-lg-right">راهنمایان مدارس</h3>
                            <p class="fs-14 mb-0 text-center text-lg-right">تسهیل کارهای ارتباطی راهنمایان مدارس با دانش‌آموزان</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="d-flex flex-column flex-sm-row align-items-center mb-5">
                        <div class="bg-white shadow rounded mb-3 mb-sm-0 who-square"></div>
                        <div class="pr-0 pr-lg-3">
                            <h3 class="fs-16 font-weight-bolder text-center text-lg-right">مدارس</h3>
                            <p class="fs-14 mb-0 text-center text-lg-right">اجرای آزمون‌های روان‌شناختی و آموزش و مهارت‌اموزی دانش‌آموزان مدارس با ریسلو</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="d-flex flex-column flex-sm-row align-items-center mb-5">
                        <div class="bg-white shadow rounded mb-3 mb-sm-0 who-square"></div>
                        <div class="pr-0 pr-lg-3">
                            <h3 class="fs-16 font-weight-bolder text-center text-lg-right">دانشگاه‌</h3>
                            <p class="fs-14 mb-0 text-center text-lg-right">تسهیل آموزش و پژوهش در حوزه روان‌شناسی برای استفاده دانشگاه</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-price section-padding" id="price">
        <div class="d-flex justify-content-center flex-wrap">
            <div class="px-3 py-4 shadow-sm border rounded card-price m-3 bg-white">
                <div class="text-center mb-5">
                    <img src="{{ asset('/public/images/undraw_stand_out_1oag.svg') }}" alt="" class="img-fluid w-50">
                </div>
                <h2 class="text-center mb-3">کلینیک</h2>
                <p class="fs-14 text-secondary text-center">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و
                    با استفاده از طراحان گرافیک است.</p>
            </div>

            <div class="px-3 py-4 shadow-sm border rounded card-price m-3 bg-white">
                <div class="text-center mb-5">
                    <img src="{{ asset('/public/images/undraw_medical_care_movn.svg') }}" alt="" class="img-fluid w-50">
                </div>
                <h2 class="text-center mb-3">مرکز مشاوره</h2>
                <p class="fs-14 text-secondary text-center">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و
                    با استفاده از طراحان گرافیک است.</p>
            </div>
        </div>
    </section>

    <section class="section-brands section-padding bg-dark">
        <div class="container">
            <div class="d-flex flex-wrap justify-content-center">
                <a href="#" class="m-3">
                    <img src="{{ asset('/public/images/brands/chrome.svg') }}" alt="" class="brand-img">
                </a>
                <a href="#" class="m-3">
                    <img src="{{ asset('/public/images/brands/chrome.svg') }}" alt="" class="brand-img">
                </a>
                <a href="#" class="m-3">
                    <img src="{{ asset('/public/images/brands/chrome.svg') }}" alt="" class="brand-img">
                </a>
                <a href="#" class="m-3">
                    <img src="{{ asset('/public/images/brands/chrome.svg') }}" alt="" class="brand-img">
                </a>
            </div>
        </div>
    </section>
@endsection