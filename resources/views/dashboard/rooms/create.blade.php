@extends('dashboard.create')
@section('form_content')
    <div>
        <div class="mt-4">
            <label for="counseling_center_id" data-alias="manager_id" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Therapy center') }}</label>
            <select class="select2-select" data-template="center" name="counseling_center_id" id="counseling_center_id" data-url="{{ route('dashboard.centers.index', ['my_position' => 'manager', 'type' => 'counseling_center']) }}" data-relation="psychologist_id" data-placeholder="{{ __('Select :attribute', ['attribute' => __('Therapy center')]) }}">
                @if (isset($center))
                    <option value="{{$center->id}}" data-json="{{$center}}">
                        {{$center->detail->title}}
                    </option>
                @endif
            </select>
        </div>

        <div class="mt-4">
            <label for="psychologist_id" data-alias="manager_id" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Psychologist') }}</label>
            <select class="select2-select" data-template="users" name="psychologist_id" data-avatar="user.avatar.small.url" data-id="id" data-title="user.name" id="psychologist_id" data-url="{{ isset($center) ? route('dashboard.center.users.index', ['center' => $center->id, 'position' => join(',',config('users.room_managers')), 'has_room' => 'no']) : '' }}" data-url-pattern="{{ route('dashboard.center.users.index', ['center' => '%%', 'position' => join(',',config('users.room_managers')), 'has_room' => 'no']) }}" data-placeholder="{{ __('Select :attribute', ['attribute' => __('Psychologist')]) }}">
                @if (isset($user))
                    <option value="{{$user->id}}" data-json="{{$user}}">
                        {{$user->user->name}}
                    </option>
                @endif
            </select>
        </div>
    </div>
@endsection