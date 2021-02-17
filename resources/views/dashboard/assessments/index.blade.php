@extends($layouts->dashboard)

@section('content')
    <div>
        <div class="mb-4 mt-8">
            <h3 class="flex items-center font-bold text-gray-700 cursor-default">
                <span class="w-8 border-t border-gray-200 inline-block ml-3"></span>
                <span>{{ __('Assessments') }}</span>
                <span class="text-xs text-gray-600 font-light mr-2">({{ $assessments->total() }})</span>
            </h3>
        </div>

        <div class="flex items-center w-full mb-4">
            @include('layouts.quick_search')
        </div>
        @include('dashboard.assessments.list')
    </div>
@endsection
