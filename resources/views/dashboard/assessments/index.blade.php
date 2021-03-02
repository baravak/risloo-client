@extends($layouts->dashboard)
@section('content')
    <div>
        <div class="mb-4 mt-8">
            <h3 class="heading" data-total="({{ $assessments->total() }})" data-xhr="total">{{ __('Assessments') }}</h3>
        </div>

        <div class="flex items-center w-full mb-4">
            @include('layouts.quick_search')
        </div>
        @include('dashboard.assessments.list')
    </div>
@endsection