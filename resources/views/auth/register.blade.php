@section('auth-form')
    <h2 class="text-center variable-font-bold text-gray-800 mb-4 cursor-default">@lang('Register')</h2>
    <div class="mb-4">
        <input type="text" class="w-full text-sm text-left dir-ltr placeholder-right placeholder-gray-400 border border-gray-300 rounded" id="mobile" name="mobile" placeholder="{{ __('Mobile') }}">
        <div class="flex text-xs text-gray-400 mt-2 cursor-default leading-relaxed">
            <i class="fal fa-info-circle ml-1 mt-0.5"></i>
            <span>@lang('Register help')</span>
        </div>
    </div>
    <button class="flex items-center justify-center text-sm w-full rounded-full h-10 bg-brand text-white hover:bg-brand-600 transition mb-4 focus" title="{{__('Continue')}}" aria-label="{{__('Continue')}}" role="button">{{__('Continue')}}</button>
    <div class="text-xs text-gray-400 cursor-default leading-relaxed mt-4">
        <div>اگر عضو ریسلو هستید، روی گزینه <a href="{{ route('dashboard.home') }}" class="variable-font-semibold text-gray-500 hover:text-blue-600 transition">ورود</a> کلیک کنید.</div>
        <div>اگر عضو ریسلو هستید و کلمه عبور خود را فراموش کرده‌اید روی گزینه <a href="{{ route('auth.recovery') }}" class="variable-font-semibold text-gray-500 hover:text-blue-600 transition">فراموشی کلمه عبور</a> کلیک کنید.</div>
    </div>
@endsection

@section('auth-nav')
    <div class="flex justify-center mt-8">
        @if (auth()->check())
            <a href="{{ route('dashboard.home') }}" class="text-sm text-gray-700 hover:text-blue-600 transition direct" title="{{ __('Dashboard') }}" aria-label="{{ __('Dashboard') }}">{{ __('Dashboard') }}</a>
            <span class="px-4 text-gray-500 cursor-default">|</span>
            <a href="{{ route('logout') }}" data-lijax="click" data-method="POST" class="text-sm text-gray-700 hover:text-blue-600 transition" title="{{ __('Logout') }}" aria-label="{{ __('Logout') }}">{{ __('Logout') }}</a>
        @else
            <a href="{{ route('auth', ['callback' => request()->callback]) }}" class="text-sm text-gray-700 hover:text-blue-600 transition" title="{{ __('Login') }}" aria-label="{{ __('Login') }}">{{ __('Login') }}</a>
            <span class="px-4 text-gray-500 cursor-default">|</span>
            <a href="{{ route('auth.recovery') }}" class="text-sm text-gray-700 hover:text-blue-600 transition" title="{{ __('Forgot Password') }}" aria="{{ __('Forgot Password') }}">{{ __('Forgot Password') }}</a>
        @endif
    </div>

    @if (request()->callback)
        <div class="border-r-2 border-yellow-400 bg-yellow-100 text-gray-800 py-3 px-2 mt-4 text-xs cursor-default">
            <span>{{ __("To continue the process you need to login or register") }}</span>
        </div>
    @endif
@endsection

@extends('auth.theory')