@section('auth-form')
    <div class="mb-4">
        <input type="authorized_key"  disabled value="{{ $theory->response('authorized_key') }}" class="w-full text-sm text-left dir-ltr placeholder-right border border-gray-200 rounded-sm" id="authorized_key" name="authorized_key">
    </div>
    <div class="mb-4">
        <input type="password" class="w-full text-sm text-left dir-ltr placeholder-right border border-gray-200 rounded-sm" id="code" name="code" placeholder="{{ __('Code')}} ">
    </div>

    <button class="w-full h-10 text-sm rounded-full bg-brand text-white hover:bg-brand-700 transition mb-8 focus">{{ __('Check') }}</button>
@endsection

@extends('auth.theory')