@extends($layouts->dashboard)
@section('content')
    <div class="flex justify-between items-center flex-wrap mb-4">
        @include('layouts.quick_search')
    </div>
    @include('dashboard.rooms.items')
@endsection
