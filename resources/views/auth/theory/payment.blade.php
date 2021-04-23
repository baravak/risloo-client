@section('form')
    <div class="mb-4">
        @if ($theory->response('status') == 'success')
            تراکنش با موفقیت انجام شد؛ به صورت خودکار به مرحله بعد منتقل خواهید شد
        @else
            مشکلی در روند تراکنش به وجود آمده‌است!
        @endif
    </div>
    @if (Cache::get(last(request()->segments())))
        <meta http-equiv = "refresh" content = "3; url = {{ request()->create(Cache::get(last(request()->segments()))['url'], 'GET', ['payment' => last(request()->segments())])->getUri() }}" />
    @else
        <meta http-equiv = "refresh" content = "3; url = {{ route('dashboard.home') }}" />
    @endif
@endsection
@section('auth-nav')
@endsection
@extends('auth.theory')
