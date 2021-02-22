@extends('dashboard.create')
@section('form_content')
    <div class="mt-4">
        <label for="client_id" data-alias="manager_id" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Client') }}</label>
        <select data-template="users" name="client_id[]" data-avatar="user.avatar.tiny.url user.avatar.small.url" data-id="id" data-title="user.name user.id" id="client_id" data-url="{{route('dashboard.room.users.index', ['room' => $case->room->id, 'not_in_case' => $case->id])}}" data-placeholder="{{__('Select client')}}" multiple class="select2-select">
        </select>
    </div>
@endsection
