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
    <div class="tab-pane fade show active pt-3" id="room" role="tabpanel" aria-labelledby="room-tab">
        <div class="richak richak-xs richak-secondary richak-checkbox">
            <input type="checkbox" name="create_case" id="create_case">
            <label for="create_case">
                <span class="richak-icon"></span>
                ساخت پرونده جدید قبل از انجام تست
            </label>
        </div>
        <div class="form-group form-group-m">
            <select class="select2-select form-control form-control-m has-clear sample-page" multiple data-template="users" id="room_client_id" name="room_client_id" data-title="name id" id="client_id" data-url-pattern="{{route('dashboard.room.users.index', ['room' => '%%'])}}" data-placeholder="{{__('Without specified client')}}">
            </select>
            <label for="client_id">{{__('Client')}}</label>
        </div>
        <div class="form-group form-group-m">
            <input type="text" class="form-control form-control-m sample-page" id="count" name="count" placeholder="&nbsp;" autocomplete="off">
            <label for="count">{{__('Count')}}</label>
        </div>
    </div>

    <div class="tab-pane fade pt-3" id="case" role="tabpanel" aria-labelledby="case-tab">
        <div class="form-group form-group-m">
            <select class="select2-select form-control form-control-m has-clear" data-relation="client_id" data-template="case_clients" name="case_id" data-title="manager.name manager.id" id="case_id" data-url-pattern="{{route('dashboard.cases.index', ['room' => '%%'])}}">
            </select>
            <label for="case_id">{{__('Case')}}</label>
        </div>
    </div>
</div>


@endsection
