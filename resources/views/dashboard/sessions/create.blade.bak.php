@extends('dashboard.create')
@section('form_content')
@isset($session)
<div class="form-group form-group-m">
    <input type="hidden" name="type" value="session">
    <select disabled class="select2-select form-control form-control-m" data-template="room" data-title="manager.name manager.id" data-avatar="manager.avatar.tiny.url manager.avatar.small.url" id="room_id">
        @isset ($room)
            <option value="{{$room->id}}" data-json="{{$room}}">{{$room->manager->name}}</option>
        @endif
    </select>
    <label for="room_id">{{__('Room')}}</label>
</div>
<div class="form-group form-group-m">
    <select class="select2-select form-control form-control-m has-clear" data-template="case_clients"data-title="manager.name manager.id" id="case_id" disabled>
        @isset($case)
            <option value="{{$case->id}}" data-json='{{$case}}' selected>{{$case->clients->pluck('user.name')->join('-')}}</option>
        @endisset
    </select>
    <label for="case_id">{{__('Case')}}</label>
</div>
@else
    <div class="form-group form-group-m">
        <input type="hidden" name="type" value="session">
        <select class="select2-select form-control form-control-m" data-template="room" name="room_id" data-name="room" data-title="manager.name manager.id" data-avatar="manager.avatar.tiny.url manager.avatar.small.url" id="room_id" data-url="{{route('dashboard.rooms.index', ['my_management'=> '1'])}}" data-lijax='change' data-state='both' data-relation="case_id">
            @isset ($room)
                <option value="{{$room->id}}" data-json="{{$room}}">{{$room->manager->name}}</option>
            @endif
        </select>
        <label for="room_id">{{__('Room')}}</label>
    </div>
@endisset
    @isset ($room)
        @if (!isset($session))
            <div class="form-group form-group-m">
                <select class="select2-select form-control form-control-m has-clear" data-template="case_clients" name="case_id" data-name="case" data-title="manager.name manager.id" id="case_id" data-url="{{isset($room) ? route('dashboard.cases.index', ['room' => $room->id]) : ''}}" data-url-pattern="{{route('dashboard.cases.index', ['room' => '%%'])}}">
                    @isset($case)
                        <option value="{{$case->id}}" data-json='{{$case}}' selected>{{$case->clients->pluck('user.name')->join('-')}}</option>
                    @endisset
                </select>
                <label for="case_id">{{__('Case')}}</label>
            </div>
        @endif
        <div class="form-group form-group-m">
            <input type="text" class="form-control form-control-m direction-ltr date-picker" id="start-picker" placeholder="&nbsp;" autocomplete="off" data-picker-minDate="{{time()}}" data-picker-maxDate="{{time() + (365 * 24 * 60 * 60)}}" data-picker-alt="started_at" value="{{ isset($session->started_at) ? $session->started_at->timestamp : '' }}">
            <label for="start-picker">{{__('Start time')}}</label>
            <input type="hidden" name="started_at" id="started_at">
        </div>
        <div class="form-group form-group-m">
            <input type="text" class="form-control form-control-m direction-ltr" placeholder="60" name="duration" @formValue($session->duration)>
            <label for="finish-picker">{{__('Session duration')}} <small>(دقیقه)</small></label>
        </div>
        <div class="form-group form-group-m">
            <select class="form-control form-control-m" id="status" name="status">
                @foreach (['client_awaiting', 'session_awaiting', 'in_session', 'finished', 'canceled_by_client', 'canceled_by_center'] as $item)
                        <option value="{{ $item }}" {!! isset($session->status) && $session->status == $item ? 'selected' : '' !!}>{{ __($item) }}</option>
                    @endforeach
            </select>
            <label for="status">{{__('Status')}}</label>
        </div>
    @endisset
@endsection
