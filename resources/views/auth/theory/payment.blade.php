@section('form')
    <div class="mb-4">
        <input type="hidden" id="payment-status" value="{{ $theory->response('status') }}">
        @if ($theory->response('status') == 'success')
            تراکنش با موفقیت انجام شد؛
        @else
            مشکلی در روند تراکنش به وجود آمده‌است!
        @endif
    </div>
    <meta http-equiv = "refresh" content = "3; url = {{ route('dashboard.payments.index') }}" />
@endsection
@section('auth-nav')
@endsection
@extends('auth.theory')
