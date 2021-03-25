@extends($layouts->dashboard)

@section('content')
    <div class="border border-gray-200 rounded-sm overflow-hidden">
        <div class="h-20 sm:h-28 bg-gradient-to-b from-blue-100 to-blue-50 border-b border-gray-200"></div>
        <div class="relative p-4">
            @if ($room->type == 'personal_clinic')
                @include('dashboard.centers.showButtons', ['center' => $center])
            @else
                <div class="absolute top-3 left-3 flex">
                    @can('viewAny', [App\RoomUser::class, $room])
                        <a href="{{ route($room->type == 'personal_clinic' ? 'dashboard.center.users.index' : 'dashboard.room.users.index', $room->id) }}" title="{{ __('Users') }}" class="flex justify-center items-center flex-shrink-0 text-brand border border-brand hover:bg-blue-50 w-9 h-9 rounded-full transition">
                            <i class="fal fa-users"></i>
                        </a>
                    @endcan
                </div>
            @endif
            <div class="flex justify-center items-center flex-shrink-0 w-24 h-24 md:w-32 md:h-32 -mt-16 md:-mt-20 bg-gray-300 text-gray-600 text-2xl rounded-full border-4 border-white overflow-hidden mb-4 relative">@avatarOrName($room->manager)</div>
            <h2 class="font-bold text-lg text-gray-900 cursor-default">@displayName($room->manager)</h2>
        </div>
    </div>
    @can('viewAny', [App\TherapyCase::class, $room])
        <div class="flex justify-between items-center flex-wrap mb-4 mt-8">
            <h3 class="heading" data-total="({{ $cases->total() }})" data-xhr="total">{{ __('Cases') }}</h3>
            @can('create', [App\TherapyCase::class, $room])
                <a href="{{ route('dashboard.room.cases.create', $room->id) }}" class="flex items-center justify-center flex-shrink-0 w-9 sm:w-auto h-9 sm:px-4 text-sm text-green-700 border border-green-700 rounded-full hover:bg-green-50 transition mr-4" title="{{ __('Create new case') }}">
                    <i class="fal fa-plus sm:ml-2"></i>
                    <span class="hidden sm:inline">{{ __('Create new case') }}</span>
                </a>
            @endcan
        </div>

        @include($cases->count() ? 'dashboard.rooms.caseItems' : 'dashboard.emptyContent')
    @endcan
@endsection
