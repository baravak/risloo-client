<div class="flex justify-between items-center flex-wrap mb-4">
    <input type="search" class="flex-1 ml-4 text-sm border border-gray-200 rounded-sm" placeholder="{{ __('Search') }}">
    <a href="{{ route('dashboard.centers.create') }}" class="flex items-center justify-center flex-shrink-0 w-10 sm:w-auto h-10 sm:px-4 text-sm text-green-700 border border-green-700 rounded-full hover:bg-green-50 transition" title="{{ __('Create new center') }}">
        <i class="fal fa-plus sm:ml-2"></i>
        <span class="hidden sm:inline">{{ __('Create new center') }}</span>
    </a>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4">
    @foreach ($centers as $center)
        @include('dashboard.centers.listRaw')
    @endforeach
</div>