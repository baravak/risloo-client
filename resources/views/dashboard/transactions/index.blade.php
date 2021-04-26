@extends($layouts->dashboard)
@section('content')
    <div>
        <div class="flex flex-col sm:flex-row items-center justify-between border border-gray-300 rounded p-4 cursor-default">
            <div>
                <div class="flex items-center text-gray-700">
                    <i class="fal fa-wallet text-xl ml-2"></i>
                    <h2 class="text-lg variable-font-semibold">{{ $treasury->title }}</h2>
                    @if ($treasury->creditable)
                        <i class="fas fa-badge-check text-sm text-brand mr-1 relative -top-2" title="معتبر"></i>
                    @endif
                </div>
                @if ($treasury->center)
                    <div class="text-sm text-gray-500 mt-1">@center($treasury->center)</div>
                @endif
            </div>
            <div class="text-center">
                <div class="text-xs text-gray-400">باقی مانده</div>
                <div class="text-lg {{ $treasury->balance > 0 ? 'text-green-600' : ($treasury->balance < 0 ? 'text-red-600' : 'text-gray-600') }} variable-font-medium mt-1">@amount($treasury->balance) <small>تومان</small></div>
            </div>
        </div>

        <div class="mt-8 mb-4">
            <h2 class="heading" data-total="({{ $transactions ? $transactions->count() : 0 }})" data-xhr="total">{{ __('Transactions') }}</h2>
        </div>
        @include('dashboard.transactions.list')
    </div>
@endsection
