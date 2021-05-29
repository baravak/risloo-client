@section('auth-form')
    <button class="flex items-center justify-center w-full h-10 text-sm rounded-full bg-brand text-white hover:bg-brand-600 transition mb-8 focus" title="{{ __('Confirm registration') }}" aria-label="{{ __('Confirm registration') }}" role="button">{{ __('Confirm registration') }}</button>
@endsection

@extends('auth.theory')