@section('form-title')
    {{__('Create new room-user')}}
@endsection
@extends('dashboard.create')
@section('form_content')
    <div class="form-group form-group-m">
        <select class="select2-select form-control form-control-m" multiple data-template="users" name="user_id[]" data-title="user.name user.id" data-id="user.id" id="user_id" data-url="{{route('dashboard.relationship.users.index', $room->center->id)}}" data-avatar="user.avatar.tiny.url user.avatar.small.url">
        </select>
        <label for="user_id">{{__('User')}}</label>
    </div>
@endsection
