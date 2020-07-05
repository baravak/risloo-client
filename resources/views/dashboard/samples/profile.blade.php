@section('head-styles')
    @parent
    <link rel="stylesheet" href="@staticVersion('/css/profile_print.css')">
@endsection

@include('layouts.public-head-styles')
@include('layouts.head')

@include('layouts.public-scripts')
@section('body')
    <body class="rtl pt-5" data-page="{{isset($global->page) ? $global->page : ''}}">
        <header></header>
        @includeWhen(!request()->has('single'), 'dashboard.samples.profiles.first-page')
        @include('dashboard.samples.profiles.' . substr($sample->scale->id, 1))
        @includeWhen(!request()->has('single'), 'dashboard.samples.profiles.interpretation')
        @includeWhen(!request()->has('single'), 'dashboard.samples.profiles.items')
        <footer>
            <div>
                <strong>ریسلو</strong>
            </div>
            <div id="footer-link">
                <a href="https://r1l.ir/{{$sample->id}}">r1l.ir/{{$sample->id}}</a>
            </div>
        </footer>
        @yield('scripts')
    </body>
@endsection

@extends('layouts.app')
