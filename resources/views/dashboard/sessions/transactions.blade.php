<div>
    <div class="flex justify-between items-center mt-8 mb-4">
        <div>
            <h3 class="flex items-center font-bold text-gray-700 cursor-default">
                <span class="w-8 border-t border-gray-200 inline-block ml-3"></span>
                <span>{{ __('Transactions') }}</span>
                <span class="text-xs text-gray-600 font-light mr-2" data-xhr="total">({{ $transactions && $transactions->count() ? $transactions->count() : 0 }})</span>
            </h3>
        </div>

    </div>
    @include($transactions && $transactions->count() ? 'dashboard.sessions.transactionsList' : 'dashboard.sessions.emptyTransactions')
</div>
