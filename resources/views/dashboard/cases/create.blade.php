@extends('dashboard.create')
@section('form_content')
<div class="form-group form-group-m">
    <select class="select2-select form-control form-control-m" data-template="room" name="psychologist_id" data-title="manager.name manager.id" data-avatar="manager.avatar.tiny.url manager.avatar.small.url" id="psychologist_id" data-url="{{route('dashboard.rooms.index')}}">
    </select>
    <label for="psychologist_id">{{__('Room')}}</label>
</div>
@endsection
