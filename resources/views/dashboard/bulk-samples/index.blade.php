@extends($layouts->dashboard)
@section('content')
    <div>
        <div class="mt-8 mb-4">
            <h3 class="heading" data-total="({{ $bulkSamples ? $bulkSamples->count() : 0  }})" data-xhr="total">{{ __('Bulk samples') }}</h3>
        </div>

        <div class="flex justify-between items-center flex-wrap mb-4">
            @include('layouts.quick_search')
            @can('create', App\Sample::class)
                <a href="{{ route('dashboard.samples.create','#bulk-tab') }}" class="flex items-center justify-center flex-shrink-0 w-9 sm:w-auto h-9 sm:px-4 text-sm text-white border bg-green-700 rounded-full hover:bg-green-900 transition mr-4 focus-current ring-green-700" title="{{ __('Create bulk sample') }}">
                    <i class="fal fa-plus sm:ml-2"></i>
                    <span class="hidden sm:inline">{{ __('Create bulk sample') }}</span>
                </a>
            @endcan
        </div>
        @include('dashboard.bulk-samples.list')
    </div>
@endsection
{{-- @section('form_content')
    <div class="mt-4">
        <label for="title" class="block mb-2 text-sm text-gray-700 font-medium">@lang('Title')</label>
        <input type="text" name="title" id="title" autocomplete="off" class="border border-gray-500 h-10 rounded px-4 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60 placeholder-gray-400 placehol" placeholder="مثال: گروه‌درمانی دکتر جان‌بزرگی - CBT - درمان وسواس">
        <div class="flex items-center text-xs text-gray-400 mt-2">
            <i class="fal fa-info-circle ml-1"></i>
            <span>کمک می‌کند تا نمونه‌های شما یک نام مشترک داشته باشند و راحت‌تر آن‌ها را پیدا کنید.</span>
        </div>
    </div>

    <div class="mt-4">
        <label for="group_count" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Count of users') }}</label>
        <input type="number" name="members_count" id="group_count" autocomplete="off" class="border border-gray-500 h-10 rounded px-4 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
        <div class="flex items-center text-xs text-gray-400 mt-2">
            <i class="fal fa-info-circle ml-1"></i>
            <span>تعداد اعضائی که قصد دارند نمونه(ها) را انجام دهند</span>
        </div>
    </div>
@endsection --}}