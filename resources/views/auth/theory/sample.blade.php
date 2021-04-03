@section('auth-form')
    <div class="mb-4">
        <input type="password" class="w-full text-sm text-left dir-ltr placeholder-right border border-gray-200 rounded" id="password" name="password" placeholder="{{ __('Passowrd') }}">
    </div>

    <button class="w-full h-10 text-sm rounded-full bg-brand text-white hover:bg-brand-600 transition mb-8 focus" title="{{ __('Check') }}" aria-label="{{ __('Check') }}" role="button">{{ __('Check') }}</button>
@endsection

@extends('auth.theory')
