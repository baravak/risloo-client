@extends($layouts->dashboard)

@section('content')
<div class="card mb-3">
        <div class="card-header">
            {{ __('Practices') }} <sup>({{ $practices->total() }})</sup>
            <a href="{{ route('dashboard.cases.show', ${$module->parent}->case->id) }}" class="badge badge-primary p-1 fs-10">{{ __('Case') }}</a>
            <a href="{{ route('dashboard.sessions.show', ${$module->parent}->id) }}" class="badge badge-primary p-1 fs-10">{{ __('Session') }}</a>
            @filterBadge($practices)
        </div>
        <div class="card-body p-0">
            @include($practices->count() ? 'dashboard.practices.list' : 'dashboard.emptyContent')
        </div>
    </div>
@endsection
