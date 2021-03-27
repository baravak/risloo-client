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
