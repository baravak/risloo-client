@extends('dashboard.create', ['callbackCancel' => $room->route('show')])
@section('form_content')
    <div>
        <input type="hidden" name="room_id" value="{{ $room->id }}">
        <div class="mt-4">
            <label for="title" class="block mb-2 text-sm text-gray-700 font-medium">عنوان یا سریال داخلی</label>
            <input type="text" name="title" id="title" autocomplete="off" placeholder="عنوان پرونده یا سریال داخلی‌ای که استفاده می‌کنید" class="border border-gray-500 h-10 rounded px-4 w-full text-sm placeholder-gray-300 focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
        </div>

        <div class="mt-4">
            <label for="client_id" data-alias="manager_id" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Client') }}</label>
            <select  name="client_id[]" id="client_id" @if($room) data-url="{{route('dashboard.room.users.index', ['room' => $room->id, 'usage' => 'create_case'])}}" @endisset data-url-pattern="{{route('dashboard.room.users.index', ['room' => '%%', 'not_in_case' => (isset($case) ? $case->id : null), 'usage' => 'create_case'])}}" data-placeholder="{{__('Select client') . ' ' . __('through mobile or name')}}" multiple class="select2-select">
                @isset($client)
                    <option value="{{ $client->id }}"selected>@displayName($client)</option>
                @endisset
            </select>
            @isset($client)
            <div data-for="room_id" class="hidden">
                @include('dashboard.room-users.select2', ['users' => [$client]])
            </div>
            @endisset
        </div>

        <div class="mt-4">
            <label for="problem" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Problem') }}</label>
            <textarea id="problem" name="problem" autocomplete="off" @formValue($case->problem) class="resize-none border border-gray-500 h-24 rounded px-4 py-2 w-full text-sm placeholder-gray-300 focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60"></textarea>
        </div>
    </div>

    <div class="form-group mt-4">
        <label for="tag-finder" data-alias="tag_finder" class="block mb-2 text-sm text-gray-700 font-medium">@lang('Tags')</label>
        <select class="select2-select"  id="tag-finder" data-fill="tags" data-url="{{route('dashboard.users.index', isset($center) ? ['personal_clinic' => $center->type == 'counseling_center' ? 'yes' : 'no'] : null)}}" data-tags="true" multiple></select>
</div>
@endsection
