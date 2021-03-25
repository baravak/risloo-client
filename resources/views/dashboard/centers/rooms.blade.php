<div data-xhr="room-items">
    @include($rooms->count() ? 'dashboard.rooms.items' : 'dashboard.emptyContent')
</div>
