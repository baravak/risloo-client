@extends($layouts->dashboard)
@section('content')
    <div>
        <div class="mb-4 mt-8">
            <h3 class="heading" data-total="({{ $sessions->total() }})" data-xhr="total">{{ __('Therapy sessions') }}</h3>
        </div>

        @include($sessions->count() ? 'dashboard.sessions.list' : 'dashboard.sessions.emptySessions')

        {{ $sessions->links() }}
    </div>
@endsection
