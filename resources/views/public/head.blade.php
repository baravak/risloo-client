@include('public.head-styles')

@section('head')
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="HTML meta tags are a cornerstone of coding. But which are the most essential? We give you a rundown of all the meta tags you need to know.">
        <meta name="keywords" content="keyword 1, keyword 2, keyword 3">
        <meta name="author" content="Author name">
        <meta name="copyright" content="Copyright owner">
        <meta name="robots" content="index,follow">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta property="og:title" content="European Travel Destinations">
        <meta property="og:description" content="Offering tour packages for individuals or groups.">
        <meta property="og:image" content="http://euro-travel-example.com/thumbnail.jpg">
        <meta property="og:url" content="http://euro-travel-example.com/index.htm">

        <meta name="twitter:title" content="European Travel Destinations ">
        <meta name="twitter:description" content=" Offering tour packages for individuals or groups.">
        <meta name="twitter:image" content=" http://euro-travel-example.com/thumbnail.jpg">
        <meta name="twitter:card" content="summary_large_image">

        @yield('head-styles')

        <title>@yield('title', isset($global->title) ? $global->title : null )</title>
    </head>
@endsection