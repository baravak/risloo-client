@extends($layouts->dashboard)
@section('content')
    {{-- @include('dashboard.home.callToAction') --}}
    @include('dashboard.home.cases')
    @include('dashboard.home.samples')
    @include('dashboard.home.rooms')
    @include('dashboard.home.centers')
@endsection