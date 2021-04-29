@extends($layouts->dashboard)
@section('content')
    <div>
        <div class="flex flex-col sm:flex-row justify-between border border-gray-300 rounded p-4">
            @include('dashboard.billings.items.details')
        </div>

        <div>
            <div class="mt-8 mb-4">
                <h2 class="heading" data-total="({{ $items && $items->count() ? $items->count() :  0}})" data-xhr="total">{{ __('Items') }}</h2>
            </div>
            @include('dashboard.billings.items.list')
        </div>

        {{-- <div class="m-auto w-full md:w-1/2 mt-8">
            <form method="POST" action="{{ route('dashboard.payments.sotre') }}">
                <div class="border border-gray-300 rounded p-4">
                    <div>
                        <label for="title" class="block mb-2 text-sm text-gray-700 variable-font-medium cursor-default">{{ __('Title') }}</label>
                        <input type="text" name="title" id="title" autocomplete="off" class="border border-gray-500 h-10 rounded px-4 w-full text-sm focus:border-brand focus">
                    </div>
                    <div class="mt-4">
                        <label for="Debtor" class="block mb-2 text-sm text-gray-700 variable-font-medium">@lang('Debtor')</label>
                        <select id="Debtor" name="Debtor" class="border border-gray-500 h-10 rounded pl-4 pr-8 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
                            <option value="">مرکز مشاوره طلیعه سلامت</option>
                            <option value="">مرکز مشاوره ریسلو</option>
                        </select>
                    </div>
                    <div class="mt-4">
                        <label for="Creditor" class="block mb-2 text-sm text-gray-700 variable-font-medium">@lang('Creditor')</label>
                        <select id="Creditor" name="Creditor" class="border border-gray-500 h-10 rounded pl-4 pr-8 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
                            <option value="">محمدعلی نخلی</option>
                            <option value="">محمدحسن صالحی</option>
                        </select>
                    </div>
                    <div class="mt-4">
                        <label for="amount" class="block mb-2 text-sm text-gray-700 variable-font-medium cursor-default">{{ __('Amount') }} <span class="text-xs text-gray-500 variable-font-normal">({{ __('Toman') }})</span></label>
                        <input type="number" name="amount" id="amount" autocomplete="off" class="border border-gray-500 h-10 rounded px-4 w-full text-sm text-left dir-ltr focus:border-brand focus">
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit" class="inline-flex justify-center items-center h-9 px-8 bg-brand text-white text-sm rounded-full hover:bg-brand-600 transition ml-4 focus" role="button">
                        {{ __('Edit') }}
                    </button>
                </div>
            </form>
        </div> --}}
    </div>
@endsection
