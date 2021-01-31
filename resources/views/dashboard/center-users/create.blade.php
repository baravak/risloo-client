@extends('dashboard.create')
@section('form-title')
    {{__('Join new user')}}
@endsection
@section('form_content')

<div class="form-group form-group-m">
    <input type="text" class="form-control form-control-m direction-ltr" id="mobile" name="mobile" placeholder="&nbsp;" autocomplete="off">
    <label for="mobile">{{__('Mobile')}}</label>
</div>
@if ((auth()->isAdmin() || $center->acceptation->position == 'manager') && $center->type == 'counseling_center')
    <div class="form-group form-group-m">
        <select class="form-control form-control-m" name="position" id="position">
            <option value="manager">{{__('Manager')}}</option>
            <option value="operator">{{__('Operator')}}</option>
            <option value="psychologist">{{__('Psychologist')}}</option>
            <option value="client">{{__('Client')}}</option>
        </select>
        <label for="position">{{__('Position')}}</label>
    </div>
@endif
@if ($center->type == 'counseling_center')
    <div class="form-group form-group-m">
        <select class="select2-select form-control form-control-m" data-template="room" name="room_id" data-title="manager.name manager.id" data-avatar="manager.avatar.tiny.url manager.avatar.small.url" id="room_id" data-url="{{route('dashboard.rooms.index', ['center' => $center->id])}}" data-relation="client_id">
            @isset($room)
                <option value="{{ $room->id }}" data-json="{{ $room }}"></option>
            @endisset
        </select>
        <label for="room_id">{{__('Room')}}</label>
    </div>
@endif
<div class="form-group form-group-m">
    <input type="text" class="form-control form-control-m" id="nickname" name="nickname" placeholder="&nbsp;" autocomplete="off">
    <label for="nickname">
        {{__('Client name')}} <small>({{ __("This name is only valid in your center") }})</small>
    </label>
</div>
<div class="richak richak-xs richak-secondary richak-checkbox">
    <input type="checkbox" name="create_case" id="create_case" value="1">
    <label for="create_case">
        <span class="richak-icon"></span>
        <span>ساخت پرونده برای این کاربر</span>
    </label>
</div>
@endsection
