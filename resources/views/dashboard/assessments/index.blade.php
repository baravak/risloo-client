@extends($layouts->dashboard)

@section('content')
    <div>
        <div class="mb-4 mt-8">
            <h3 class="flex items-center font-bold text-gray-700 cursor-default">
                <span class="w-8 border-t border-gray-200 inline-block ml-3"></span>
                <span>{{ __('Assessments') }}</span>
                <span class="text-xs text-gray-600 font-light mr-1">({{ $assessments->total() }})</span>
            </h3>
        </div>
        
        <div class="flex items-center w-full mb-4">
            <input type="search" placeholder="{{ __('Search') }}" class="w-full px-3 h-7 rounded border border-gray-200 font-light text-sm placeholder-gray-300">
        </div>
        @include($assessments && $assessments->count() ? 'dashboard.assessments.assessmentsList' : 'dashboard.assessments.emptyAssessments')
    </div>
@endsection
