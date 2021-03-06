@section('auth-form')
    <div class="mb-4">
        <input type="authorized_key" disabled value="{{ str_replace('98', '0', $theory->response('authorized_key'))  }}" class="w-full text-sm text-left dir-ltr text-gray-400 border border-gray-200 rounded h-10 px-3" id="authorized_key" name="authorized_key">
    </div>
    <div class="mb-4">
        <input autofocus type="password" class="w-full h-10 text-sm text-left dir-ltr placeholder-right border border-gray-200 rounded" id="password" name="password" placeholder="{{ __('Password') }}">
    </div>

    <button class="flex items-center justify-center w-full h-10 text-sm rounded-full bg-brand text-white hover:bg-brand-600 transition mb-8 focus" title="{{ __('Change password' )}}" aria-label="{{ __('Change password' )}}" role="button">{{ __('Change password' )}}</button>
@endsection

@section('auth-nav')
    <div class="flex justify-center">
        <a href="{{ route('auth') }}" class="text-sm text-gray-700 hover:text-blue-600 transition" title="{{ __('Login') }}" aria-label="{{ __('Login') }}">{{ __('Login') }}</a>
        <span class="px-4 text-gray-500">|</span>
        <a href="{{ route('register') }}" class="text-sm text-gray-700 hover:text-blue-600 transition" title="{{ __('Register') }}" aria-label="{{ __('Register') }}">{{ __('Register') }}</a>
    </div>
@endsection

@extends('auth.theory')
