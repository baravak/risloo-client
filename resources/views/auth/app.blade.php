@include('layouts.head-styles')
@include('layouts.head')

@section('main')
    <div class="flex-1 flex justify-center items-center bg-gray-50">
        <div class="rounded w-full sm:w-80 mx-4 sm:mx-auto" style="margin-bottom: 20vw;">
            @if (auth()->check() && auth()->user()->avatar_url->url('large'))
                <div class="mb-4">
                    <a href="{{ route(auth()->check() ? 'dashboard.home' : 'auth') }}" class="block mx-auto w-20 h-20 rounded overflow-hidden border border-gray-200 direct">
                        <img src="{{ auth()->user()->avatar_url->url('large') }}" alt="{{ auth()->user()->name ?: __('Anonymouse') }}" title="{{ auth()->user()->name ?: __('Anonymouse') }}" class="rounded">
                    </a>
                </div>
            @else
                <h1 class="text-center font-black text-xl text-brand mb-8">
                    <a href="/" class="direct">{{ __('App Title') }}</a>
                </h1>
            @endif

            <h1 class="text-lg text-center font-bold text-gray-900 mb-4 hidden">
                <a href="{{ route(auth()->check() ? 'dashboard.home' : 'auth') }}">
                    @if (auth()->check())
                        {{ auth()->user()->name ?: __('Anonymouse') }}
                    @else
                        {{__('App Title')}}
                    @endif
                </a>
            </h1>

            <div data-xhr="form">
                <form action="{{ route(Route::currentRouteName(), $theoryRouteParms) }}" method="POST" data-form-page="auth" class="active">
                    @csrf
                    @yield('auth-form')
                </form>
                @yield('auth-nav')
            </div>
        </div>

        <div class="absolute bottom-0 w-full">
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
        </div>
    </div>
@endsection

@include('layouts.scripts')
@include('layouts.body')
@extends('layouts.app')
