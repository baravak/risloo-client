@section('auth-form')
<div class="mb-4">
    <input type="authorized_key"  disabled value="{{ $theory->response('authorized_key') }}" class="w-full text-sm text-left dir-ltr text-gray-400 border border-gray-200 rounded h-10 px-3" id="authorized_key" name="authorized_key">
</div>
    <div class="mb-4">
        <input type="password" class="w-full h-10 text-sm text-left dir-ltr placeholder-right border border-gray-200 rounded" id="password" name="password" placeholder="{{ __('Password') }}">
    </div>

    <button class="flex items-center justify-center w-full h-10 text-sm rounded-full bg-brand text-white hover:bg-brand-700 transition mb-8 focus">{{ __('Change password' )}}</button>
@endsection

@section('auth-nav')
    <div class="flex justify-center">
        <a href="{{ route('auth') }}" class="text-sm">{{ __('Login') }}</a>
        <span class="px-4 text-gray-500">|</span>
        <a href="{{ route('register') }}" class="text-sm">{{ __('Register') }}</a>
    </div>
@endsection

@extends('auth.theory')