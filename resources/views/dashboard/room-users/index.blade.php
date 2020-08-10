@extends($layouts->dashboard)

@section('content')
<div class="card mb-3">
    <div class="card-header">
        {{ __('Room of :center', ['center' => ($room->center ?: $room)->detail->title]) }} <sup>({{ $users->total() }})</sup>
        @filterBadge($users)
    </div>
    <div class="card-body p-0">
        <div class="row">
            @if ($room->center)
                @include('dashboard.centers.listRaw', ['center' => $room->center])
            @endif
            @include('dashboard.rooms.listRaw')
        </div>
        @include('dashboard.room-users.list')
    </div>
</div>
@endsection
