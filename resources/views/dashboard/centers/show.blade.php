@section('relationship-detail')
        {{-- @include('dashboard.centers.myRooms') --}}

        <div class="flex justify-between items-center mt-8 mb-4">
            <h2 class="heading" data-total="({{ $rooms->total() }})" data-xhr="total">{{ __('Rooms') }}</h2>
        </div>

        <div class="flex justify-between items-center flex-wrap mb-4">
            @include('layouts.quick_search')
            @can('create', [App\Room::class, $center])
                <a href="{{ route('dashboard.center.rooms.create', ['center' => $center->id]) }}" class="flex items-center justify-center flex-shrink-0 w-10 sm:w-auto h-9 sm:px-4 text-sm text-green-700 border border-green-700 rounded-full hover:bg-green-50 transition mr-4" title="{{ __('Create new room') }}">
                    <i class="fal fa-plus sm:ml-2"></i>
                    <span class="hidden sm:inline">{{ __('Create new room') }}</span>
                </a>
            @endcan
        </div>

        @include('dashboard.centers.rooms')
@endsection
@extends('dashboard.centers.centerShow')
