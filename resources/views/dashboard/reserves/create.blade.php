@extends('dashboard.create')
@section('form_content')
    <div class="form-group form-group-m">
        <select class="select2-select form-control form-control-m" data-template="room" name="room_id" data-title="manager.name manager.id" data-avatar="manager.avatar.tiny.url manager.avatar.small.url" id="room_id" data-url="{{route('dashboard.rooms.index')}}" data-lijax='change' data-state='both'>
            @isset ($room)
                <option value="{{$room->id}}" data-json="{{$room}}">{{$room->manager->name}}</option>
            @endif
        </select>
        <label for="room_id">{{__('Room')}}</label>
    </div>
    @isset ($room)
        <div class="form-group form-group-m">
            <input type="text" class="form-control form-control-m direction-ltr date-picker" id="start-picker" placeholder="&nbsp;" autocomplete="off" data-picker-minDate="{{time()}}" data-picker-maxDate="{{time() + (365 * 24 * 60 * 60)}}" data-picker-alt="started_at">
            <label for="start-picker">{{__('Start time')}}</label>
            <input type="hidden" name="started_at" id="started_at">
        </div>
        <div class="form-group form-group-m">
            <input type="text" class="form-control form-control-m direction-ltr" placeholder="60" name="duration">
            <label for="finish-picker">{{__('Session duration')}} <small>(دقیقه)</small></label>
        </div>
    @endif
@endsection

@isset($room)
    @section('other-content')
    @include('dashboard.reserves.calendar')
    @endsection
@endisset
