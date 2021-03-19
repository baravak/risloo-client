<div data-nav="chain" data-title="@lang('Chain')" class="hidden">
    <div class="mb-8">
        <h2 class="font-medium text-gray-800 text-lg mb-2">وضعیت نمونه گروهی</h2>
    </div>

    <div class="cursor-default bulk-sampleStatus">
        @foreach ($sample->chain->list as $chain)
            <div class="flex items-center {{ $chain->id == $sample->id ? 'text-brand font-semibold' : 'text-gray-500' }} {{ !$loop->first ? 'mt-6' : '' }}">
                <i class="{{ $chain->id == $sample->id ? 'fas fa-chevron-circle-left' : 'fal fa-circle' }} ml-4 relative"></i>
                <span>{{ $chain->title }}</span>
            </div>
        @endforeach
    </div>
</div>
