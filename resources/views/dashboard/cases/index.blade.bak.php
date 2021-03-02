@extends($layouts->dashboard)

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Cases') }} <sup>({{ $cases->total() }})</sup>
            @filterBadge($cases)
        </div>
        <div class="card-body p-0">
            @include($cases->count() ? 'dashboard.cases.list' : 'dashboard.emptyContent')
        </div>
    </div>
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{$cases->links()}}
        </div>
    </div>
@endsection
