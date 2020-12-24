@extends($layouts->dashboard)
@section('title')
@section('create-nav-link')
@if((!Gate::has("$module->resource.create") || Gate::allows("$module->resource.create", $module->parent ? ${$module->parent} : null)) && Route::has("$module->resource.create") && \Route::getCurrentRoute()->getAction('as') != "$module->resource.create")
    <a href="{{route("$module->resource.create", $module->parent ? request()->route()->parameters[$module->parent] : null)}}" class="badge badge-success mx-2">{{__("Join new user")}}</a>
@endif
@endsection
@endsection
@section('content')
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Users of :center', ['center' => $center->detail->title]) }} <sup>({{ $users->total() }})</sup>
            @filterBadge($users)
        </div>
        <div class="card-body p-0">
            @include('dashboard.center-users.list')
        </div>
    </div>
@endsection
