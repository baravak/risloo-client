@extends($layouts->dashboard)

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Relationships') }} <sup>({{ $relationships->total() }})</sup>
            @filterBadge($relationships)
        </div>
        <div class="card-body p-0">
            @include($relationships->count() ? 'dashboard.relationships.list' : 'dashboard.emptyContent')
        </div>
    </div>
@endsection
