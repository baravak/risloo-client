@include('layouts.public-head-styles')
@include('layouts.head')

@section('scripts')
    @parent
    <script src="@staticVersion('/js/sampleEngine.min.js')"></script>
@endsection

@include('layouts.public-scripts')
@section('body')
    <body class="rtl pt-5" data-page="{{isset($global->page) ? $global->page : ''}}">
        @include('samples.formBody')
        <script>
            var sample_id = '{{substr($sample->id, 1)}}';
            var prerequisite = {!! $prerequisite !!};
            var items = {!! $items !!};
        </script>
        @yield('scripts')
    </body>
@endsection

@extends('layouts.app')
