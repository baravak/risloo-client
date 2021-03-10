@extends('dashboard.create')
@section('form_content')
    <div class="border border-gray-200 rounded p-4 mt-8">
        <div>
            <label for="scale_id" data-alias="manager_id" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Scale') }}</label>
            <select class="select2-select" multiple name="scale_id[]" id="scale_id" data-url="{{ route('dashboard.assessments.index', ['instance' => 1]) }}">
                @isset($scale)
                    <option value="{{$scale->id}}" selected>{{$scale->title}}</option>
                @endisset
            </select>
            @isset($scale)
            <div data-for="scale_id" class="hidden">
                @include('dashboard.assessments.select2', ['assessments' => [$scale]])
            </div>
            @endisset
        </div>

        <div class="mt-4">
            <label for="room_id" data-alias="manager_id" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Room') }}</label>
            <select class="select2-select" data-relation="case_id room_client_id bulk_case_id" name="room_id"  id="room_id" data-url="{{ route('dashboard.rooms.index' , ['my_management' => 1, 'instance' => 1]) }}">
            @isset($room)
                <option value="{{$room->id}}" selected>{{ $room->manager->name  }}</option>
            @endisset
            </select>
            @isset($room)
            <div data-for="room_id" class="hidden">
                @include('dashboard.rooms.select2', ['rooms' => [$room]])
            </div>
            @endisset
        </div>

        <div class="mt-4">
            <ul data-tabs>
                <li><a data-tabby-default href="#case-tab" class="direct" role="presentation">{{ __('Case') }}</a></li>
                <li><a href="#room-tab" class="direct" role="presentation">{{ __('Therapy room') }}</a></li>
                <li><a href="#bulk-tab" class="direct" role="presentation">{{ __('Bulk sample') }}</a></li>
            </ul>

            <div id="case-tab">
                @include('dashboard.samples.createCase')
            </div>

            <div id="room-tab">
                @include('dashboard.samples.createRoom')
            </div>

            <div id="bulk-tab">
                @include('dashboard.samples.createBulk')
            </div>
        </div>
    </div>
@endsection
