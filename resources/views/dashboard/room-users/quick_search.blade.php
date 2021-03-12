<h3 class="heading" data-total="({{ $users->total() }})" data-xhr="total">{{ __('Members of :room', ['room'=> $room ,'room' => $room->manager->name]) }}</h3>
@include('dashboard.room-users.list')
