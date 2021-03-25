@extends('dashboard.create')
@section('form_content')
        <div class="form-group form-group-m">
            <select class="form-control form-control-m mb-3" name="encryption_type" id="encryption_type">
                <option value="none" {!! !$session->encryption_type ? 'selected' : '' !!}>{{ __('Without encryption') }}</option>
                @if (auth()->user()->public_key)
                    <option value="publicKey" {!! $session->encryption_type == 'publicKey' || !$session->report ? 'selected' : '' !!}>{{ __('With my public-key') }}</option>
                @endif
            </select>
            <label for="encryption_type">{{__('Encryption type')}}</label>
        </div>
        @if (!auth()->user()->public_key)
        <div class="alert alert-info" role="alert">
            <p>متن گزارش جلسه‌ای که قصد دارید ثبت کنید بدون کدگذاری ذخیره خواهد شد؛ برای این‌که مطمئن باشید هیچ فردی، حتی سرویس ریسلو دسترسی به متن گزارش جلسات درمانی شما نداشته باشد، برای ما کلید عمومی رمزگذاری خود را ارسال کنید.</p>
            <a href="{{ route('dashboard.users.me.edit') }}#public-key" class="btn btn-primary">ارسال کلید عمومی من</a>
          </div>
        @endif
        <div class="form-group form-group-m">
            <textarea data-encType="{{ $session->encryption_type }}" class="form-control form-control-m fs-12" style="resize: none" id="report" name="report" rows="15">{{ $session->report }}</textarea>
            <label for="report">{{__('Report text')}}</label>
        </div>
        @if (auth()->user()->public_key)
        <div class="alert alert-info fs-12 d-none" id="encrypt_alert" role="alert">
            <p>
                قبل از ثبت گزارش، دکمه «رمزگذاری» را بزنید و وقتی رمزگذاری به پایان رسید دکمه «ثبت گزارش» را برای ارسال کلیک کنید
            </p>
            <button class="btn btn-primary fs-12" type="button">رمزگذاری</button>
        </div>
        @endif
@endsection
