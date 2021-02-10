@section('head')
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="description" content="@yield('description', $global->description)">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @yield('head-styles')

        <title>@yield('title', $global->title)</title>
    </head>
@endsection