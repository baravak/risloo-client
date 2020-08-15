@extends('dashboard.create')
@section('form_content')
<div class="form-group form-group-m">
    <select class="select2-select form-control form-control-m" data-template="room" name="room_id" data-title="manager.name manager.id" data-avatar="manager.avatar.tiny.url manager.avatar.small.url" id="room_id" data-url="{{route('dashboard.rooms.index', ['my_management' => 1])}}" data-relation="client_id">
    </select>
    <label for="room_id">{{__('Room')}}</label>
</div>

<div class="form-group form-group-m">
    <select class="select2-select form-control form-control-m" data-template="users" name="client_id[]" data-avatar="user.avatar.tiny.url user.avatar.small.url" data-id="id" data-title="user.name user.id" id="client_id" data-url-pattern="{{route('dashboard.room.users.index', ['room' => '%%'])}}" data-placeholder="{{__('Select client')}}" multiple>
    </select>
    <label for="client_id">{{__('Client')}}</label>
</div>
<div class="form-group form-group-m">
    <input type="text" class="form-control form-control-m" id="chief_complaint" name="chief_complaint" placeholder="&nbsp;" autocomplete="off" @formValue($case->chief_complaint)>
    <label for="chief_complaint">{{__('Chief complaint')}}</label>
</div>
@endsection
