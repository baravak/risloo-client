@extends($layouts->dashboard)
@section('content')
    <div>
        <div class="mt-8 mb-4">
            <h2 class="heading" data-total="(2)" data-xhr="total">{{ __('Transactions') }}</h2>
        </div>
        @include('dashboard.transactions.list')
    </div>
@endsection