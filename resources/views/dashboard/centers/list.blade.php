<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4 mb-4 justify-between">
    <input type="search" class="text-sm border border-gray-200 rounded-sm" placeholder="{{ __('Search') }}">
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4">
    @foreach ($centers as $center)
        @include('dashboard.centers.listRaw')
    @endforeach
</div>