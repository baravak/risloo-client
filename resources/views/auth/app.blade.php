@include('layouts.head-styles')
@include('layouts.head')

@section('main')
    <div class="flex-1 bg-gray-50">
        <div class="flex justify-center">
            <div class="rounded w-full sm:w-80 mx-4 sm:mx-auto relative top-20">
                @if (auth()->check() && auth()->user())
                    <div class="mb-4">
                        <a href="{{ route(auth()->check() ? 'dashboard.home' : 'auth') }}" class="flex justify-center items-center mx-auto w-16 h-16 rounded overflow-hidden border border-gray-200 direct flex-shrink-0 bg-gray-300 text-gray-600 text-sm">
                            @avatarOrName(auth()->user())
                        </a>
                    </div>
                @else
                    <h1 class="text-center variable-font-black text-xl text-brand mb-4">
                        <a href="/" class="direct" title="{{ __('App Title') }}" aria-label="{{ __('App Title') }}">{{ __('App Title') }}</a>
                    </h1>
                @endif

                <h1 class="text-lg text-center variable-font-bold text-gray-900 mb-4 hidden">
                    <a href="{{ route(auth()->check() ? 'dashboard.home' : 'auth') }}" title="@if (auth()->check()){{ auth()->user()->name ?: __('Anonymouse') }}@else{{__('App Title')}}@endif" aria-label="@if (auth()->check()){{ auth()->user()->name ?: __('Anonymouse') }}@else{{__('App Title')}}@endif">
                        @if (auth()->check())
                            {{ auth()->user()->name ?: __('Anonymouse') }}
                        @else
                            {{__('App Title')}}
                        @endif
                    </a>
                </h1>

                <div data-xhr="form">
                    @hasSection ('form')
                        @yield('form')
                    @else
                        <form action="{{ route($route, $theoryRouteParms) }}" method="POST" data-form-page="auth" class="active">
                            @csrf
                            @yield('auth-form')
                        </form>
                    @endif
                    @yield('auth-nav')
                </div>
            </div>
            {{-- <div class="auth-images fixed bottom-0 w-full hidden">
                <img src="/images/graphics/1.png" alt="{{ __('App Title') }}" class="w-auto max-h-60 mx-auto md:hidden">
                <img src="/images/graphics/2.png" alt="{{ __('App Title') }}" class="w-auto max-h-60 mx-auto hidden">
                <img src="/images/graphics/3.png" alt="{{ __('App Title') }}" class="w-auto max-h-60 mx-auto hidden">
                <img src="/images/graphics/4.png" alt="{{ __('App Title') }}" class="w-auto max-h-60 mx-auto hidden">
                <img src="/images/graphics/5.png" alt="{{ __('App Title') }}" class="w-auto max-h-60 mx-auto hidden">
                <img src="/images/graphics/6.png" alt="{{ __('App Title') }}" class="w-auto max-h-60 mx-auto hidden">
                <img src="/images/graphics/7.png" alt="{{ __('App Title') }}" class="w-auto max-h-60 mx-auto hidden">
                <img src="/images/graphics/linear-2.png" alt="{{ __('App Title') }}" class="w-full mx-auto hidden md:block xl:hidden">
                <img src="/images/graphics/linear-3.png" alt="{{ __('App Title') }}" class="w-full mx-auto hidden xl:block 2xl:hidden">
                <img src="/images/graphics/linear-5.png" alt="{{ __('App Title') }}" class="w-full hidden 2xl:block">
            </div> --}}
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    @if (request()->authorized_key)
        <script>
            $('body').ready( function(){
                $('[data-form-page]').trigger('submit');
            });
        </script>
    @endif
@endsection
@include('layouts.scripts')
@include('layouts.body')
@extends('layouts.app')
