<tr data-xhr-fold=".list-raw" data-xhr="raltionship-users-list-{{$user->id}}">
    <td>
        @id($user)
    </td>
    <td>
        <a href="{{$user->user->route('show')}}">
            @displayName($user->user)
        </a>
    </td>
    <td>
        @if($user->allows('creator'))
            <select name="creator_id" data-lijax="change" data-action="{{route('dashboard.relationship.users.update', ['relationshipUser'=> $user->id])}}" data-method="PUT">
                @foreach ($user->allows('creator') as $item)
                    <option value="{{$item->id}}" {{$item->id == $user->creator->id ? 'selected' : ''}}>{{$item->name}}</option>
                @endforeach
            </select>
        @else
            <a href="{{$user->creator->route('show')}}">
                @displayName($user->creator)
            </a>
        @endif
    </td>
    <td>
        @if($user->allows('position'))
            <select name="position" id="position" data-lijax="change" data-action="{{route('dashboard.relationship.users.update', ['relationshipUser'=> $user->id])}}" data-method="PUT">
                @foreach ($user->allows('position') as $item)
                    <option value="{{$item}}" {{$user->position == $item ? 'selected' : ''}}>{{__(ucfirst($item))}}</option>
                @endforeach
            </select>
        @else
            {{__(ucfirst($user->position))}}
        @endif
    </td>
    <td>
        {{__(ucfirst($user->accepted_at))}}
    </td>
    <td>
        @if($user->allows('status'))
            <button class="btn btn-light btn-sm fs-10" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="far fa-cog"></i>
                <span>
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
                @foreach ($user->allows('status') as $acceptation)
                    <a href="{{route('dashboard.relationship.users.update', ['relationshipUser'=> $user->id])}}" class="dropdown-item fs-10" data-lijax="click" data-method="PUT" data-name="status" data-value="{{$acceptation}}">
                        <i class="fal fa-user-secret"></i> {{__(ucfirst($acceptation))}}
                    </a>
                @endforeach
            </div>
        @else
            @if($user->kicked_at)
                {{__('Kicked') . ' '. $user->kicked_at}}
            @elseif(!$user->accepted_at)
                {{__('Awaiting')}}
            @else
                {{__('Accepted')}}
            @endif
        @endif
    </td>
</tr>
