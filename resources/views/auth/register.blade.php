@section('auth-form')
    <div class="mb-4">
        <input type="text" class="w-full text-sm text-left dir-ltr placeholder-right border border-gray-200 rounded" id="mobile" name="mobile" placeholder="{{ __('Mobile') }}">
    </div>

    <button class="flex items-center justify-center text-sm w-full rounded-full h-10 bg-brand text-white hover:bg-brand-600 transition mb-8 focus" title="{{__('Register')}}" aria-label="{{__('Register')}}" role="button">{{__('Register')}}</button>
@endsection

@section('auth-nav')
    <div class="flex justify-center">
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