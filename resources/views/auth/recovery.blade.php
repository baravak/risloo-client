@section('auth-form')
    <h2 class="text-center variable-font-bold text-gray-800 mb-4 cursor-default">@lang('Recovery')</h2>
    <div class="mb-4">
        <input type="text" class="w-full text-sm text-left dir-ltr placeholder-right placeholder-gray-400 border border-gray-300 rounded" id="username" name="username" placeholder="{{ __('Mobile') }}">
        <div class="flex text-xs text-gray-400 mt-2 cursor-default leading-relaxed">
            <i class="fal fa-info-circle ml-1 mt-0.5"></i>
            <span>@lang('Recovery help')</span>
        </div>
    </div>
    <button class="flex items-center justify-center text-sm w-full rounded-full h-10 bg-brand text-white hover:bg-brand-600 transition focus" title="{{ __('Receive SMS code') }}" aria-label="{{ __('Receive SMS code') }}" role="button">{{ __('Receive SMS code') }}</button>
    <div class="text-xs text-gray-400 cursor-default leading-relaxed mt-4">
        <div>اگر عضو ریسلو هستید، روی گزینه <a href="{{ route('auth') }}" class="variable-font-semibold text-gray-500 hover:text-blue-600 transition">ورود</a> کلیک کنید.</div>
        <div>اگر عضو ریسلو نیستید، روی گزینه <a href="{{ route('register') }}" class="variable-font-semibold text-gray-500 hover:text-blue-600 transition">عضویت</a> کلیک کنید.</div>
    </div>
@endsection

@section('auth-nav')
    <div class="flex justify-center mt-8">
        <a href="{{ route('auth') }}" class="text-sm text-gray-700 hover:text-blue-600 transition" title="{{ __('Login') }}" aria-label="{{ __('Login') }}">{{ __('Login') }}</a>
        <span class="px-4 text-gray-500 cursor-default">|</span>
        <a href="{{ route('register') }}" class="text-sm text-gray-700 hover:text-blue-600 transition" title="{{ __('Register') }}" aria-label="{{ __('Register') }}">{{ __('Register') }}</a>
    </div>
@endsection

@extends('auth.theory')