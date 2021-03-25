@include('layouts.public-head-styles')
@include('layouts.head')

@section('scripts')
    @parent
    <script src="@staticVersion('/js/sampleEngine.min.js')"></script>
@endsection

@include('layouts.public-scripts')
@section('body')
    <body class="flex flex-col" data-page="{{isset($global->page) ? $global->page : ''}}">
        <div class="container mx-auto pt-8 px-4">
            <div class="flex items-center mb-3 cursor-default">
                <span class="w-8 border-t border-gray-200 inline-block ml-3"></span>
                <h1 class="font-bold text-2xl text-gray-800">{{ $sample->scale->title }}</h1>
                <span class="text-sm text-gray-500 mr-2">{{ $sample->edition }}</span>
            </div>
            <div class="flex items-center justify-between border border-gray-200 rounded p-4 mt-4">
                <span class="text-gray-500">{{ __('Sample closed') }}</span>
                <a href="#" class="flex items-center justify-center text-sm text-brand hover:text-white border border-brand rounded-full hover:bg-brand transition px-8 h-9">{{ __('Return') }}</a>
            </div>
        </div>
    </body>
@endsection

@extends('layouts.app')