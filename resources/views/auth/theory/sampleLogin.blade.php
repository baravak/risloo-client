@section('auth-form')
    <div class="mb-2">
        {{ __("At the end of this step, your personal details will be visible to the managers of therapy centers and therapy rooms.") }}
    </div>

    <div class="mb-4">
        <input type="text" class="w-full text-sm text-left dir-ltr placeholder-right border border-gray-200 rounded-sm" id="nickname" name="nickname" placeholder="{{ __('Nickname') }}">
    </div>

    <button class="w-full h-10 text-sm rounded-full bg-brand text-white hover:bg-brand-700 transition mb-8 focus">{{ __('Enter') }}</button>
@endsection

@extends('auth.theory')
