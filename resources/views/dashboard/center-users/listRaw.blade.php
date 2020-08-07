<tr data-xhr-fold=".list-raw" data-xhr="center-users-list-{{$user->id}}">
    <td>
        @id($user)
    </td>
    <td>
        <a href="{{$user->user->route('show')}}">
            @displayName($user->user)
        </a>
    </td>
    <td>
        <a href="{{$user->creator->route('show')}}">
            @displayName($user->creator)
        </a>
    </td>
    <td>
        @can('update', [$user, 'position'])
            <select name="position" id="position" data-lijax="change" data-action="{{route('dashboard.center-users.update', ['center'=> $center->id, 'user'=> $user->id])}}" data-method="PUT" data-xhrBase='row'>
                @php
                    $positions = ['manager', 'operator', 'client', 'psychologist', 'under_supervision'];
                    if(!auth()->isAdmin() && $center->manager->id != auth()->id())
                    {
                        array_shift($positions);
                        if($center->acception->position != 'manager')
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
    </td>
    <td>
        {{__(ucfirst($user->accepted_at))}}
    </td>
    <td>
        @can('update', [$user])
            <button class="btn btn-sm btn-clear p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="far fa-cogs fs-12 text-primary"></i>
                <span class="fs-12">
                    @if($user->kicked_at)
                        {{__('Kicked') . ' '. $user->kicked_at}}
                    @elseif(!$user->accepted_at)
                        {{__('Awaiting')}}
                    @else
                        {{__('Accepted')}}
                    @endif
                </span>
            </button>
            <div class="dropdown-menu">
                @if($user->kicked_at)
                    <a href="{{route('dashboard.center-users.update', ['center' => $center->id, 'user'=> $user->id])}}" class="dropdown-item fs-12" data-lijax="click" data-method="PUT" data-xhrBase='row' data-name="status" data-value="accept">
                        <i class="fal fa-user-check text-primary"></i> {{__('Accept')}}
                    </a>
                @elseif(!$user->accepted_at)
                    <a href="{{route('dashboard.center-users.update', ['center' => $center->id, 'user'=> $user->id])}}" class="dropdown-item fs-12" data-lijax="click" data-method="PUT" data-xhrBase='row' data-name="status" data-value="accept">
                        <i class="fal fa-user-check text-primary"></i> {{__('Accept')}}
                    </a>
                    <a href="{{route('dashboard.center-users.update', ['center' => $center->id, 'user'=> $user->id])}}" class="dropdown-item fs-12" data-lijax="click" data-method="PUT" data-xhrBase='row' data-name="status" data-value="kick">
                        <i class="fal fa-minus-circle text-danger"></i> {{__('Kick')}}
                    </a>
                @else
                    <a href="{{route('dashboard.center-users.update', ['center' => $center->id, 'user'=> $user->id])}}" class="dropdown-item fs-12" data-lijax="click" data-method="PUT" data-xhrBase='row' data-name="status" data-value="kick">
                        <i class="fal fa-minus-circle text-danger"></i> {{__('Kick')}}
                    </a>
                @endif
            </div>
        @else
            @if($user->kicked_at)
                {{__('Kicked') . ' '. $user->kicked_at}}
            @elseif(!$user->accepted_at)
                {{__('Awaiting')}}
            @else
                {{__('Accepted')}}
            @endif
        @endcan
    </td>
</tr>
