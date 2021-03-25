<div>
    <div class="flex justify-between items-center flex-wrap mt-8 mb-4">
        <h2 class="heading" data-total="({{ $case->samples ? $case->samples->count() : 0 }})" data-xhr="total">{{ __('Samples') }}</h2>

        @can('manager', $case)
            <div>
                <a href="{{ route('dashboard.samples.create', ['case'=>$case->id]) }}" class="flex items-center justify-center flex-shrink-0 w-10 sm:w-auto h-9 sm:px-4 text-sm text-green-700 border border-green-700 rounded-full hover:bg-green-50 transition mr-4" title="{{ __('Create new sample') }}">
                    <i class="fal fa-plus sm:ml-2"></i>
                    <span class="hidden sm:inline">{{ __('Create new sample') }}</span>
                </a>
            </div>
        @endcan
    </div>

    @include($case->samples && $case->samples->count() ? 'dashboard.cases.samplesList' : 'dashboard.cases.emptySamples')

    {{-- {{ $sessions->links() }} --}}
</div>
