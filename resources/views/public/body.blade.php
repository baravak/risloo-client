@include('public.header')
@include('public.main')
@include('public.footer')
@include('public.scripts')

@section('body')
    <body class="d-flex flex-column rtl" data-page="{{ isset($global->page) ? $global->page : '' }}">
        @yield('header')
        @yield('main')
        @yield('footer')
        @yield('scripts')
    </body>
@endsection