@if ($room->type == 'personal_clinic')
    @include('dashboard.centers.personalShow')
@else
    @include('dashboard.rooms.roomShow')
@endif
