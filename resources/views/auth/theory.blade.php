@section('auth-nav')
    <div class="flex justify-center">
        @if (!auth()->check())
            <a href="{{ route('auth') }}" class="text-sm hover:text-brand transition">{{ __('Login') }}</a>
            @if (config('auth.registration', true))
                <span class="px-4 text-gray-500 cursor-default">|</span>
                <a href="{{ route('register') }}" class="text-sm hover:text-brand transition">{{ __('Register') }}</a>
            @endif
            <span class="px-4 text-gray-500 cursor-default">|</span>
            <a href="{{ route('auth.recovery') }}" class="text-sm hover:text-brand transition">{{ __('Forgot Password') }}</a>
        @else
            <a href="{{ route('dashboard.home') }}" class="text-sm font-bold direct hover:text-brand transition">{{ __('Dashboard') }}</a>
            <span class="px-4 text-gray-500 cursor-default">|</span>
            <a href="{{ route('logout') }}" data-lijax="click" data-method="POST" class="text-sm hover:text-red-600 transition">{{ __('Logout') }}</a>
        @endif
    </div>
@endsection

@extends($ajax ? 'auth.xhr' : 'auth.app')