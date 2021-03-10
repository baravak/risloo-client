@extends($layouts->dashboard)
@section('content')
    <div class="flex justify-between items-center flex-wrap mb-4">
        @include('layouts.quick_search')
        @can('create', App\Room::class)
            <a href="{{ route("dashboard.rooms.create", ['center' => request()->center]) }}" class="flex items-center justify-center flex-shrink-0 w-10 sm:w-auto h-9 sm:px-4 text-sm text-green-700 border border-green-700 rounded-full hover:bg-green-50 transition mr-4" title="{{ __("Create new " . $module->singular) }}">
                <i class="fal fa-plus sm:ml-2"></i>
                <span class="hidden sm:inline">{{ __("Create new " . $module->singular) }}</span>
            </a>
        @endcan
    </div>
    @include('dashboard.rooms.items')
@endsection