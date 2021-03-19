@extends($layouts->dashboard)
@section('content')
    @include('dashboard.bulk-samples.bulk-sampleDetails')
    @includeWhen($bulkSample->cases && $bulkSample->cases->count(), 'dashboard.bulk-samples.cases')
    @include('dashboard.bulk-samples.users')
    @include('dashboard.bulk-samples.assessmentsList')
    @include('dashboard.bulk-samples.samplesList')
@endsection
