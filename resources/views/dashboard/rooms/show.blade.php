@extends($layouts->dashboard)

@section('content')
    <div class="border border-gray-200 rounded-sm overflow-hidden">
        <div class="h-20 sm:h-28 bg-gradient-to-b from-blue-100 to-blue-50 border-b border-gray-200"></div>
        <div class="relative p-4">
                {{-- <div class="absolute top-3 left-3 flex">
                    <a href="" class="flex justify-center items-center flex-shrink-0 border border-gray-500 text-gray-600 hover:bg-gray-100 px-4 h-9 rounded-full text-sm leading-normal transition-all">
                        <span class="font-medium">{{ __('Edit') }}</span>
                    </a>
                </div> --}}
            <div class="flex justify-center items-center flex-shrink-0 w-24 h-24 md:w-32 md:h-32 -mt-16 md:-mt-20 bg-gray-300 text-gray-600 text-2xl rounded-full border-4 border-white overflow-hidden mb-4 relative">@avatarOrName($room->manager)</div>
            <h2 class="font-bold text-lg text-gray-900 cursor-default">@displayName($room->manager)</h2>
        </div>
    </div>

    <div class="mb-4 mt-8">
        <h3 class="flex items-center font-bold text-gray-700 cursor-default">
            <span class="w-8 border-t border-gray-200 inline-block ml-3"></span>
            <span>{{ __('Cases') }}</span>
            <span class="text-xs text-gray-600 font-light mr-2" data-xhr="total">({{ $cases->total() }})</span>
        </h3>
    </div>

    <div class="flex justify-between items-center flex-wrap mb-4">
        @include('layouts.quick_search')
        @can('create', [App\TherapyCase::class, $room])
            <a href="{{ route('dashboard.cases.create', ['room' => $room->id]) }}" class="flex items-center justify-center flex-shrink-0 w-10 sm:w-auto h-10 sm:px-4 text-sm text-green-700 border border-green-700 rounded-full hover:bg-green-50 transition mr-4" title="{{ __('Create new case') }}">
                <i class="fal fa-plus sm:ml-2"></i>
                <span class="hidden sm:inline">{{ __('Create new case') }}</span>
            </a>
        @endcan
    </div>

    @include($cases->count() ? 'dashboard.rooms.caseItems' : 'dashboard.emptyContent')
@endsection
