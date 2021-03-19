@extends($layouts->dashboard)
@section('content')
    @include('dashboard.bulk-samples.bulk-sampleDetails')
    @include('dashboard.bulk-samples.cases')
    @include('dashboard.bulk-samples.users')
    @include('dashboard.bulk-samples.assessmentsList')
    @include('dashboard.bulk-samples.samplesList')
@endsection