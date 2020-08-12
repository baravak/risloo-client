<div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3" data-xhr="center-list-{{$center->id}}">
    <div class="card card-center mb-3 overflow-hidden">
        <div class="card-header d-flex align-items-center trianglify-pattern-{{$center->created_at->timestamp % 16}}">
            <div class="card-wall-media">
                <a href="#" class="media media-light rounded-circle">
                    <span>
                        @avatarOrName($center->detail)
                    </span>
                </a>
            </div>
            <div class="px-3">
                <div>
                    <h6 class="font-weight-bolder">
                        <a href="{{$center->route('show')}}" class="text-decoration-none text-dark">
                            @displayName($center->detail)
                        </a>
                    </h6>
                </div>
                <div>
                    @if(isset($center->acceptation->position) && $center->acceptation->accepted_at && !$center->acceptation->kicked_at)

                        <div class="fs-10"><strong>{{__('You are is :position of this cenetr', ['position' => __(ucfirst($center->acceptation->position))])}}</strong></div>
                    @endif
                    @can('acceptation', $center)
                        <a href="{{route('dashboard.centers.request', $center->id)}}" class="btn btn-sm btn-primary fs-10" data-lijax="click" data-method="POST">
                            {{__('Acceptation request')}}
                        </a>
                    @else
                        @if ($center->acceptation && $center->acceptation->kicked_at)
                            <i class="far fa-minus-circle text-muted fs-12"></i> <span class="text-muted">{{__('Kicked')}}</span>
                        @elseif($center->acceptation && !$center->acceptation->accepted_at)
                            <span class="fs-10">
                                {{__('Awaiting')}}
                            </span>
                        @endif
                    @endcan
                    @can('update', $center)
                        <a class="badge badge-info fs-10 p-1" href="{{route('dashboard.centers.edit', $center->id)}}"><i class="far fa-edit"></i></a>
                        <a class="badge badge-info fs-10 p-1" href="{{route('dashboard.center.users.index', $center->id)}}"><i class="far fa-users"></i></a>
                    @endcan
                </div>
            </div>
        </div>
        <div class="card-body trianglify-color-{{$center->created_at->timestamp % 16}}">
            <div class="row">
                <div class="col-12 text-center mb-2">
                    {{$center->detail->description}}
                </div>
            </div>
            <div class="row">
                @if ($center->type == 'counseling_center')
                    <div class="col-7">
                        <span class="fs-12">{{__('Manager')}}:</span> <address class="d-inline fs-12 mb-0">{{$center->manager->name}}</address>
                    </div>
                @endif
                @if ($center->type == 'counseling_center')
                <div class="col-7">
                    <a class="badge badge-info fs-10 p-1" href="{{route('dashboard.rooms.index', ['center' => $center->id])}}">{{__('Therapy rooms')}}</a>
                </div>
                @endif
                <div class="col-7">
                    <i class="far fa-map-marker-alt fs-12"></i> <address class="d-inline fs-12 mb-0">{{$center->detail->address}}</address>
                </div>
                <div class="col-5 text-left direction-ltr">
                    <div>
                        @foreach ($center->detail->phone_numbers ?: [] as $number)
                            <div>
                                <i class="far fa-mobile fs-12"></i>
                                <a href="tel:{{$number}}" class="fs-12 text-decoration-none text-dark direct">
                                    {{$number}}
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
