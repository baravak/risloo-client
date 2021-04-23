<div data-xhr="payments-items">
    @if ($payments->count())
    <div class="overflow-x-auto">
        <div class="align-middle inline-block min-w-full">
            <div class="overflow-hidden border border-gray-200 rounded">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50 cursor-default">
                        <tr>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">{{ __('Serial') }}</th>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">{{ __('Balance') }}</th>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">{{ __('Treasurie') }}</th>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">{{ __('Date') }}</th>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">{{ __('Payment status') }}</th>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">{{ __('Description') }}</th>
                            <th class="px-3 py-2" scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($payments as $payment)
                        @include('dashboard.payments.paymentslistRaw')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{method_exists($payments, 'links') ? $payments->links() : null}}
    @endif
</div>
