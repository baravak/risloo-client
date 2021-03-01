@extends('dashboard.create')
@section('form_content')
    <div class="border border-gray-200 rounded p-4 mt-8">
        <div>
            <label for="mobile" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Mobile') }}</label>
            <input type="text" name="mobile" id="mobile" autocomplete="off" class="border border-gray-500 h-10 rounded px-4 w-full text-sm text-left dir-ltr focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
        </div>

        @if ((auth()->isAdmin() || $center->acceptation->position == 'manager') && $center->type == 'counseling_center')
            <div class="mt-4">
                <label for="position" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Position') }}</label>
                <select name="position" id="position" class="border border-gray-500 h-10 rounded pl-4 pr-8 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
                    <option value="manager">{{ __('Manager') }}</option>
                    <option value="operator">{{ __('Operator') }}</option>
                    <option value="psychologist">{{ __('Psychologist') }}</option>
                    <option value="client">{{ __('Client') }}</option>
                </select>
            </div>
        @endif

        @if ($center->type == 'counseling_center')
            <div class="mt-4">
                <label for="room_id" data-alias="manager_id" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Room') }}</label>
                <select class="select2-select placeholder-gray-300" data-template="room" name="room_id" data-title="manager.name manager.id" data-avatar="manager.avatar.tiny.url manager.avatar.small.url" id="room_id" data-url="{{ route('dashboard.rooms.index', ['center' => $center->id]) }}" data-relation="client_id">
                    @isset($room)
                    <option value="{{ $room->id }}" data-json="{{ $room }}"></option>
                    @endisset
                </select>
            </div>
        @endif

        <div class="mt-4">
            <label for="nickname" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Client name') }}</label>
            <input type="text" name="nickname" id="nickname" autocomplete="off" class="border border-gray-500 h-10 rounded px-4 w-full text-sm text-left dir-ltr focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
            <div class="flex items-center text-xs text-gray-400 mt-2">
                <i class="fal fa-info-circle ml-1"></i>
                <span>{{ __('This name is only valid in your center') }}</span>
            </div>
        </div>

        <div class="mt-4">
            <label class="inline-flex items-center group">
                <input type="checkbox" name="create_case" id="create_case" value="1" class="w-3.5 h-3.5 border border-gray-600 rounded-sm focus:ring-1 focus:ring-offset-1">
                <span class="text-sm text-gray-600 mr-2 group-hover:text-blue-600">{{ __('Create case for this client') }}</span>
            </label>
        </div>
    </div>
@endsection