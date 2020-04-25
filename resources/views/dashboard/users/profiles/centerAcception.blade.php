<div data-xhr="center-acception">
    @can('acception', $center)
        @if ($center->allows('acception') == 'request')
            <a href="{{route('dashboard.users.request')}}" class="btn btn-primary fs-10" data-lijax="click" data-method="POST" data-name="center_id" data-value="{{$center->id}}">
                <i class="far fa-plug fs-12"></i> {{__('Acception request')}}
            </a>
        @elseif($center->allows('acception') == 'accept')
            <a href="{{route('dashboard.users.accept')}}" class="btn btn-success fs-10" data-lijax="click" data-method="POST" data-name="center_id" data-value="{{$center->id}}">
                <i class="far fa-badge-check fs-12"></i> {{__('Accept')}}
            </a>
        @endif
    @else
        @if ($center->acception && $center->acception->kicked_at)
            <i class="far fa-minus-circle text-muted fs-12"></i> <span class="text-muted">{{__('Kicked')}}</span>
        @elseif($center->acception && !$center->acception->accepted_at)
            <span class="badge badge-ligth fs-10">
                {{__('Awaiting for acception')}}
            </span>
            @elseif($center->acception && $center->acception->accepted_at)
            <span class="d-flex align-items-baseline">
                <i class="far fa-badge-check text-primary fs-12 pt-1"></i>
                <span class="fs-10">{{__("You are is :position of this cenetr", ['position' => __(ucfirst($center->acception->position))])}}</span>
            </span>
        @endif
    @endcan
    @can('details', $center)
        <a href="{{route('dashboard.relationship.users.index', $center->id)}}" class="btn btn-light fs-10">
            <i class="far fa-address-book"></i>
            {{__('Center members')}}
        </a>
    @endcan
</div>
