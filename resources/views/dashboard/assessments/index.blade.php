@extends($layouts->dashboard)
@section('content')
    <div>
        <div class="mb-4 mt-8">
            <h2 class="heading" data-total="({{ $assessments->total() }})" data-xhr="total">{{ __('Assessments') }}</h2>
        </div>

        <div class="mb-4">
            @include('layouts.quick_search')
        </div>
        @include('dashboard.assessments.list')
    </div>
@endsection