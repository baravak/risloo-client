<tr data-xhr="room-list-{{$room->id}}">
    <td>
        @id($room)
    </td>
    <td>
        <a href="{{$room->manager->route('show')}}" class="text-decoration-none d-block pl-2">
            @if ($room->type == 'clinic')
                {{__('Personal clinic of :user', ['user' => $room->manager->name])}}
            @else
                {{__('Therapy room of :user', ['user' => $room->manager->name])}}
            @endif
        </a>
        @if ($room->type != 'clinic')
        <a href="{{$room->owner->route('show')}}" class="badge badge-light p-2">
            @displayName($room->owner)
        </a>
        @endif
    </td>
</tr>
