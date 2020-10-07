@extends($layouts->dashboard)

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Reservation') }}
        </div>
        <div class="card-body p-0">
            {{-- @include($rooms->count() ? 'dashboard.rooms.list' : 'dashboard.emptyContent') --}}
        </div>
    </div>
@endsection
