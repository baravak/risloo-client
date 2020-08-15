@extends($layouts->dashboard)

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Samples') }} <sup>({{ $samples->total() }})</sup>
            @filterBadge($samples)
        </div>
        <div class="card-body p-0">
            @include($samples->count() ? 'dashboard.samples.list' : 'dashboard.emptyContent')
        </div>
    </div>
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{$samples->links()}}
        </div>
    </div>
@endsection
