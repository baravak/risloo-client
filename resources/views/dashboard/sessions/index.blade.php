@extends($layouts->dashboard)

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Therapy sessions') }}
        </div>
        <div class="card-body p-0">
            @include($sessions->count() ? 'dashboard.sessions.list' : 'dashboard.emptyContent')
        </div>
    </div>
@endsection
