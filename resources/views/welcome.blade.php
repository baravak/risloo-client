<!DOCTYPE html>
<html dir="rtl" lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Risloo | ریسلو">

    <link rel="stylesheet" href="@staticVersion('/css/public.css')">

    <title>Risloo | ریسلو</title>
</head>

<body class="flex flex-col text-gray-900 bg-gray-50">
    <main class="flex-1 pt-32" style="padding-bottom: 4rem;">
        <nav class="bg-white shadow py-4 fixed top-0 right-0 left-0 w-full">
            <div class="container mx-auto px-4">
                <div class="flex justify-between items-center">
                    <h1 class="">
                        <a href="/" class="text-2xl text-brand variable-font-black">ریسلو</a>
                        @if (config('app.env') == 'local')
                            <span style="background: #DC2626; color: #fff; font-size: 12px; margin-right: 4px; border-radius: 4px; padding: 2px 6px; position: relative; top: -4px;">نسخه آزمایشی</span>
                        @endif
                    </h1>

                    <div class="flex items-center">
                        <a href="/dashboard" class="text-sm variable-font-medium hover:text-brand transition ml-4">@lang('Login')</a>
                        <a href="/register" class="text-sm text-white variable-font-normal bg-brand py-2 px-8 rounded-full hover:bg-brand-600 transition">@lang('Register')</a>
                    </div>
                </div>
            </div>
        </nav>

        <section class="px-4">
            <h2 class="text-center text-2xl sm:text-4xl variable-font-bold">درمان، آموزش و پژوهش</h2>
            <p class="text-center sm:w-1/2 md:w-1/3 mt-4 mx-auto">شما به عنوان روان‌شناس، روی کار اصلی خود تمرکز کنید؛ دغدغه کارهای جانبی <span class="variable-font-bold">درمان، آموزش و پژوهش</span> را نداشته باشید و به خود آن‌ها فقط فکر کنید. ریسلو بستری یک‌پارچه است که کارهای شما را در این سه حوزه تسهیل می‌کند.</p>
            <div class="flex flex-col justify-center items-center text-center mt-8">
                <a href="/register" class="bg-brand text-white py-2 px-8 rounded-full">عضو ریسلو شوید</a>
                <a href="https://play.google.com/store/apps/details?id=com.majazeh.risloo" target="_blank" rel="noopener" class="variable-font-normal text-gray-700 hover:text-gray-900 transition mt-4">دانلود نسخه اندروید از <span class="variable-font-bold">Google Play</span></a>
            </div>
        </section>

        <section class="mt-8 px-4">
            <div class="w-full lg:w-1/2 mx-auto shadow">
                <img src="{{ asset('/public/images/main.jpg') }}" alt="ریسلو">
            </div>
        </section>
    </main>
    <footer class="bg-brand py-2 w-full">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between text-center text-sm text-white">
                <span>
                    © تمامی حقوق این وب‌سایت متعلق به شرکت ریس اعتماد ایرانیان می‌باشد.
                </span>
                <a referrerpolicy="origin" target="_blank" href="https://trustseal.enamad.ir/?id=223057&amp;Code=nI17RKpP7XMHZTzmer28" title="نماد اعتماد الکترونیکی ریسلو" aria-label="نماد اعتماد الکترونیکی ریسلو">
                    <img referrerpolicy="origin" src="{{ asset('/images/logo/enamad-risloo.png') }}" alt="" style="cursor:pointer;" id="nI17RKpP7XMHZTzmer28">
                </a>
            </div>
        </div>
    </footer>
</body>

</html>