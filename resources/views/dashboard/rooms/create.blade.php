@extends('dashboard.create')
@section('form_content')
    <div class="form-group form-group-m">
        <select class="select2-select form-control form-control-m" data-template="center" name="counseling_center_id" id="counseling_center_id" data-url="{{route('dashboard.centers.index', ['my_position' => 'manager', 'type' => 'counseling_center'])}}" data-relation="psychologist_id" data-placeholder="{{__('Select :attribute', ['attribute' => __('Therapy center')])}}">
            @if (isset($center))
                <option value="{{$center->id}}" data-json="{{$center}}">
                    {{$center->detail->title}}
                </option>
            @endif
        </select>
        <label for="counseling_center_id">{{__('Therapy center')}}</label>
    </div>
    <div class="form-group form-group-m">
        <select class="select2-select form-control form-control-m" data-template="users" name="psychologist_id" data-avatar="user.avatar.small.url" data-id="id" data-title="user.name" id="psychologist_id" data-url="{{isset($center) ? route('dashboard.center.users.index', ['center' => $center->id, 'position' => join(',',config('users.room_managers')), 'has_room' => 'no']) : ''}}" data-url-pattern="{{route('dashboard.center.users.index', ['center' => '%%', 'position' => join(',',config('users.room_managers')), 'has_room' => 'no'])}}" data-placeholder="{{__('Select :attribute', ['attribute' => __('Psychologist')])}}">
            @if (isset($user))
                <option value="{{$user->id}}" data-json="{{$user}}">
                    {{$user->user->name}}
                </option>
            @endif
        </select>
        <label for="psychologist_id">{{__('Psychologist')}}</label>
    </div>
@endsection
