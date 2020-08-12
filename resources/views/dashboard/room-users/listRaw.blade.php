<tr data-xhr-fold=".list-raw" data-xhr="center-users-list-{{$user->id}}">
    <td>
        @id($user)
    </td>
    <td>
        <a href="{{$user->user->route('show')}}">
            @displayName($user->user)
        </a>
    </td>
    <td class="d-none d-md-table-cell">
        <a href="{{$user->creator->route('show')}}">
            @displayName($user->creator)
        </a>
    </td>
    <td>
        <div>
            {{__(ucfirst($user->position))}}
        </div>
        <div class="fs-10 mt-1">
            @if($user->kicked_at)
                {{__('Kicked')}}
            @elseif(!$user->accepted_at)
                {{__('Awaiting')}}
            @else
                {{__('Accepted')}}
            @endif
        </div>
    </td>
    <td>
        <div>
            @time($user->accepted_at)
        </div>
        <div class="text-danger">
            @time($user->kicked_at)
        </div>
    </td>
    <td>
        @can('update', [$user])
            <button class="btn btn-sm btn-clear p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="far fa-cogs fs-12 text-primary"></i>
            </button>
            <div class="dropdown-menu">
                @if($user->kicked_at)
                    <a href="{{route('dashboard.room.users.update', ['room' => $room->id, 'user'=> $user->id])}}" class="dropdown-item fs-12" data-lijax="click" data-method="PUT" data-xhrBase='row' data-name="status" data-value="accept">
                        <i class="fal fa-user-check text-primary"></i> {{__('Accept')}}
                    </a>
                @elseif(!$user->accepted_at)
                    <a href="{{route('dashboard.room.users.update', ['room' => $room->id, 'user'=> $user->id])}}" class="dropdown-item fs-12" data-lijax="click" data-method="PUT" data-xhrBase='row' data-name="status" data-value="accept">
                        <i class="fal fa-user-check text-primary"></i> {{__('Accept')}}
                    </a>
                    <a href="{{route('dashboard.room.users.update', ['room' => $room->id, 'user'=> $user->id])}}" class="dropdown-item fs-12" data-lijax="click" data-method="PUT" data-xhrBase='row' data-name="status" data-value="kick">
                        <i class="fal fa-minus-circle text-danger"></i> {{__('Kick')}}
                    </a>
                @else
                    <a href="{{route('dashboard.room.users.update', ['room' => $room->id, 'user'=> $user->id])}}" class="dropdown-item fs-12" data-lijax="click" data-method="PUT" data-xhrBase='row' data-name="status" data-value="kick">
                        <i class="fal fa-minus-circle text-danger"></i> {{__('Kick')}}
                    </a>
                @endif
                @if ((auth()->isAdmin() || $room->acceptation->position == 'manager') && in_array($user->position, ['manager', 'psychologist', 'operator']) && !isset($user->meta->room_id))
                    <a href="{{route('dashboard.rooms.create', ['room' => $room->id, 'user'=> $user->id])}}" class="dropdown-item fs-12">
                        <i class="fal fa-home-heart text-primary"></i> {{__('Create room')}}
                    </a>
                @endif
            </div>
        @endcan
    </td>
</tr>
