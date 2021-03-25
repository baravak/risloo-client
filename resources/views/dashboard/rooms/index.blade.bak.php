@section('create-nav-link')
    @can('create', App\Room::class)
        <a href="{{route("dashboard.rooms.create", ['center' => request()->center])}}" class="badge badge-success mx-2">{{__("Create new " . $module->singular)}}</a>
    @endcan
@endsection

@extends($layouts->dashboard)
@section('content')
    @include($rooms->count() ? 'dashboard.rooms.list' : 'dashboard.emptyContent')

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{$rooms->links()}}
        </div>
    </div>
@endsection
