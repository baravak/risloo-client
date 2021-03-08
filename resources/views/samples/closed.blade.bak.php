@include('layouts.public-head-styles')
@include('layouts.head')

@section('scripts')
    @parent
    <script src="@staticVersion('/js/sampleEngine.min.js')"></script>
@endsection

@include('layouts.public-scripts')
@section('body')
    <body class="rtl pt-5" data-page="{{isset($global->page) ? $global->page : ''}}">
        <div class="container mt-md-5">
            <div class="card test-card shadow-sm mb-3">
                <div class="card-body">
                    <div class="card-title">{{$sample->scale->title}} <sup><small>{{$sample->edition}}</small></sup></div>
                    <div class="mb-5 text-center">
                        این نمونه به اتمام رسیده است
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection

@extends('layouts.app')
