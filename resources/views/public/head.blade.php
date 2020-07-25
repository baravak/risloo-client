@include('public.head-styles')

@section('head')
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @yield('head-styles')

        <title>@yield('title', isset($global->title) ? $global->title : null )</title>
    </head>
@endsection