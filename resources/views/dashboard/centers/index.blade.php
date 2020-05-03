@extends($layouts->dashboard)

@section('content')
    @if (false)
        <div class="card mb-3">
            <div class="card-header">
                {{ __('Therapy centers') }} <sup>({{ $centers->total() }})</sup>
                @filterBadge($centers)
            </div>
            <div class="card-body p-0">
                @include($centers->count() ? 'dashboard.centers.list' : 'dashboard.emptyContent')
            </div>
        </div>
    @endif

    @include($centers->count() ? 'dashboard.centers.list' : 'dashboard.emptyContent')
@endsection