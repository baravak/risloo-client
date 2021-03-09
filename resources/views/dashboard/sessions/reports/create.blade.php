@extends('dashboard.create')
@section('form_content')
    <div class="mt-4">
        <label for="encryption_type" data-alias="manager_id" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Encryption type') }}</label>
        <select class="w-100" name="encryption_type" id="encryption_type">
            <option value="none" {!! !$session->encryption_type ? 'selected' : '' !!}>{{ __('Without encryption') }}</option>
            @if (auth()->user()->public_key)
                <option value="publicKey" {!! $session->encryption_type == 'publicKey' || !$session->report ? 'selected' : '' !!}>{{ __('With my public-key') }}</option>
            @endif
        </select>
    </div>

    @if (!auth()->user()->public_key)
        <div class="bg-gray-50 border-r-2 border-gray-300 p-4 mt-4" role="alert">
            <span class="block text-gray-700 text-sm">متن گزارش جلسه‌ای که قصد دارید ثبت کنید بدون کدگذاری ذخیره خواهد شد؛ برای این‌که مطمئن باشید هیچ فردی، حتی سرویس ریسلو دسترسی به متن گزارش جلسات درمانی شما نداشته باشد، برای ما کلید عمومی رمزگذاری خود را ارسال کنید.</span>
            <a href="{{ route('dashboard.users.me.edit') }}#key-tab" class="inline-flex justify-center items-center min-w-min h-9 px-4 text-blue-700 text-sm border border-blue-700 rounded-full hover:bg-blue-100 transition mt-4">{{ __('Send public key') }}</a>
        </div>
    @endif

    <div class="mt-4">
        <label for="report" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Report text') }}</label>
        <textarea id="report" name="report" data-encType="{{ $session->encryption_type }}" @formValue($document->description) rows="10" class="resize-none border border-gray-500 rounded px-4 py-2 w-full text-sm placeholder-gray-300 focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">{{ $session->report }}</textarea>
    </div>

    @if (auth()->user()->public_key)
    <div class="mt-4 bg-gray-50 border-r-2 border-gray-300 p-4" id="encrypt_alert" role="alert">
        <span class="block text-gray-700 text-sm">قبل از ثبت گزارش، دکمه «رمزگذاری» را بزنید و وقتی رمزگذاری به پایان رسید دکمه «ثبت گزارش» را برای ارسال کلیک کنید</span>
        <button type="button" class="inline-flex justify-center items-center min-w-min h-9 px-4 text-blue-700 text-sm border border-blue-700 rounded-full hover:bg-blue-100 transition mt-4">{{ __('Encryption') }}</button>
    </div>
    @endif
@endsection
