@extends($layouts->dashboard)
@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        @include('dashboard.home.centers')
        @include('dashboard.home.rooms')
    </div>
    @include('dashboard.home.cases')
    @include('dashboard.home.samples')
@endsection