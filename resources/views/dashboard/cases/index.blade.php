@extends($layouts->dashboard)
@section('content')
    <div>
        <div class="mb-4 mt-8">
            <h2 class="heading" data-total="({{ $cases->total() }})" data-xhr="total">{{ __('Cases') }}</h2>
        </div>

        @include($cases->count() ? 'dashboard.cases.list' : 'dashboard.cases.emptyCases')

        {{ $cases->links() }}
    </div>
@endsection
