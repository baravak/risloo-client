@extends('dashboard.create')
@section('form_content')
    <div class="mt-4">
        <label for="client_id" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Client') }}</label>
        <select name="client_id[]" id="client_id" data-url="{{route('dashboard.room.users.index', ['room' => $case->room->id, 'not_in_case' => $case->id])}}" data-placeholder="{{__('Select client')}}" multiple class="select2-select">
        </select>
    </div>
@endsection
