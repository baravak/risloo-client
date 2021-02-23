@extends('dashboard.create')
@section('form_content')
    <div>
        @isset($session)
            <div class="mt-4">
                <label for="room_id" data-alias="manager_id" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Room') }}</label>
                <select disabled data-template="room" data-title="manager.name manager.id" data-avatar="manager.avatar.tiny.url manager.avatar.small.url" id="room_id" class="select2-select">
                    @isset ($room)
                        <option value="{{ $room->id }}" data-json="{{ $room }}">{{ $room->manager->name }}</option>
                    @endif
                </select>
            </div>

            <div class="mt-4">
                <label for="case_id" data-alias="manager_id" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Case') }}</label>
                <select data-template="case_clients"data-title="manager.name manager.id" id="case_id" disabled class="select2-select">
                    @isset ($case)
                        <option value="{{ $case->id }}" data-json='{{ $case }}' selected>{{ $case->clients->pluck('user.name')->join('-') }}</option>
                    @endif
                </select>
            </div>
        @else
            <input type="hidden" name="type" value="session">
            <div class="mt-4">
                <label for="room_id" data-alias="manager_id" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Room') }}</label>
                <select data-template="room" name="room_id" data-name="room" data-title="manager.name manager.id" data-avatar="manager.avatar.tiny.url manager.avatar.small.url" id="room_id" data-url="{{route('dashboard.rooms.index', ['my_management'=> '1'])}}" data-lijax='change' data-state='both' data-relation="case_id" class="select2-select">
                    @isset ($room)
                    <option value="{{$room->id}}" data-json="{{$room}}">{{$room->manager->name}}</option>
                    @endif
                </select>
            </div>
        @endisset
        @isset ($room)
            @if (!isset($session))
                <div class="mt-4">
                    <label for="case_id" data-alias="manager_id" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Case') }}</label>
                    <select data-template="case_clients" name="case_id" data-name="case" data-title="manager.name manager.id" id="case_id" data-url="{{isset($room) ? route('dashboard.cases.index', ['room' => $room->id]) : ''}}" data-url-pattern="{{route('dashboard.cases.index', ['room' => '%%'])}} class="select2-select">
                        @isset ($case)
                            <option value="{{$case->id}}" data-json='{{$case}}' selected>{{$case->clients->pluck('user.name')->join('-')}}</option>
                        @endif
                    </select>
                </div>
            @endif

            <div class="mt-4">
                <label for="start-picker" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Start time') }}</label>
                <input type="text" id="start-picker" data-picker-minDate="{{time()}}" data-picker-maxDate="{{time() + (365 * 24 * 60 * 60)}}" data-picker-alt="started_at" value="{{ isset($session->started_at) ? $session->started_at->timestamp : '' }}" class="border border-gray-500 h-10 rounded px-4 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60 date-picker">
                <input type="hidden" name="started_at" id="started_at">
            </div>

            <div class="mt-4">
                <label for="duration" class="inline-block mb-2 text-sm text-gray-700 font-medium">{{ __('Session duration') }}</label>
                <span class="text-xs text-gray-600 font-light mr-1">(دقیقه)</span>
                <input type="text" placeholder="60" id="duration" name="duration" @formValue( $session->duration ) class="border border-gray-500 h-10 rounded px-4 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
            </div>

            <div class="mt-4">
                <label for="status" data-alias="manager_id" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Status') }}</label>
                <select id="status" name="status" class="select2-select">
                    @foreach (['client_awaiting', 'session_awaiting', 'in_session', 'finished', 'canceled_by_client', 'canceled_by_center'] as $item)
                        <option value="{{ $item }}" {!! isset($session->status) && $session->status == $item ? 'selected' : '' !!}>{{ __($item) }}</option>
                    @endforeach
                </select>
            </div>
        @endisset
    </div>
@endsection