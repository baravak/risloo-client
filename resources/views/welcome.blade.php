<!DOCTYPE html>
<html dir="rtl" lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Risloo | ریسلو">

    <style class="bodyLoading">
        @keyframes bodyLoading{
            0% {
                opacity: 1;
            }
            100% {
                opacity: 0;
                display:none;
            }
        }
        body {
            overflow: hidden;
        }
        body::before {
            content: "";
            display: block;
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-color: #007BA4;
            opacity: 1;
            z-index: 999;
        }

        body::after {
            content: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCA1MTIgNTEyIj48cGF0aCBmaWxsPSIjZmZmIiBkPSJNNDYwLjExNSAzNzMuODQ2bC02Ljk0MS00LjAwOGMtNS41NDYtMy4yMDItNy41NjQtMTAuMTc3LTQuNjYxLTE1Ljg4NiAzMi45NzEtNjQuODM4IDMxLjE2Ny0xNDIuNzMxLTUuNDE1LTIwNS45NTQtMzYuNTA0LTYzLjM1Ni0xMDMuMTE4LTEwMy44NzYtMTc1LjgtMTA3LjcwMUMyNjAuOTUyIDM5Ljk2MyAyNTYgMzQuNjc2IDI1NiAyOC4zMjF2LTguMDEyYzAtNi45MDQgNS44MDgtMTIuMzM3IDEyLjcwMy0xMS45ODIgODMuNTUyIDQuMzA2IDE2MC4xNTcgNTAuODYxIDIwMi4xMDYgMTIzLjY3IDQyLjA2OSA3Mi43MDMgNDQuMDgzIDE2Mi4zMjIgNi4wMzQgMjM2LjgzOC0zLjE0IDYuMTQ5LTEwLjc1IDguNDYyLTE2LjcyOCA1LjAxMXoiLz48L3N2Zz4=");
            position: absolute;
            width: 2rem;
            height: 2rem;
            top: calc(50% - 1rem);
            right: calc(50% - 1rem);
            z-index: 9999;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }
    </style>

    <link rel="stylesheet" href="@staticVersion('/css/davat.css')" media="print" onload="this.media='all'; this.onload = null">

    <title>Risloo | ریسلو</title>
</head>

<body class="flex flex-col text-gray-900 bg-gray-50">
    <main class="flex-1 pt-32">
        <nav class="bg-white shadow py-4 fixed top-0 right-0 left-0 w-full">
            <div class="container mx-auto px-4">
                <div class="flex justify-between items-center">
                    <h1 class="text-2xl text-brand variable-font-black">
                        <a href="#">ریسلو</a>
                    </h1>

                    <div class="flex items-center">
                        <a href="/dashboard" class="text-sm variable-font-medium hover:text-brand transition ml-4">ورود</a>
                        <a href="/register" class="text-sm text-white variable-font-normal bg-brand py-2 px-8 rounded-full hover:bg-brand-600 transition">ثبت‌نام</a>
                    </div>
                </div>
            </div>
        </nav>

        <section class="px-4">
            <h2 class="text-center text-2xl sm:text-4xl variable-font-bold">درمان، آموزش و پژوهش</h2>
            <p class="text-center sm:w-1/2 md:w-1/3 mt-4 mx-auto">شما به عنوان روان‌شناس، روی کار اصلی خود تمرکز کنید؛ دغدغه کارهای جانبی <span class="variable-font-bold">درمان، آموزش و پژوهش</span> را نداشته باشید و به خود آن‌ها فقط فکر کنید. ریسلو بستری یک‌پارچه است که کارهای شما را در این سه حوزه تسهیل می‌کند.</p>
            <div class="flex flex-col justify-center items-center text-center mt-8">
                <a href="/register" class="bg-brand text-white py-2 px-8 rounded-full">در ریسلو ثبت‌نام کنید</a>
                <a href="https://play.google.com/store/apps/details?id=com.majazeh.risloo" target="_blank" rel="noopener" class="variable-font-normal text-gray-700 hover:text-gray-900 transition mt-4">دانلود نسخه اندروید از <span class="variable-font-bold">Google Play</span></a>
            </div>
        </section>

        <section class="mt-8 px-4">
            <div class="w-full lg:w-1/2 mx-auto shadow">
                <img src="{{ asset('/public/images/main.jpg') }}" alt="">
            </div>
        </section>
    </main>

    <script>
        window.addEventListener('load', function() {
            var bodyElement = document.querySelector('body');
            var styleElement = '<style>body::before{animation:bodyLoading 500ms normal forwards;}</style>';
            bodyElement.append(styleElement);
            setTimeout(function() {
                document.querySelector('.bodyLoading').remove();
            }, 1000);
        }, false);
    </script>
</body>

</html>