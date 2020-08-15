<div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3" data-xhr="center-list-{{$room->id}}">
    <div class="card card-center mb-3 overflow-hidden">
        <div class="card-header d-flex align-items-center trianglify-pattern-{{$room->created_at->timestamp % 16}}">
            <div class="card-wall-media">
                <a href="#" class="media media-light rounded-circle">
                    <span>
                        @avatarOrName($room->manager)
                    </span>
                </a>
            </div>
            <div class="px-3">
                <div>
                    <h6 class="font-weight-bolder">
                        <a href="{{$room->route('show')}}" class="text-decoration-none text-dark">
                            @displayName($room->manager)
                        </a>
                        @php
                            $acceptation = auth()->user()->centers ? auth()->user()->centers->where('id', $room->center->id)->first() : false;
                            if($acceptation)
                            {
                                $acceptation = $acceptation->acceptation;
                            }
                        @endphp
                        @can('viewAny', [\App\RoomUser::class, $room])
                            <a class="badge badge-info fs-10 p-1" href="{{route('dashboard.room.users.index', $room->id)}}"><i class="far fa-users"></i></a>
                        @endcan
                    </h6>
                </div>
                <div>
                    <span class="fs-10">
                        @if ($room->type == 'room')
                            <a href="{{route('dashboard.centers.show', $room->center->id)}}" class="text-decoration-none text-dark">
                                {{$room->center->detail->title}}
                            </a>
                        @else
                            {{__('Personal_clinic')}}
                        @endif
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
