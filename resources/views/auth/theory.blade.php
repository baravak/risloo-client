@section('auth-nav')
    <div class="flex justify-center">
        @if (!auth()->check())
            <a href="{{ route('auth') }}" class="text-sm hover:text-blue-600 transition" title="{{ __('Login') }}" aria-label="{{ __('Login') }}">{{ __('Login') }}</a>
            @if (config('auth.registration', true))
                <span class="px-4 text-gray-500 cursor-default">|</span>
                <a href="{{ route('register') }}" class="text-sm hover:text-blue-600 transition" title="{{ __('Register') }}" aria-label="{{ __('Register') }}">{{ __('Register') }}</a>
            @endif
            <span class="px-4 text-gray-500 cursor-default">|</span>
            <a href="{{ route('auth.recovery') }}" class="text-sm hover:text-blue-600 transition" title="{{ __('Forgot Password') }}" aria-label="{{ __('Forgot Password') }}">{{ __('Forgot Password') }}</a>
        @else
            <a href="{{ route('dashboard.home') }}" class="text-sm variable-font-bold direct hover:text-blue-600 transition" title="{{ __('Dashboard') }}" aria-label="{{ __('Dashboard') }}">{{ __('Dashboard') }}</a>
            <span class="px-4 text-gray-500 cursor-default">|</span>
            <a href="{{ route('logout') }}" data-lijax="click" data-method="POST" class="text-sm hover:text-red-600 transition" title="{{ __('Logout') }}" aria-label="{{ __('Dashboard') }}">{{ __('Logout') }}</a>
        @endif
    </div>
@endsection

@extends($ajax ? 'auth.xhr' : 'auth.app')