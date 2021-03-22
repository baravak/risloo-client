@section('auth-form')
    @if (request()->callback)
        <div class="mb-4">{{ __("To continue the process you need to login or register") }}</div>
    @endif

    <div class="mb-2">
        <input type="text" class="w-full text-sm border border-gray-200 rounded-sm" id="name" name="name" placeholder="{{ __('DisplayName') }}">
    </div>

    <div class="mb-4">
        <input type="text" class="w-full text-sm text-left dir-ltr placeholder-right border border-gray-200 rounded-sm" id="mobile" name="mobile" placeholder="{{ __('Mobile') }}">
    </div>

    <button class="text-sm w-full rounded-full h-10 bg-brand text-white hover:bg-brand-700 transition mb-8 focus">{{__('Register')}}</button>
@endsection

@section('auth-nav')
    <div class="flex justify-center">
        @if (auth()->check())
            <a href="{{ route('dashboard.home') }}" class="text-sm text-gray-700 hover:text-gray-900 transition direct">{{ __('Dashboard') }}</a>
            <span class="px-4 text-gray-500 cursor-default">|</span>
            <a href="{{ route('logout') }}" data-lijax="click" data-method="POST" class="text-sm text-gray-700 hover:text-gray-900 transition">{{ __('Logout') }}</a>
        @else
            <a href="{{ route('auth', ['callback' => request()->callback]) }}" class="text-sm text-gray-700 hover:text-gray-900 transition">{{ __('Login') }}</a>
            <span class="px-4 text-gray-500 cursor-default">|</span>
            <a href="{{ route('auth.recovery') }}" class="text-sm text-gray-700 hover:text-gray-900 transition">{{ __('Forgot Password') }}</a>
        @endif
    </div>
@endsection

@extends('auth.theory')