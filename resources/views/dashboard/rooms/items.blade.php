<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 2xl:grid-cols-6 gap-4">
    @foreach ($rooms as $room)
        @include('dashboard.rooms.item')
    @endforeach
</div>

{{ $rooms->links() }}
