@extends($layouts->dashboard)

@section('content')
<div class="card mb-3">
    <div class="card-header">
        {{ __('Room of :center', ['center' => ($room->center ?: $room)->detail->title]) }} <sup>({{ $users->total() }})</sup>
        @filterBadge($users)
    </div>
    <div class="card-body p-0">
        @include('dashboard.room-users.list')
    </div>
</div>
@endsection
