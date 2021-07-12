@can('viewAny', [App\TherapyCase::class, $room])
    <div class="flex justify-between items-center flex-wrap mb-4 mt-8">
        <h3 class="heading" data-total="({{ $cases->total() }})" data-xhr="total">{{ __('Cases') }}</h3>
        @can('create', [App\TherapyCase::class, $room])
        <div class="flex justify-between flex-wrap">
            <a href="{{ route('dashboard.room.cases.create', $room->id) }}" class="flex items-center justify-center flex-shrink-0 w-9 sm:w-auto h-9 sm:px-4 text-sm text-white border bg-green-700 rounded-full hover:bg-green-900 transition mr-4 focus-current ring-green-700" title="{{ __('Create new case') }}">
                <i class="fal fa-plus sm:ml-2"></i>
                <span class="hidden sm:inline">{{ __('Create new case') }}</span>
            </a>
        </div>
        @endcan
    </div>
    @if (config('app.env') == 'local')
        <div class="mb-4">
            <div class="flex items-center flex-wrap">
                <label for="room-cases-tags" class="ml-2 text-gray-600 text-sm mb-2">فیلتر بر اساس برچسب‌ها:</label>
                <div class="flex items-center flex-wrap room-cases-tags">
                    <a href="#">استرس</a>
                    <a href="#">اضطراب</a>
                    <a href="#">زندگی زناشویی</a>
                    <a href="#" class="active">اعصاب و روان</a>
                    <a href="#">آسیب شناسی اجتماعی</a>
                </div>
            </div>
        </div>
    @endif
    @include($cases->count() ? 'dashboard.rooms.caseItems' : 'dashboard.emptyContent')
@endcan