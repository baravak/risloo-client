<tr data-xhr="case-list-{{$case->id}}">
    <td>
        @id($case)
    </td>
    <td>
        @room($case->room)
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
