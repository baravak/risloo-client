<div>
    <div class="flex justify-between items-center flex-wrap mt-8 mb-4">
        <h2 class="heading" data-total="({{ $case->sessions ? $case->sessions->count() : 0 }})" data-xhr="total">{{ __('Sessions') }}</h2>

        @can('manager', $case)
            <div>
                <a href="{{ route('dashboard.case.schedules.create', ['case'=>$case->id]) }}" class="flex items-center justify-center flex-shrink-0 w-9 sm:w-auto h-9 sm:px-4 text-sm text-white border bg-green-700 rounded-full hover:bg-green-900 transition mr-4 focus-current ring-green-700" title="{{ __('Create new session') }}">
                    <i class="fal fa-plus sm:ml-2"></i>
                    <span class="hidden sm:inline">{{ __('Add session') }}</span>
                </a>
            </div>
        @endcan
    </div>

    @include($case->sessions && $case->sessions->count() ? 'dashboard.cases.sessionsList' : 'dashboard.cases.emptySessions')

    {{-- {{ $sessions->links() }} --}}
</div>
