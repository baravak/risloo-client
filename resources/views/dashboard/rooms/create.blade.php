@extends('dashboard.create')
@section('form_content')
    <div>
        <div class="mt-4">
            <label for="psychologist_id" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Psychologist') }}</label>
            <select class="select2-select"  name="psychologist_id"  id="psychologist_id" data-url="{{ route('dashboard.center.users.index', ['center' => $center->id, 'position' => join(',',config('users.room_managers')), 'has_room' => 'no'])}}" data-placeholder="{{ __('Select :attribute', ['attribute' => __('Psychologist')]) }}">
                @if (isset($user))
                    <option value="{{$user->id}}" data-json="{{$user}}">
                        {{$user->user->name}}
                    </option>
                @endif
            </select>
        </div>
    </div>
@endsection
