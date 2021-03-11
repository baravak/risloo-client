@extends($layouts->dashboard)
@section('content')
    <div>
        <div class="mb-4 mt-8">
            <h3 class="heading" data-total="({{ $cases->total() }})" data-xhr="total">{{ __('Cases') }}</h3>
        </div>

        <div class="flex justify-between items-center flex-wrap mb-4">
            @include('layouts.quick_search')
        </div>

        @include($cases->count() ? 'dashboard.cases.list' : 'dashboard.emptyCases')

        {{ $cases->links() }}
    </div>
@endsection
