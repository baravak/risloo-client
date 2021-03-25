@section('body')
    <body class="flex flex-col" data-page="{{ isset($global->page) ? $global->page : '' }}">
        @yield('aside')
        @yield('main')
        @yield('scripts')
    </body>
@endsection