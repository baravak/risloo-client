@section('auth-form')
    <div class="mb-4">
        <input type="password" class="w-full text-sm text-left dir-ltr placeholder-right border border-gray-200 rounded-sm" id="password" name="password" placeholder="{{__('Password')}}">
    </div>

    <button class="w-full h-10 text-sm rounded-full bg-brand text-white hover:bg-brand-700 transition mb-8 focus">{{ __('Login') }}</button>
@endsection

@extends('auth.theory')