<div class="flex justify-between items-center mt-8 mb-4">
    <h2 class="heading" data-total="({{ $rooms->total() }})" data-xhr="total">{{ __('My therapy rooms') }}</h2>
</div>

<div data-xhr="room-items">
    @include($rooms->count() ? 'dashboard.rooms.items' : 'dashboard.emptyContent')
</div>