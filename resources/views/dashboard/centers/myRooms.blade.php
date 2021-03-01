<div class="flex items-center mb-4 mt-8">
    <span class="w-8 border-t border-gray-200 inline-block ml-3"></span>
    <h3 class="font-bold text-gray-700 cursor-default">{{ __('My therapy rooms') }}</h3>
    <span class="text-xs text-gray-600 font-light mr-2" data-xhr="total">({{ $rooms->total() }})</span>
</div>

<div data-xhr="room-items">
    @include($rooms->count() ? 'dashboard.rooms.items' : 'dashboard.emptyContent')
</div>