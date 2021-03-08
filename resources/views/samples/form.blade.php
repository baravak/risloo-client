@include('layouts.public-head-styles')
@include('layouts.head')

@section('scripts')
    @parent
    <script src="@staticVersion('/js/sampleEngine.min.js')"></script>
@endsection

@include('layouts.public-scripts')
@section('body')
    <body class="flex flex-col" data-page="{{isset($global->page) ? $global->page : ''}}">
        @include('samples.formBody')
        <script>
            window.sample_id = "{{ $sample->id }}";
        </script>
        @yield('scripts')
    </body>
@endsection

@extends('layouts.app')
