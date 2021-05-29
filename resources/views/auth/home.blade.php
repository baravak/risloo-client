@section('auth-form')
    <h2 class="text-center variable-font-bold text-gray-800 mb-4 cursor-default">@lang('Login')</h2>
    <div class="mb-4">
        <input autofocus type="text" class="w-full text-sm text-left dir-ltr placeholder-right placeholder-gray-400 border border-gray-300 rounded focus" id="authorized_key" name="authorized_key" value="{{ app('request')->authorized_key }}" placeholder="{{ auth()->check() ? __('Entry Command') : __('Mobile') }}">
        <div class="flex text-xs text-gray-400 mt-2 cursor-default leading-relaxed">
            <i class="fal fa-info-circle ml-1 mt-0.5"></i>
            <span>@lang('Login help')</span>
        </div>
        @error('authorized_key')
        <div class="flex items-center text-xs text-red-500">
            <i class="fal fa-exclamation-triangle ml-1"></i>
            <span>{{ $message }}</span>
        </div>
        @enderror
    </div>
    <button title="{{ auth()->check() ? __('Check') : __('Continue') }}" aria-label="{{ auth()->check() ? __('Check') : __('Continue') }}" role="button" class="flex items-center justify-center w-full h-10 text-sm rounded-full bg-brand text-white hover:bg-brand-600 transition focus">{{ auth()->check() ? __('Check') : __('Continue') }}</button>
    <div class="text-xs text-gray-400 cursor-default leading-relaxed mt-4">
        <div>اگر عضو ریسلو نیستید، روی گزینه <a href="{{ route('register') }}" class="variable-font-semibold text-gray-500 hover:text-blue-600 transition">عضویت</a> کلیک کنید.</div>
        <div>اگر عضو ریسلو هستید و کلمه عبور خود را فراموش کرده‌اید روی گزینه <a href="{{ route('auth.recovery') }}" class="variable-font-semibold text-gray-500 hover:text-blue-600 transition">فراموشی کلمه عبور</a> کلیک کنید.</div>
    </div>

@endsection

@section('auth-nav')
    <div class="flex justify-center mt-8">
        @if (auth()->check())
            <a href="{{ route('dashboard.home') }}" class="variable-font-bold text-sm direct hover:text-blue-600" title="{{ __('Dashboard') }}" aria-label="{{ __('Dashboard') }}">{{ __('Dashboard') }}</a>
            <span class="px-4 text-gray-500 cursor-default">|</span>
            <a href="{{ route('logout') }}" data-lijax="click" data-method="POST" class="text-sm hover:text-red-600 transition" title="{{__('Logout')}}" aria-label="{{ __('Logout') }}">{{__('Logout')}}</a>
        @else
            @if (config('auth.registration', true))
                <a href="{{ route('register', ['callback' => request()->callback]) }}" class="text-sm variable-font-bold text-gray-700 hover:text-blue-600 transition" title="{{ __('Register') }}" aria-label="{{ __('Register') }}">{{ __('Register') }}</a>
            @endif
            <span class="px-4 text-gray-500 cursor-default">|</span>
            <a href="{{ route('auth.recovery') }}" class="text-sm text-gray-700 hover:text-blue-600 transition" title="{{ __('Forgot Password') }}" aria-label="{{ __('Forgot Password') }}">{{ __('Forgot Password') }}</a>
        @endif
    </div>

    @if (request()->callback)
    <div class="border-r-2 border-yellow-400 bg-yellow-100 text-gray-800 py-3 px-2 mt-4 text-xs cursor-default">
        <span>{{ __("To continue the process you need to login or register") }}</span>
    </div>
@endif
@endsection

@section('scripts')
@parent
@error('authorized_key')
<script>
    iziToast.error({message: '{{ $message }}'});
</script>
@enderror
@endsection
@extends($ajax ? 'auth.xhr' : 'auth.app')
