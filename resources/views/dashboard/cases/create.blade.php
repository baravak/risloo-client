@extends('dashboard.create')
@section('form_content')
<div class="form-group form-group-m">
    <select class="select2-select form-control form-control-m" data-template="room" name="room_id" data-title="manager.name manager.id" data-avatar="manager.avatar.tiny.url manager.avatar.small.url" id="room_id" data-url="{{route('dashboard.rooms.index', ['my_management' => 1])}}" data-relation="client_id">
        @isset($room)
            <option value="{{ $room->id }}" data-json="{{ $room }}"></option>
        @endisset
    </select>
    <label for="room_id">{{__('Room')}}</label>
</div>

<div class="form-group form-group-m">
    <select class="select2-select form-control form-control-m" data-template="users" name="client_id[]" data-avatar="user.avatar.tiny.url user.avatar.small.url" data-id="id" data-title="user.name user.id" id="client_id" @isset($room) data-url="{{route('dashboard.room.users.index', ['room' => $room->id, 'usage' => 'create_case'])}}" @endisset data-url-pattern="{{route('dashboard.room.users.index', ['room' => '%%', 'not_in_case' => (isset($case) ? $case->id : null), 'usage' => 'create_case'])}}" data-placeholder="{{__('Select client')}}" multiple>
    </select>
    <label for="client_id">{{__('Client')}}</label>
</div>
<div class="form-group form-group-m">
    <input type="text" class="form-control form-control-m" id="chief_complaint" name="chief_complaint" placeholder="&nbsp;" autocomplete="off" @formValue($case->chief_complaint)>
    <label for="chief_complaint">{{__('Problem')}}</label>
</div>
@endsection
