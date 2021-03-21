<div data-nav="chain" data-title="@lang('Chain')" class="hidden">
    <div class="mb-8">
        <h2 class="font-medium text-gray-800 text-lg mb-2">{{ __('bulk sample status') }}</h2>
    </div>

    <div class="cursor-default bulk-sampleStatus">
        @foreach ($sample->chain->list as $chain)
            <div class="flex items-center {{ $chain->id == $sample->id ? 'text-brand font-semibold' : 'text-gray-500' }} {{ !$loop->first ? 'mt-6' : '' }} {{ !in_array($chain->status, ['seald', 'open']) ? 'opacity-50' : '' }}">
                <i class="{{ $chain->id == $sample->id ? 'fas fa-chevron-circle-left' : (in_array($chain->status, ['seald', 'open'])  ? 'fal fa-circle' : 'fal fa-check-circle') }} ml-4 relative"></i>
                <span>{{ $chain->title }}</span>
            </div>
        @endforeach
        {{-- <div class="flex items-center text-gray-500 opacity-50">
            <i class="fal fa-check-circle ml-4 relative"></i>
            <span>حالت انجام شده‌ی غیرفعال</span>
        </div>
        <a href="#" class="flex items-center text-gray-500 hover:text-brand">
            <i class="fal fa-circle ml-4 relative"></i>
            <span>حالت انجام نشده‌ی لینک دار</span>
        </a> --}}
    </div>
</div>
