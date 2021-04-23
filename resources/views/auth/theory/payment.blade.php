@section('form')
    <div class="mb-4">
        تراکنش موفق
    </div>
    @if (Cache::get(last(request()->segments())))
        <meta http-equiv = "refresh" content = "3; url = {{ request()->create(Cache::get(last(request()->segments()))['url'], 'GET', ['payment' => last(request()->segments())])->getUri() }}" />
    @else
        <meta http-equiv = "refresh" content = "3; url = {{ route('dashboard.home') }}" />
    @endif
@endsection

@extends('auth.theory')
