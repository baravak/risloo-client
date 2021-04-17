<div>
    <div class="flex justify-between items-center mt-8 mb-4">
        <div>
            <h3 class="flex items-center font-bold text-gray-700 cursor-default">
                <span class="w-8 border-t border-gray-200 inline-block ml-3"></span>
                <span>{{ __('Samples') }}</span>
                <span class="text-xs text-gray-600 font-light mr-2" data-xhr="total">({{ $samples && $samples->count() ? $samples->count() : 0 }})</span>
            </h3>
        </div>
        @can('dashboard.cases.manager', $case)
        <div>
            <a href="{{ route('dashboard.samples.create', ['room' => $room->id, 'case' => $case->id, 'session' => $session->id]) }}" class="flex justify-center items-center flex-shrink-0 border border-green-700 text-green-700 px-4 w-9 sm:w-auto h-9 rounded-full text-xs leading-normal hover:bg-green-50 transition-all">
                <i class="fal fa-plus sm:ml-2"></i>
                <span class="hidden sm:inline">{{ __('Create new sample') }}</span>
            </a>
        </div>
        @endcan
    </div>
    @include($samples && $samples->count() ? 'dashboard.sessions.samplesList' : 'dashboard.sessions.emptySamples')
</div>