@extends($layouts->dashboard)
@section('content')
    <div>
        <div class="flex flex-col md:flex-row border border-gray-300 rounded">
            <div class="flex flex-col flex-1 items-center justify-center text-center p-4 border-b md:border-b-0 md:border-l border-gray-300 cursor-default">
                <h2 class="text-lg text-gray-700 variable-font-bold">پرداخت اولین صورت‌حساب</h2>
                <span class="text-sm text-gray-500 dir-ltr en mt-1">$TRE123456</span>
                <span class="text-sm text-gray-500 cursor-default mt-2">20 فروردین 1400</span>
            </div>
            <div class="flex flex-col flex-1 items-center justify-center text-center p-4">
                <span class="text-lg text-green-600 variable-font-bold cursor-default">235,000 تومان</span>
                <div class="flex flex-col md:flex-row items-center justify-center text-sm mt-2">
                    <div>
                        <span class="text-gray-400 cursor-default ml-2">از</span>
                        <a href="#" class="text-gray-600 hover:text-blue-600 transition underline">محمدعلی نخلی</a>
                    </div>
                    <div>
                        <span class="text-gray-400 cursor-default ml-2 mr-4">به</span>
                        <a href="#" class="text-gray-600 hover:text-blue-600 transition underline">مرکز درمانی خانواده سلامت</a>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="mt-8 mb-4">
                <h2 class="heading" data-total="(2)" data-xhr="total">{{ __('Transactions') }}</h2>
            </div>
            @include('dashboard.billings.items.list')
        </div>
    </div>
@endsection