<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="@staticVersion('/public/vendors/bootstrap-4.4.1/css/bootstrap.min.css')">
    <link rel="stylesheet" href="@staticVersion('/public/css/app.css')">

    <title>Risloo | ریسلو</title>
</head>

<body class="rtl">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('/public/images/logo/logo.svg') }}" alt="" height="32">
                <span class="font-weight-bold">ریسلو</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link fs-14" href="#home">خانه</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-14" href="#features">ویژگی‌ها</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-14" href="#benefits">مزایا</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-14" href="#blog">بلاگ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-14" href="#endorsement">نظر اساتید</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-14" href="#services">سرویس‌ها</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-14" href="#target">جامعه هدف</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-14" href="#price">هزینه‌ها</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-14" href="#price">ورود</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-14" href="#price">عضویت</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

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
                        <div class="bg-white shadow rounded mb-3 mb-sm-0" style="width: 100px; min-width: 100px; height: 100px;"></div>
                        <div class="pr-0 pr-lg-3">
                            <h3 class="fs-16 font-weight-bolder text-center text-lg-right">روان‌درمان‌گرها</h3>
                            <p class="fs-14 mb-0 text-center text-lg-right">تسهیل کارهای اتاق درمان روان‌درمان‌گران</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="d-flex flex-column flex-sm-row align-items-center mb-5">
                        <div class="bg-white shadow rounded mb-3 mb-sm-0" style="width: 100px; min-width: 100px; height: 100px;"></div>
                        <div class="pr-0 pr-lg-3">
                            <h3 class="fs-16 font-weight-bolder text-center text-lg-right">روان‌شناس‌ها</h3>
                            <p class="fs-14 mb-0 text-center text-lg-right">تسهیل کارهای آموزشی و پژوهشی</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="d-flex flex-column flex-sm-row align-items-center mb-5">
                        <div class="bg-white shadow rounded mb-3 mb-sm-0" style="width: 100px; min-width: 100px; height: 100px;"></div>
                        <div class="pr-0 pr-lg-3">
                            <h3 class="fs-16 font-weight-bolder text-center text-lg-right">روان‌سنج‌ها</h3>
                            <p class="fs-14 mb-0 text-center text-lg-right">تسهیل اجرای آزمونها، کارهای آماری و اصول روان‌سنجی</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="d-flex flex-column flex-sm-row align-items-center mb-5">
                        <div class="bg-white shadow rounded mb-3 mb-sm-0" style="width: 100px; min-width: 100px; height: 100px;"></div>
                        <div class="pr-0 pr-lg-3">
                            <h3 class="fs-16 font-weight-bolder text-center text-lg-right">دانشجوها</h3>
                            <p class="fs-14 mb-0 text-center text-lg-right">تسهیل کارهای آموزشی، پژوهشی و پایان‌نامه‌های دانشجویان</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="d-flex flex-column flex-sm-row align-items-center mb-5">
                        <div class="bg-white shadow rounded mb-3 mb-sm-0" style="width: 100px; min-width: 100px; height: 100px;"></div>
                        <div class="pr-0 pr-lg-3">
                            <h3 class="fs-16 font-weight-bolder text-center text-lg-right">مراکز مشاوره و درمانی</h3>
                            <p class="fs-14 mb-0 text-center text-lg-right">تسهیل اداره مراکز مشاوره و درمانی و مدیریت آن</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="d-flex flex-column flex-sm-row align-items-center mb-5">
                        <div class="bg-white shadow rounded mb-3 mb-sm-0" style="width: 100px; min-width: 100px; height: 100px;"></div>
                        <div class="pr-0 pr-lg-3">
                            <h3 class="fs-16 font-weight-bolder text-center text-lg-right text-center text-lg-right">مراجعین مراکز درمانی</h3>
                            <p class="fs-14 mb-0 text-center text-lg-right text-center text-lg-right">تسهیل رزرو و ارتباط مراجع با درمانگر و مرکز درمانی</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="d-flex flex-column flex-sm-row align-items-center mb-5">
                        <div class="bg-white shadow rounded mb-3 mb-sm-0" style="width: 100px; min-width: 100px; height: 100px;"></div>
                        <div class="pr-0 pr-lg-3">
                            <h3 class="fs-16 font-weight-bolder text-center text-lg-right">افراد عادی برای مهارت‌افزایی</h3>
                            <p class="fs-14 mb-0 text-center text-lg-right">آموزش آسان مباحث کاربردی روان‌شناسی برای عموم افراد</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="d-flex flex-column flex-sm-row align-items-center mb-5">
                        <div class="bg-white shadow rounded mb-3 mb-sm-0" style="width: 100px; min-width: 100px; height: 100px;"></div>
                        <div class="pr-0 pr-lg-3">
                            <h3 class="fs-16 font-weight-bolder text-center text-lg-right">پژوهشگران</h3>
                            <p class="fs-14 mb-0 text-center text-lg-right">تسهیل کارهای پژوهشگران حوزه روان‌شناسی در جهت معرفی منابع، کارهای آماری، ارائه جامعه آماری معتبر، ترجمه منابع معتبر و...</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="d-flex flex-column flex-sm-row align-items-center mb-5">
                        <div class="bg-white shadow rounded mb-3 mb-sm-0" style="width: 100px; min-width: 100px; height: 100px;"></div>
                        <div class="pr-0 pr-lg-3">
                            <h3 class="fs-16 font-weight-bolder text-center text-lg-right">مشاوران</h3>
                            <p class="fs-14 mb-0 text-center text-lg-right">تسهیل کارهای مشاوران در رابطه با مراجعین خودشان</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="d-flex flex-column flex-sm-row align-items-center mb-5">
                        <div class="bg-white shadow rounded mb-3 mb-sm-0" style="width: 100px; min-width: 100px; height: 100px;"></div>
                        <div class="pr-0 pr-lg-3">
                            <h3 class="fs-16 font-weight-bolder text-center text-lg-right">راهنمایان مدارس</h3>
                            <p class="fs-14 mb-0 text-center text-lg-right">تسهیل کارهای ارتباطی راهنمایان مدارس با دانش‌آموزان</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="d-flex flex-column flex-sm-row align-items-center mb-5">
                        <div class="bg-white shadow rounded mb-3 mb-sm-0" style="width: 100px; min-width: 100px; height: 100px;"></div>
                        <div class="pr-0 pr-lg-3">
                            <h3 class="fs-16 font-weight-bolder text-center text-lg-right">مدارس</h3>
                            <p class="fs-14 mb-0 text-center text-lg-right">اجرای آزمون‌های روان‌شناختی و آموزش و مهارت‌اموزی دانش‌آموزان مدارس با ریسلو</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="d-flex flex-column flex-sm-row align-items-center mb-5">
                        <div class="bg-white shadow rounded mb-3 mb-sm-0" style="width: 100px; min-width: 100px; height: 100px;"></div>
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
                    <img src="{{ asset('/public/images/brands/chrome.svg') }}" alt="" style="height: 64px;">
                </a>
                <a href="#" class="m-3">
                    <img src="{{ asset('/public/images/brands/codeinwp.svg') }}" alt="" style="height: 64px;">
                </a>
                <a href="#" class="m-3">
                    <img src="{{ asset('/public/images/brands/frontend-masters.png') }}" alt="" style="height: 64px;">
                </a>
                <a href="#" class="m-3">
                    <img src="{{ asset('/public/images/brands/icons8.svg') }}" alt="" style="height: 64px;">
                </a>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="mb-5 mb-xl-0">
                            <div>
                                <h6 class="font-weight-bold fs-20">تماس با ما</h6>
                                <p class="fs-14">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده
                                    از طراحان گرافیک است.</p>
                            </div>
                            <a href="#" class="d-inline-block mb-2 fs-14 footer-link">
                                <span>184 Main Street Victoria</span>
                            </a>
                            <a href="#" class="d-inline-block mb-2 fs-14 footer-link">
                                <span>email@mikado-themes.com</span>
                            </a>
                            <a href="#" class="d-inline-block fs-14 footer-link">
                                <span>+(123) 456 -7890</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="mb-5 mb-md-0 mb-xl-0">
                            <h6 class="font-weight-bold fs-20">آخرین توییت‌های ما را بخوانید</h6>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div class="mb-5 mb-md-0 mb-xl-0">
                            <h6 class="font-weight-bold fs-20">آخرین مطالب وبلاگ</h6>
                            <div class="mb-2 pr-3 position-relative">
                                <a href="#" class="footer-link footer-blog-link d-block fs-14">Mining platform</a>
                                <span class="fs-12 text-secondary">November 8, 2018</span>
                            </div>
                            <div class="mb-2 pr-3 position-relative">
                                <a href="#" class="footer-link footer-blog-link d-block fs-14">Your digital business</a>
                                <span class="fs-12 text-secondary">November 8, 2018</span>
                            </div>
                            <div class="mb-2 pr-3 position-relative">
                                <a href="#" class="footer-link footer-blog-link d-block fs-14">Other way</a>
                                <span class="fs-12 text-secondary">November 8, 2018</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3">
                        <div>
                            <h6 class="font-weight-bold fs-20">Locations</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="text-center mb-3 mb-xl-0">
                            <a href="#">
                                <img src="dist/images/logo/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="text-center fs-12 mb-3 mb-xl-0">
                            <span>© Copyrights 2020</span>
                            <a href="#" class="text-decoration-none text-white font-weight-bold">Mikado Themes</a>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="d-flex justify-content-center">
                            <a href="#" class="text-decoration-none ml-2">
                                <svg style="width: 32px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 167.657 167.657" style="enable-background:new 0 0 167.657 167.657;" xml:space="preserve">
                                    <g>
                                        <path style="fill:#ffffff;" d="M83.829,0.349C37.532,0.349,0,37.881,0,84.178c0,41.523,30.222,75.911,69.848,82.57v-65.081H49.626
                                        v-23.42h20.222V60.978c0-20.037,12.238-30.956,30.115-30.956c8.562,0,15.92,0.638,18.056,0.919v20.944l-12.399,0.006
                                        c-9.72,0-11.594,4.618-11.594,11.397v14.947h23.193l-3.025,23.42H94.026v65.653c41.476-5.048,73.631-40.312,73.631-83.154
                                        C167.657,37.881,130.125,0.349,83.829,0.349z" />
                                    </g>
                                </svg>
                            </a>

                            <a href="#" class="text-decoration-none">
                                <svg style="width: 32px;" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                    <path style="fill: #ffffff;" d="m256 0c-141.363281 0-256 114.636719-256 256s114.636719 256 256 256 256-114.636719 256-256-114.636719-256-256-256zm116.886719 199.601562c.113281 2.519532.167969 5.050782.167969 7.59375 0 77.644532-59.101563 167.179688-167.183594 167.183594h.003906-.003906c-33.183594 0-64.0625-9.726562-90.066406-26.394531 4.597656.542969 9.277343.8125 14.015624.8125 27.53125 0 52.867188-9.390625 72.980469-25.152344-25.722656-.476562-47.410156-17.464843-54.894531-40.8125 3.582031.6875 7.265625 1.0625 11.042969 1.0625 5.363281 0 10.558593-.722656 15.496093-2.070312-26.886718-5.382813-47.140624-29.144531-47.140624-57.597657 0-.265624 0-.503906.007812-.75 7.917969 4.402344 16.972656 7.050782 26.613281 7.347657-15.777343-10.527344-26.148437-28.523438-26.148437-48.910157 0-10.765624 2.910156-20.851562 7.957031-29.535156 28.976563 35.554688 72.28125 58.9375 121.117187 61.394532-1.007812-4.304688-1.527343-8.789063-1.527343-13.398438 0-32.4375 26.316406-58.753906 58.765625-58.753906 16.902344 0 32.167968 7.144531 42.890625 18.566406 13.386719-2.640625 25.957031-7.53125 37.3125-14.261719-4.394531 13.714844-13.707031 25.222657-25.839844 32.5 11.886719-1.421875 23.214844-4.574219 33.742187-9.253906-7.863281 11.785156-17.835937 22.136719-29.308593 30.429687zm0 0" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="@staticVersion('/public/vendors/jquery-3.4.1.min.js')"></script>
    <script src="@staticVersion('/public/vendors/popper.min.js')"></script>
    <script src="@staticVersion('/public/vendors/bootstrap-4.4.1/js/bootstrap.min.js')"></script>
    <script>
        $(document).on("click","a.nav-link",function(e) {
            e.preventDefault();
            var id = $(this).attr("href");
            $('html, body').animate({
                scrollTop: $(id).offset().top
            }, 1000);
        });
    </script>
</body>

</html>