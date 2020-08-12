<div data-xhr="center-acceptation">
    @can('acceptation', $center)
        @if ($center->allows('acceptation') == 'request')
            <a href="{{route('dashboard.users.request')}}" class="btn btn-primary fs-10" data-lijax="click" data-method="POST" data-name="center_id" data-value="{{$center->id}}">
                <i class="far fa-plug fs-12"></i> {{__('Acceptation request')}}
            </a>
        @elseif($center->allows('acceptation') == 'accept')
            <a href="{{route('dashboard.users.accept')}}" class="btn btn-success fs-10" data-lijax="click" data-method="POST" data-name="center_id" data-value="{{$center->id}}">
                <i class="far fa-badge-check fs-12"></i> {{__('Accept')}}
            </a>
        @endif
    @else
        @if ($center->acceptation && $center->acceptation->kicked_at)
            <i class="far fa-minus-circle text-muted fs-12"></i> <span class="text-muted">{{__('Kicked')}}</span>
        @elseif($center->acceptation && !$center->acceptation->accepted_at)
            <span class="badge badge-ligth fs-10">
                {{__('Awaiting for acceptation')}}
            </span>
            @elseif($center->acceptation && $center->acceptation->accepted_at)
                <span class="fs-12">{{__("You are is :position of this cenetr", ['position' => __(ucfirst($center->acceptation->position))])}}</span>
        @endif
    @endcan
</div>
