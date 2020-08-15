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
            @can('update', [$user, 'position'])
                <select name="position" id="position" data-lijax="change" data-action="{{route('dashboard.center.users.update', ['center'=> $center->id, 'user'=> $user->id])}}" data-method="PUT" data-xhrBase='row'>
                    @php
                        $positions = ['manager', 'operator', 'client', 'psychologist'];
                        if(!auth()->isAdmin() && $center->manager->id != auth()->id())
                        {
                            array_shift($positions);
                            if($center->acceptation->position != 'manager')
                            {
                                array_shift($positions);
                            }
                        }
                    @endphp
                    @foreach ($positions as $item)
                        <option value="{{$item}}" {{$user->position == $item ? 'selected' : ''}}>{{__(ucfirst($item))}}</option>
                    @endforeach
                </select>
            @else
                {{__(ucfirst($user->position))}}
            @endcan
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
            @responsiveTime($user->accepted_at)
        </div>
        <div class="text-danger">
            @responsiveTime($user->kicked_at)
        </div>
    </td>
    <td>
        @can('update', [$user])
            <button class="btn btn-sm btn-clear p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="far fa-cogs fs-12 text-primary"></i>
            </button>
            <div class="dropdown-menu">
                @if($user->kicked_at)
                    <a href="{{route('dashboard.center.users.update', ['center' => $center->id, 'user'=> $user->id])}}" class="dropdown-item fs-12" data-lijax="click" data-method="PUT" data-xhrBase='row' data-name="status" data-value="accept">
                        <i class="fal fa-user-check text-primary"></i> {{__('Accept')}}
                    </a>
                @elseif(!$user->accepted_at)
                    <a href="{{route('dashboard.center.users.update', ['center' => $center->id, 'user'=> $user->id])}}" class="dropdown-item fs-12" data-lijax="click" data-method="PUT" data-xhrBase='row' data-name="status" data-value="accept">
                        <i class="fal fa-user-check text-primary"></i> {{__('Accept')}}
                    </a>
                    <a href="{{route('dashboard.center.users.update', ['center' => $center->id, 'user'=> $user->id])}}" class="dropdown-item fs-12" data-lijax="click" data-method="PUT" data-xhrBase='row' data-name="status" data-value="kick">
                        <i class="fal fa-minus-circle text-danger"></i> {{__('Kick')}}
                    </a>
                @else
                    <a href="{{route('dashboard.center.users.update', ['center' => $center->id, 'user'=> $user->id])}}" class="dropdown-item fs-12" data-lijax="click" data-method="PUT" data-xhrBase='row' data-name="status" data-value="kick">
                        <i class="fal fa-minus-circle text-danger"></i> {{__('Kick')}}
                    </a>
                @endif
                @can('create', [\App\Room::class, $user])
                    @isset($user->meta->room_id)
                        <a href="{{route('dashboard.rooms.show', ['room' => $user->meta->room_id])}}" class="dropdown-item fs-12">
                            <i class="fal fa-home-heart text-primary"></i> {{__('Therapy room of :user', ['user' => $user->user->name])}}
                        </a>
                    @else
                        <a href="{{route('dashboard.rooms.create', ['center' => $center->id, 'user'=> $user->id])}}" class="dropdown-item fs-12">
                            <i class="fal fa-home-heart text-primary"></i> {{__('Create room')}}
                        </a>
                    @endisset
                @endcan
            </div>
        @elsecan('create', [\App\Room::class, $user])
            <button class="btn btn-sm btn-clear p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="far fa-cogs fs-12 text-primary"></i>
            </button>
            <div class="dropdown-menu">
                @isset($user->meta->room_id)
                    <a href="{{route('dashboard.rooms.show', ['room' => $user->meta->room_id])}}" class="dropdown-item fs-12">
                        <i class="fal fa-home-heart text-primary"></i> {{__('Therapy room of :user', ['user' => $user->user->name])}}
                    </a>
                @else
                    <a href="{{route('dashboard.rooms.create', ['center' => $center->id, 'user'=> $user->id])}}" class="dropdown-item fs-12">
                        <i class="fal fa-home-heart text-primary"></i> {{__('Create room')}}
                    </a>
                @endisset
            </div>
        @endcan
    </td>
</tr>
