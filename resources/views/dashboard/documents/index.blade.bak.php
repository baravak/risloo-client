@extends($layouts->dashboard)

@section('content')
<div class="card mb-3">
        <div class="card-header">
            {{ __('Documents') }} <sup>({{ $documents->total() }})</sup>
            @filterBadge($documents)
        </div>
        <div class="card-body p-0">
            @include($documents->count() ? 'dashboard.documents.list' : 'dashboard.emptyContent')
        </div>
    </div>
@endsection
