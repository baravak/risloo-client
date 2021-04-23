@extends($layouts->dashboard)
@section('content')
    <div>
        <div class="flex flex-col sm:flex-row justify-between border border-gray-300 rounded p-4">
            @include('dashboard.billings.items.details')
        </div>

        <div>
            <div class="mt-8 mb-4">
                <h2 class="heading" data-total="(2)" data-xhr="total">{{ __('Transactions') }}</h2>
            </div>
            @include('dashboard.billings.items.list')
        </div>
    </div>
@endsection