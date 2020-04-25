<tr data-xhr="center-list-{{$center->id}}">
    <td>
        <a href="{{$center->owner->route('show')}}" class="text-decoration-none">
            @displayName($center->owner){!!$center->owner->type == 'psychologist' ? '<span class="badge badge-light fs-8"> ('.__('Clinic').')</span>' : ''!!}
        </a>
    </td>
    <td>
        @can('acception', $center)
            @if ($center->allows('acception') == 'request')
                <a href="{{route('dashboard.centers.request')}}" class="badge badge-secondary fs-10" data-lijax="click" data-method="POST" data-name="center_id" data-value="{{$center->id}}">
                    <i class="far fa-plug fs-12"></i> {{__('Acception request')}}
                </a>
            @elseif($center->allows('acception') == 'accept')
                <a href="{{route('dashboard.centers.accept')}}" class="badge badge-success fs-10" data-lijax="click" data-method="POST" data-name="center_id" data-value="{{$center->id}}">
                    <i class="far fa-badge-check fs-12"></i> {{__('Accept')}}
                </a>
            @endif
        @else
            @if ($center->acception && $center->acception->kicked_at)
                <i class="far fa-minus-circle text-muted fs-12"></i> <span class="text-muted">{{__('Kicked')}}</span>
            @elseif($center->acception && !$center->acception->accepted_at)
            <span class="fs-10">
                {{__('Awaiting')}}
            </span>
            @elseif($center->acception && $center->acception->accepted_at)
                <span class="badge badge-light align-middle">
                    <i class="far fa-badge-check text-primary fs-12 pt-1"></i>
                    <span>{{__(ucfirst($center->acception->position))}}</span>
                </span>
            @endif
        @endcan
    </td>
</tr>
