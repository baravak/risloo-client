@extends('dashboard.create')
@section('form_content')
<div class="form-group form-group-m">
    <select class="select2-select form-control form-control-m" data-template="users" name="client_id[]" data-avatar="user.avatar.tiny.url user.avatar.small.url" data-id="id" data-title="user.name user.id" id="client_id" data-url="{{route('dashboard.room.users.index', ['room' => $case->room->id, 'not_in_case' => $case->id])}}" data-placeholder="{{__('Select client')}}" multiple>
    </select>
    <label for="client_id">{{__('Client')}}</label>
</div>
@endsection
