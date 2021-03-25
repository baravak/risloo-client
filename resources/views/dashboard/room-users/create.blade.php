@extends('dashboard.create')
@section('form_content')
    <div>
        <label for="user_id" data-alias="manager_id" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('User') }}</label>
        <select class="select2-select" multiple data-template="users" name="user_id[]" data-title="user.name id" data-id="id" id="user_id" data-url="{{ route('dashboard.center.users.index', ['center' => $center->id, 'acceptation_room' => $room->id]) }}" data-avatar="user.avatar.tiny.url user.avatar.small.url"></select>
    </div>
@endsection