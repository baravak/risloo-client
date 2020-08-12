<tr data-xhr="case-list-{{$case->id}}">
    <td>
        @id($case)
    </td>
    <td>
        <a href="{{$case->room->route('show')}}" class="text-decoration-none d-block">
            {{$case->manager->name}}
        </a>
        @if ($case->room->type == 'room')
            <a href="{{$case->room->center->route('show')}}" class="badge badge-light">
                {{$case->room->center->detail->title}}
            </a>
        @endif
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
