@section('auth-form')
    <div class="mb-2">
        {{ __("At the end of this step, your personal details will be visible to the managers of therapy centers and therapy rooms.") }}
    </div>

    <div class="mb-4">
        <input type="password" class="w-full text-sm text-left dir-ltr placeholder-right border border-gray-200 rounded" id="code" name="code" placeholder="{{ __('Sample code') }}">
    </div>

    <button class="flex items-center justify-center w-full h-10 text-sm rounded-full bg-brand text-white hover:bg-brand-600 transition mb-8 focus" title="{{ __('Enter the sample') }}">{{ __('Enter the sample') }}</button>
@endsection

@extends('auth.theory')