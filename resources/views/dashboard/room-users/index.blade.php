@extends($layouts->dashboard)
@section('content')
    <div>
        <div class="flex items-center mb-4 mt-8">
            <span class="w-8 border-t border-gray-200 inline-block ml-3"></span>
            <h3 class="flex items-center font-bold text-gray-700 cursor-default">
                {{ __('Room of :center', ['center' => ($room->center ?: $room)->detail->title]) }}
            </h3>
            <span class="text-xs text-gray-600 font-light mr-2" data-xhr="total">({{ $users->total() }})</span>
        </div>

        <div class="flex justify-between items-center flex-wrap mb-4">
            @include('layouts.quick_search')
            @if((!Gate::has("$module->resource.create") || Gate::allows("$module->resource.create", $module->parent ? ${$module->parent} : null)) && Route::has("$module->resource.create") && \Route::getCurrentRoute()->getAction('as') != "$module->resource.create")
                <a href="{{ route("$module->resource.create", $module->parent ? request()->route()->parameters[$module->parent] : null) }}" class="flex items-center justify-center flex-shrink-0 w-10 sm:w-auto h-9 sm:px-4 text-sm text-green-700 border border-green-700 rounded-full hover:bg-green-50 transition mr-4" title="{{ __('Join new user') }}">
                    <i class="fal fa-plus sm:ml-2"></i>
                    <span class="hidden sm:inline">{{ __('Join new user') }}</span>
                </a>
            @endif
        </div>
        @include('dashboard.room-users.list')
    </div>
@endsection