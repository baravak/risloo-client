@extends('dashboard.create', ['callbackCancel' => $room->route('show')])
@section('form_content')
    <div>
        <div class="mt-4">
            <label for="room_id" data-alias="manager_id" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Room') }}</label>
            <select name="room_id" id="room_id" data-url="{{route('dashboard.rooms.index', ['my_management' => 1])}}" data-relation="client_id" class="select2-select">
                @isset($room)
                    <option value="{{ $room->id }}" selected="{{ $room->manager->name }}"></option>
                @endisset
            </select>
            @isset($room)
            <div data-for="room_id" class="hidden">
                @include('dashboard.rooms.select2', ['rooms' => [$room]])
            </div>
            @endisset
        </div>

        <div class="mt-4">
            <label for="client_id" data-alias="manager_id" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Client') }}</label>
            <select  name="client_id[]" id="client_id" @if($room) data-url="{{route('dashboard.room.users.index', ['room' => $room->id, 'usage' => 'create_case'])}}" @endisset data-url-pattern="{{route('dashboard.room.users.index', ['room' => '%%', 'not_in_case' => (isset($case) ? $case->id : null), 'usage' => 'create_case'])}}" data-placeholder="{{__('Select client') . ' ' . __('through mobile or name')}}" multiple class="select2-select">
                @isset($client)
                    <option value="{{ $client->id }}"selected>@displayName($client)</option>
                @endisset
            </select>
            @isset($client)
            <div data-for="room_id" class="hidden">
                @include('dashboard.room-users.select2', ['users' => [$client]])
            </div>
            @endisset
        </div>

        <div class="mt-4">
            <label for="problem" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Problem') }}</label>
            <textarea id="problem" name="problem" autocomplete="off" @formValue($case->problem) class="resize-none border border-gray-500 h-24 rounded px-4 py-2 w-full text-sm placeholder-gray-300 focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60"></textarea>
        </div>
    </div>
@endsection
