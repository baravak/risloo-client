@extends($layouts->dashboard)
@section('content')
    <div>
        <div class="mt-8 mb-4">
            <h3 class="heading" data-total="(2)" data-xhr="total">{{ __('Financial treasuries') }}</h3>
        </div>
        @include('dashboard.treasuries.list')
    </div>
@endsection