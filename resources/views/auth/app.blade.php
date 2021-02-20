@include('layouts.head-styles')
@include('layouts.head')

@section('main')
    <div class="flex-1 flex justify-center items-center">
        <div class="rounded w-full sm:w-80 mx-4 sm:mx-auto bg-white" style="margin-bottom: 10vw;">
            <h1 class="text-center font-black text-xl text-brand mb-8">
                <a href="/" class="direct">{{ __('App Title') }}</a>
            </h1>
            @if (auth()->check() && auth()->user()->avatar_url->url('large'))
                <div class="mb-4">
                    <a href="{{ route(auth()->check() ? 'dashboard.home' : 'auth') }}" class="block mx-auto w-20 h-20 rounded overflow-hidden border border-gray-200 direct">
                        <img src="{{ auth()->user()->avatar_url->url('large') }}" alt="{{ auth()->user()->name ?: __('Anonymouse') }}" class="rounded">
                    </a>
                </div>
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
            <img src="/images/graphics/main-linear.png" alt="{{ __('App Title') }}" class="hidden lg:block object-cover object-center w-full">
            <img src="/images/graphics/main.png" alt="{{ __('App Title') }}" class="lg:hidden object-cover object-center w-full">
        </div>
    </div>
@endsection

@include('layouts.scripts')
@include('layouts.body')
@extends('layouts.app')