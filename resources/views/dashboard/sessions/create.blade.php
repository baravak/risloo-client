@extends('dashboard.create')
@section('form_content')
    <div class="form-group form-group-m">
        <select class="select2-select form-control form-control-m" data-template="room" name="room_id" data-title="manager.name manager.id" data-avatar="manager.avatar.tiny.url manager.avatar.small.url" id="room_id" data-url="{{route('dashboard.rooms.index')}}" data-lijax='change' data-state='both' data-relation="case_id room_client_id">
            @isset ($room)
                <option value="{{$room->id}}" data-json="{{$room}}">{{$room->manager->name}}</option>
            @endif
        </select>
        <label for="room_id">{{__('Room')}}</label>
    </div>
    @isset ($room)
    <ul class="nav nav-tabs mt-4" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link direct fs-14 active" id="case-tab" data-toggle="tab" href="#case" role="tab" aria-controls="case" aria-selected="true">
                <i class="fai far fa-dot-circle"></i>
                {{__('Therapy session')}}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link direct fs-14" id="client-tab" data-toggle="tab" href="#client" role="tab" aria-controls="client" aria-selected="false">
                <i class="fai far fa-circle"></i>
                {{__('Queue')}}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link direct fs-14" id="reserve-tab" data-toggle="tab" href="#reserve" role="tab" aria-controls="reserve" aria-selected="false">
                <i class="fai far fa-circle"></i>
                {{__('Reservation')}}
            </a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active pt-3" id="case" role="tabpanel" aria-labelledby="case-tab">
            <small class="text-muted pb-1 d-block">در این قسمت می‌توانید برای یک پرونده درمانی، جلسه درمانی تشکیل دهید</small>
            <div class="form-group form-group-m">
                <select class="select2-select form-control form-control-m has-clear" data-template="case_clients" name="case_id" data-title="manager.name manager.id" id="case_id" data-url="{{isset($room) ? route('dashboard.cases.index', ['room' => $room->id]) : ''}}" data-url-pattern="{{route('dashboard.cases.index', ['room' => '%%'])}}">
                    @isset($case)
                        <option value="{{$case->id}}" data-json='{{$case}}' selected>{{$case->clients->pluck('user.name')->join('-')}}</option>
                    @endisset
                </select>
                <label for="case_id">{{__('Case')}}</label>
            </div>
        </div>
        <div class="tab-pane fade pt-3" id="client" role="tabpanel" aria-labelledby="client-tab">
            <small class="text-muted pb-1 d-block">اگر مراجع شما پرونده درمانی ندارد می‌توانید با پرکردن این قسمت، مراجع را در صف درمان قرار دهید</small>
            <div class="form-group form-group-m">
                <select class="select2-select form-control form-control-m has-clear sample-page" data-template="users" id="room_client_id" name="client_id[]" data-title="user.name id" data-avatar="user.avatars.small" id="client_id" data-url="{{isset($room) ? route('dashboard.room.users.index', ['room' => $room->id, 'status' => 'accepted']) : ''}}" data-url-pattern="{{route('dashboard.room.users.index', ['room' => '%%', 'status' => 'accepted'])}}" data-placeholder="{{__('Without specified client')}}">
                </select>
                <label for="client_id">{{__('Client')}}</label>
            </div>
        </div>
        <div class="tab-pane fade pt-3" id="reserve" role="tabpanel" aria-labelledby="reserve-tab">
            <small class="text-muted pb-1 d-block">در این قسمت می‌توانید یک جلسه رزرواسیون ایجاد کنید</small>
            <div class="form-group form-group-m">
                <input type="text" class="form-control form-control-m direction-ltr date-picker" id="start-picker" placeholder="&nbsp;" autocomplete="off" data-picker-minDate="{{time()}}" data-picker-maxDate="{{time() + (365 * 24 * 60 * 60)}}" data-picker-alt="started_at">
                <label for="start-picker">{{__('Start time')}}</label>
                <input type="hidden" name="started_at" id="started_at">
            </div>
            <div class="form-group form-group-m">
                <input type="text" class="form-control form-control-m direction-ltr" placeholder="60" name="duration">
                <label for="finish-picker">{{__('Session duration')}} <small>(دقیقه)</small></label>
            </div>
        </div>
    </div>
    @endif
@endsection

@isset($room)
    @section('other-content')
    @include('dashboard.sessions.calendar')
    @endsection
@endisset
