@extends('dashboard.create')
@section('form_content')
@isset($scale)
    <div class="form-group form-group-m">
    <input type="hidden" id="scale_id" name="scale_id" value="{{$scale->id}}">
    <input type="text" class="form-control form-control-m" value="{{$scale->title}}" disabled placeholder="&nbsp;" autocomplete="off">
    <label for="scale_id">{{__('Scale')}}</label>
</div>
@else
    <div class="form-group form-group-m">
        <select class="select2-select form-control form-control-m" multiple name="scale_id" id="scale_id" data-url="{{route('dashboard.assessments.index')}}">
        </select>
        <label for="scale_id">{{__('Scale')}}</label>
    </div>
@endisset

<div class="form-group form-group-m">
    <select class="select2-select form-control form-control-m sample-create" data-relation="case_id room_client_id" data-template="room" name="room_id" data-title="manager.name manager.id" data-avatar="manager.avatar.tiny.url manager.avatar.small.url" id="room_id" data-url="{{route('dashboard.rooms.index')}}">
    </select>
    <label for="room_id">{{__('Room')}}</label>
</div>

<ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active direct fs-14" id="room-tab" data-toggle="tab" href="#room" role="tab" aria-controls="room" aria-selected="true">{{__('Room')}}</a>
    </li>
    <li class="nav-item">
        <a class="nav-link direct fs-14" id="case-tab" data-toggle="tab" href="#case" role="tab" aria-controls="case" aria-selected="false">{{__('Case')}}</a>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    @include('dashboard.samples.createRoom')
    @include('dashboard.samples.createCase')
</div>
@endsection
