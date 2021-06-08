@extends($layouts->dashboard)
@section('content')
    {{-- <h2 class="text-gray-700 variable-font-bold mb-4">@lang('Welcome to risloo')</h2>
    @include('dashboard.home.client') --}}
    @include('dashboard.home.cases')
    @include('dashboard.home.samples')
    @include('dashboard.home.rooms')
    @include('dashboard.home.centers')
@endsection