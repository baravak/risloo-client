@extends('dashboard.create')
@section('form_content')
    <div>
        <div class="mt-4">
            <label for="scale_id" data-alias="manager_id" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Scale') }}</label>
            <select multiple name="scale_id[]" id="scale_id" data-url="{{ route('dashboard.assessments.index') }}" class="select2-select">
                @isset($scale)
                    <option value="{{$scale->id}}" data-json="{{$scale}}" selected>{{$scale->title}}</option>
                @endisset
            </select>
        </div>

        <div class="mt-4">
            <label for="room_id" data-alias="manager_id" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Room') }}</label>
            <select data-relation="case_id room_client_id" data-template="room" name="room_id" data-title="manager.name manager.id" data-avatar="manager.avatar.tiny.url manager.avatar.small.url" id="room_id" data-url="{{ route('dashboard.rooms.index' , ['my_management' => 1]) }}" class="select2-select">
                @isset($case)
                <option value="{{$case->room->id}}" data-json="{{$case->room}}" selected>{{$case->room->manager->name}}</option>
                @endisset
            </select>
        </div>

        <div class="mt-4">
            <h3 class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Create sample for') }}</h3>
            <div class="mt-1">
                <label class="inline-flex items-center group">
                    <input type="radio" name="create-sample" id="" value="" class="w-3.5 h-3.5 border border-gray-600 focus:ring-2 focus:ring-offset-2">
                    <span class="text-sm text-gray-600 mr-2 group-hover:text-blue-600">{{ __('Room') }}</span>  
                </label>
            </div>
            <div class="mt-1">
                <label class="inline-flex items-center group">
                    <input type="radio" name="create-sample" id="" value="" @radioChecked($center->type, 'counseling_center') {!!isset($center) ? 'disabled' : ''!!} class="w-3.5 h-3.5 border border-gray-600 focus:ring-2 focus:ring-offset-2">
                    <span class="text-sm text-gray-600 mr-2 group-hover:text-blue-600">{{ __('Case') }}</span>  
                </label>
            </div>
        </div>

        @include('dashboard.samples.createRoom')
        
        @include('dashboard.samples.createCase')
    </div>
@endsection
