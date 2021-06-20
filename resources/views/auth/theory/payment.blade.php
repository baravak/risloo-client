@section('form')
    <div class="mb-4">
        <input type="hidden" id="payment-status" value="{{ $theory->response('status') }}">
        @if ($theory->response('status') == 'success')
            تراکنش با موفقیت انجام شد؛ درحال انتقال به صفحه مورد نظر
            <meta http-equiv = "refresh" content = "3; url = {{ Cache::get(request()->route('key'), ['url' => route('dashboard.payments.index')])['url'] }}" />
        @else
            <div>
                مشکلی در روند تراکنش به وجود آمده‌است! اگر احساس می‌کنید اشکال در سیستم ریسلو هست، با مرکز خود مورد را در جریان بگذارید
            </div>
            <a href="{{ route('dashboard.home') }}">رفتن به میزکار</a>
        @endif
    </div>
@endsection
@section('auth-nav')
@endsection
@extends('auth.theory')
