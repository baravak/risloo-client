@foreach ($rooms as $room)
<span data-id="{{ $room->id }}">
    @displayName($room->manager)
        @if ($room->type == 'room')
            {{$room->center->detail->title}}
    @else
        {{__('Personal_clinic')}}
    @endif
</span>
@endforeach
