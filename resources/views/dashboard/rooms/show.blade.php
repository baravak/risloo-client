@extends($layouts->dashboard)

@section('content')
@if ($room->center)
    <div class="row">
        @include('dashboard.centers.listRaw', ['center' => $room->center])
    </div>
@endif
<div class="row">
    @include('dashboard.rooms.listRaw')
</div>
@endsection


