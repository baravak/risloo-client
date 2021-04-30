@if (isset($room))
@include('dashboard.schedules.room')
@else
@include('dashboard.schedules.center')
@endif
