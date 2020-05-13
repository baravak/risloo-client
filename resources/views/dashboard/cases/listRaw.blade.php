<tr data-xhr="case-list-{{$case->id}}">
    <td>
        @id($case)
    </td>
    <td>
        <a href="{{$case->manager->route('show')}}" class="text-decoration-none d-block">
            {{$case->manager->name}}
        </a>
        <a href="{{$case->room->center->owner->route('show')}}" class="badge badge-light">
            @if ($case->room->type == 'room')
                {{$case->room->center->owner->name}}
            @else
                {{__('Personal clinic')}}
            @endif
        </a>
    </td>
    <td>
        @foreach ($case->clients as $item)
            <a href="{{$item->user->route('show')}}" class="text-decoration-none d-inline-block">
                {{$item->user->name}}
            </a>
            @if (!$loop->last)
                -
            @endif
        @endforeach
    </td>
</tr>
