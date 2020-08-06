@include('public.head-styles')

@section('head')
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="شما به عنوان روان‌شناس، روی کار اصلی خود تمرکز کنید؛ دغدغه کارهای جانبی درمان، آموزش و پژوهش را نداشته باشید و به خود آن‌ها فقط فکر کنید. ریسلو بستری یکپارچه است که کارهای شما را در این سه حوزه تسهیل می‌کند.">
        <meta name="keywords" content="روان‌شناس, درمان, آموزش, پژوهش, ریسلو,">
        <meta name="author" content="ریسلو">
        <meta name="copyright" content="ریسلو">
        <meta name="robots" content="index,follow">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta property="og:title" content="ریسلو">
        <meta property="og:description" content="شما به عنوان روان‌شناس، روی کار اصلی خود تمرکز کنید؛ دغدغه کارهای جانبی درمان، آموزش و پژوهش را نداشته باشید و به خود آن‌ها فقط فکر کنید. ریسلو بستری یکپارچه است که کارهای شما را در این سه حوزه تسهیل می‌کند.">
        <meta property="og:image" content="https://risloo.ir/public/images/logo/logo.svg">
        <meta property="og:url" content="https://risloo.ir/">

        <meta name="twitter:title" content="ریسلو">
        <meta name="twitter:description" content="شما به عنوان روان‌شناس، روی کار اصلی خود تمرکز کنید؛ دغدغه کارهای جانبی درمان، آموزش و پژوهش را نداشته باشید و به خود آن‌ها فقط فکر کنید. ریسلو بستری یکپارچه است که کارهای شما را در این سه حوزه تسهیل می‌کند.">
        <meta name="twitter:image" content="https://risloo.ir/public/images/logo/logo.svg">
        <meta name="twitter:card" content="https://risloo.ir/public/images/logo/logo.svg">

        @yield('head-styles')

        <title>@yield('title', isset($global->title) ? $global->title : 'ریسلو' )</title>
    </head>
@endsection