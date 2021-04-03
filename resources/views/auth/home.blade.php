@section('auth-form')
    <div class="mb-4">
        <input type="text" class="w-full text-sm text-left dir-ltr placeholder-right border border-gray-200 rounded focus:ring-1 focus:ring-brand @error('authorized_key') 'is-invalid' @enderror" id="authorized_key" name="authorized_key" value="{{ app('request')->authorized_key }}" placeholder="{{ auth()->check() ? __('Entry Command') : __('Phone, Email or Username') }}">
        @error('authorized_key')
        <div class="flex items-center text-xs text-red-500">
            <i class="fal fa-exclamation-triangle ml-1"></i>
            <span>{{ $message }}</span>
        </div>
        @enderror
    </div>
    <button title="{{ auth()->check() ? __('Check') : __('Check and continue') }}" aria-label="{{ auth()->check() ? __('Check') : __('Check and continue') }}" role="button" class="flex items-center justify-center w-full h-10 text-sm rounded-full bg-brand text-white hover:bg-brand-600 transition mb-8 focus">{{ auth()->check() ? __('Check') : __('Check and continue') }}</button>
@endsection

@section('auth-nav')
    <div class="flex justify-center">
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
