<div class="d-flex align-items-center fs-12">
    <div class="ml-2 d-none d-md-inline-block">
        <a href="#" class="media media-light rounded-circle">
        <span>
            @avatarOrName($room->manager)
        </span>
    </a>
    </div>
    <div>
        @if ($room->center->type == 'personal_clinic')
            <div class="font-weight-bold">
                <a href="{{$room->center->route('show')}}" class="text-decoration-none d-block">
                    @displayName($room->center->detail)
                </a>
            </div>
        @else
            <div class="font-weight-bold">
                <a href="{{$room->route('show')}}" class="text-decoration-none d-block">
                    @displayName($room->manager)
                </a>
            </div>
            <div>
                <a href="{{$room->center->route('show')}}" class="badge badge-light">
                    @displayName($room->center->detail)
                </a>
            </div>
        @endif

    </div>
</div>
