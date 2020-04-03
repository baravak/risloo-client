@extends($layouts->dashboard)

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Clinics and Psychologists') }} <sup>({{ $clinics->total() }})</sup>
            @filterBadge($clinics)
        </div>
        <div class="card-body p-0">
            @include($clinics->count() ? 'dashboard.clinics.list' : 'dashboard.emptyContent')
        </div>
    </div>
@endsection
