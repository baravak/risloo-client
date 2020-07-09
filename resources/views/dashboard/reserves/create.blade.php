@extends('dashboard.create')
@section('form_content')
    <div class="form-group form-group-m">
        <select class="select2-select form-control form-control-m" data-template="room" name="room_id" data-title="manager.name manager.id" data-avatar="manager.avatar.tiny.url manager.avatar.small.url" id="room_id" data-url="{{route('dashboard.rooms.index')}}" data-lijax='change' data-state='both'>
            @if ($room)
                <option value="{{$room->id}}" data-json="{{$room}}">{{$room->manager->name}}</option>
            @endif
        </select>
        <label for="room_id">{{__('Room')}}</label>
    </div>
    @if ($room)
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

@section('other-content')
<div class="card mt-3 col-12" id="calendar" data-from="{{$reserves->getFilter('week')[0]}}" data-to="{{$reserves->getFilter('week')[1]}}">
    <div class="card-header">
        {{__("Calendar")}}
    </div>
    <div class="card-body" style="min-width: 576px;">
        <div class="d-flex reserve-table-th">
            <div style="width: 10%">&nbsp;</div>
            <div class="table-reserve-data d-flex align-items-right" style="width: 90%">
                @foreach ($table as $hour)
                    <div style="width: {{(100 / count($table))}}%" class="text-right">{{$hour}}</div>
                @endforeach
            </div>
        </div>
        @for ($i = 0; $i < 7; $i++)
        @php
            $dayOfWeek = JDate::fromDateTime($reserves->getFilter('week')[0])->addDays($i);
            $indexGroup = $dayOfWeek->toCarbon()->format('Ymd');
        @endphp
        <div class="d-flex">
            <div class="table-reserve-title" style="width: 10%">{{$dayOfWeek->format('%A')}}</div>
            <div class="table-reserve-data d-flex align-items-center position-relative" style="width: 90%">
                @isset($group[$indexGroup])
                @foreach ($group[$indexGroup] as $item)
                    <div class="table-reserve-time position-absolute" style="overflow: hidden; right:{{$item->tablePosition->start}}%;width: {{$item->tablePosition->length}}%;" data-start="08:00" data-end="20:00">
                        {{$item->started_at->format('G:i')}}
                        -
                        {{$item->finished_at->format('G:i')}}
                    </div>
                @endforeach
                @endisset
            </div>
        </div>
        @endfor
    </div>
</div>
@endsection
