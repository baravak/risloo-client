@extends($layouts->dashboard)
@section('content')
    <div>
        <div class="mb-4 mt-8">
            <h3 class="heading" data-total="({{ $sessions->total() }})" data-xhr="total">{{ __('Therapy sessions') }}</h3>
        </div>

        <div class="flex justify-between items-center flex-wrap mb-4">
            @include('layouts.quick_search')
        </div>

        @include($sessions->count() ? 'dashboard.sessions.list' : 'dashboard.emptySessions')

        {{ $sessions->links() }}
    </div>
@endsection
