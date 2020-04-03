<tr data-xhr="raltionship-users-list-{{$user->id}}">
    <td>
        @id($user)
    </td>
    <td>
        <a href="{{$user->user->route('show')}}">
            @displayName($user->user)
        </a>
    </td>
    <td>
        @can ('updateCreator', $user)
            <select name="creator_id" data-lijax="change" data-action="{{route('dashboard.relationship.users.update', ['relationshipUser'=> $user->id])}}" data-method="PUT">
                <option value="{{$user->creator->id}}">{{$user->creator->name}}</option>
                <option value="{{$relationship->owner->id}}">{{$relationship->owner->name ?: $relationship->owner->id}}</option>
                <option value="{{$relationship->manager->id}}">{{$relationship->manager->name ?: $relationship->manager->id}}</option>
            </select>
        @else
            <a href="{{$user->creator->route('show')}}">
                @displayName($user->creator)
            </a>
        @endcan
    </td>
    <td>
        @can('changePosition', $user)
            <select name="position" id="position" data-lijax="change" data-action="{{route('dashboard.relationship.users.update', ['relationshipUser'=> $user->id])}}" data-method="PUT">
                @foreach ($user->can('changePosition') as $item)
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
        @can('update', $user)
            <button class="btn btn-sm btn-clear p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="far fa-cogs fs-12 text-primary"></i>
                <span class="fs-12">
                    @if(!$user->accepted_at)
                        {{__('Awaiting')}}
                    @elseif($user->kicked_at)
                        {{__('Kicked') . ' '. $user->kicked_at}}
                    @else
                        {{__('Accepted')}}
                    @endif
                </span>
            </button>
            <div class="dropdown-menu">
                @if(!$user->accepted_at)
                    <a href="{{route('dashboard.relationship.users.update', ['relationshipUser'=> $user->id])}}" class="dropdown-item fs-12" data-lijax="click" data-method="PUT" data-name="status" data-value="accept">
                        <i class="fal fa-user-secret text-primary"></i> {{__('Accept')}}
                    </a>
                @elseif($user->kicked_at)
                    <a href="{{route('dashboard.relationship.users.update', ['relationshipUser'=> $user->id])}}" class="dropdown-item fs-12" data-lijax="click" data-method="PUT" data-name="status" data-value="return">
                        <i class="fal fa-user-secret text-primary"></i> {{__('Return')}}
                    </a>
                @else
                    <a href="{{route('dashboard.relationship.users.update', ['relationshipUser'=> $user->id])}}" class="dropdown-item fs-12" data-lijax="click" data-method="PUT" data-name="status" data-value="kick">
                        <i class="fal fa-user-secret text-primary"></i> {{__('Kick')}}
                    </a>
                @endif
            </div>
        @else
            @if(!$user->accepted_at)
                {{__('Awaiting')}}
            @elseif($user->kicked_at)
                {{__('Kicked') . ' '. $user->kicked_at}}
            @else
                {{__('Accepted')}}
            @endif
        @endcan
    </td>
</tr>
