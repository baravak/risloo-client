@extends('dashboard.create')
@section('form_content')
    <div class="border border-gray-200 rounded p-4 mt-8">
        <div>
            <label for="scale_id" data-alias="manager_id" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Scale') }}</label>
            <select class="select2-select" multiple name="scale_id[]" id="scale_id" data-url="{{ route('dashboard.assessments.index') }}">
                @isset($scale)
                    <option value="{{$scale->id}}" data-json="{{$scale}}" selected>{{$scale->title}}</option>
                @endisset
            </select>
        </div>

        <div class="mt-4">
            <label for="room_id" data-alias="manager_id" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Room') }}</label>
            <select class="select2-select" data-relation="case_id room_client_id" data-template="room" name="room_id" data-title="manager.name manager.id" data-avatar="manager.avatar.tiny.url manager.avatar.small.url" id="room_id" data-url="{{ route('dashboard.rooms.index' , ['my_management' => 1]) }}">
            @isset($case)
                <option value="{{$case->room->id}}" selected>{{ $case->room->manager->name  }}</option>
            @endisset
            </select>
            @isset($case)
            <div data-for="room_id" class="hidden">
                @include('dashboard.rooms.select2', ['rooms' => [$case->room]])
            </div>
            @endisset
        </div>

        <div class="mt-4">
            <ul data-tabs>
                <li><a data-tabby-default href="#case-tab" class="direct" role="presentation">{{ __('Case') }}</a></li>
                <li><a href="#room-tab" class="direct" role="presentation">{{ __('Therapy room') }}</a></li>
            </ul>

            <div id="case-tab">
                @include('dashboard.samples.createCase')
            </div>

            <div id="room-tab">
                @include('dashboard.samples.createRoom')
            </div>
        </div>
    </div>
@endsection
