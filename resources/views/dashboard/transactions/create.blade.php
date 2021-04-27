@extends($layouts->dashboard)
@section('content')
    <div>
        <div>
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
            <label for="title" class="block mb-2 text-sm text-gray-700 variable-font-medium cursor-default">{{ __('Title') }}</label>
            <input type="text" name="title" id="title" autocomplete="off" class="border border-gray-500 h-10 rounded px-4 w-full text-sm focus:border-brand focus">
        </div>
        <div class="mt-4">
            <label for="description" class="block mb-2 text-sm text-gray-700 variable-font-medium">{{ __('Description') }}</label>
            <textarea id="description" name="description" autocomplete="off" class="resize-none border border-gray-500 h-24 rounded px-4 py-2 w-full text-sm placeholder-gray-300 focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60"></textarea>
        </div>
        <div class="mt-4">
            <label for="amount" class="block mb-2 text-sm text-gray-700 variable-font-medium cursor-default">{{ __('Amount') }} <span class="text-xs text-gray-500 variable-font-normal">({{ __('Toman') }})</span></label>
            <input type="number" name="amount" id="amount" autocomplete="off" class="border border-gray-500 h-10 rounded px-4 w-full text-sm text-left dir-ltr focus:border-brand focus">
        </div>
    </div>
@endsection