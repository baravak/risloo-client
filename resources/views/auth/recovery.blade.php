@section('auth-form')
    <div class="mb-4">
        <input type="text" class="w-full text-sm text-left dir-ltr placeholder-right border border-gray-200 rounded-sm" id="username" name="username" placeholder="{{ __('Mobile') }}">
    </div>
    <button class="flex items-center justify-center text-sm w-full rounded-full h-10 bg-brand text-white hover:bg-brand-700 transition mb-8 focus">{{ __('Receive code') }}</button>
@endsection

@section('auth-nav')
    <div class="flex justify-center">
        <a href="{{ route('auth') }}" class="text-sm text-gray-700 hover:text-brand transition">{{ __('Login') }}</a>
        <span class="px-4 text-gray-500 cursor-default">|</span>
        <a href="{{ route('register') }}" class="text-sm text-gray-700 hover:text-brand transition">{{ __('Register') }}</a>
    </div>
@endsection

@extends('auth.theory')