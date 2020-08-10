@section('create-nav-link')
{{-- @if(Gate::allows("create", $room) && Route::has("$module->resource.create") && \Route::getCurrentRoute()->getAction('as') != "$module->resource.create") --}}
    <a href="{{route("dashboard.rooms.create", ['center' => request()->center])}}" class="badge badge-success mx-2">{{__("Create new " . $module->singular)}}</a>
{{-- @endif --}}
@endsection

@extends($layouts->dashboard)
@section('content')
    @include($rooms->count() ? 'dashboard.rooms.list' : 'dashboard.emptyContent')
@endsection
