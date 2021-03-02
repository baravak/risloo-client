@extends($layouts->dashboard)
@section('content')
    <div>
        <div class="mt-8 mb-4">
            <h3 class="heading" data-total="({{ $users->total() }})" data-xhr="total">{{ __('Room of :center', ['center' => ($room->center ?: $room)->detail->title]) }}</h3>
        </div>

        <div class="flex justify-between items-center flex-wrap mb-4">
            @include('layouts.quick_search')
            @if((!Gate::has("$module->resource.create") || Gate::allows("$module->resource.create", $module->parent ? ${$module->parent} : null)) && Route::has("$module->resource.create") && \Route::getCurrentRoute()->getAction('as') != "$module->resource.create")
                <a href="{{ route("$module->resource.create", $module->parent ? request()->route()->parameters[$module->parent] : null) }}" class="flex items-center justify-center flex-shrink-0 w-10 sm:w-auto h-9 sm:px-4 text-sm text-green-700 border border-green-700 rounded-full hover:bg-green-50 transition mr-4" title="{{ __('Join new user') }}">
                    <i class="fal fa-plus sm:ml-2"></i>
                    <span class="hidden sm:inline">{{ __('Add user') }}</span>
                </a>
            @endif
        </div>
        @include('dashboard.room-users.list')
    </div>
@endsection