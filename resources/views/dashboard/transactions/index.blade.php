@extends($layouts->dashboard)
@section('content')
    <div>
        <div class="flex flex-col sm:flex-row items-center justify-between border border-gray-300 rounded p-4 cursor-default">
            <div>
                <div class="flex items-center text-gray-700">
                    <i class="fal fa-wallet text-xl ml-2"></i>
                    <h2 class="text-lg variable-font-semibold">کیف پول نقدی</h2>
                    <i class="fas fa-badge-check text-sm text-brand mr-1 pb-4" title="معتبر"></i>
                </div>
                <div class="text-sm text-gray-500 mt-1">بستر مرکز مشاوره طلیعه سلامت</div>
            </div>
            <div class="text-center">
                <div class="text-xs text-gray-400">باقی مانده</div>
                <div class="text-lg text-green-600 variable-font-medium mt-1">35,000,000 تومان</div>
            </div>
        </div>

        <div class="mt-8 mb-4">
            <h2 class="heading" data-total="({{ $transactions ? $transactions->count() : 0 }})" data-xhr="total">{{ __('Transactions') }}</h2>
        </div>
        @include('dashboard.transactions.list')
    </div>
@endsection
