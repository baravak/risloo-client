<div>
    <label class="block mb-2 text-sm text-gray-700 font-medium">انتخاب محور جلسه</label>
    <select class="border border-gray-500 h-10 rounded pl-4 pr-8 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60" name="field">
        @if ($session->fields->count() > 1)
        <option></option>
        @endif
            @foreach ($session->fields as $field)
                <option value="{{ $field->id }}">{{ $field->title }} | @lang(':amount T', ['amount' => $field->amount])</option>
            @endforeach
    </select>
</div>
@isset($case)
<div class="mt-4">
    <h3 class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Select client') }}</h3>
    @foreach ($case->clients ?: [] as $client)
        @if (!$session->clients || !$session->clients->where('id', $client->id)->first())
            <label class="block group">
                <input type="checkbox" name="client_id[]"  value="{{ $client->id }}" class="w-3.5 h-3.5 align-middle border border-gray-500 hover:border-brand rounded-sm focus:ring-1 focus:ring-offset-1">
                <span class="text-sm text-gray-500 mr-1 group-hover:text-blue-600">{{ $client->name }}</span>
            </label>
        @endif
    @endforeach
</div>
@else
<div class="mt-4">
    <label class="block mb-2 text-sm text-gray-700 font-medium">
        <input type="radio" id="center_users_radio" name="client_typ" value="center" checked>
        انتخاب مراجع
    </label>
    <select class="select2-select"  id="center_users" name="client_id[]" data-url="{{ route('dashboard.room.users.index', ['room' => $room->id, 'usage' => 'create_case']) }}" data-allow-clear="true" data-placeholder="@lang('Search')">
    </select>
</div>
<div class="mt-4">
    <label class="block mb-2 text-sm text-gray-700 font-medium">
        <input type="radio" id="case_users_radio" name="client_typ" value="case">
        انتخاب پرونده و مراجع پرونده
    </label>
    <select class="select2-select"  id="case_id" name="case_id" data-url="{{ route('dashboard.cases.index', ['room' => $room->id, 'instance' => 1]) }}" data-allow-clear="true" data-placeholder="@lang('Search')"  data-xhr-base="with-client-checkbox">
    </select>
    <div data-xhr="case-clients"></div>
</div>
    <div class="mt-4" id="problem-element">
        <label for="problem" class="block mb-2 text-sm text-gray-700 variable-font-medium">مسئله</label>
        <textarea id="problem" name="problem" autocomplete="off" class="resize-none border border-gray-500 h-24 md:h-16 rounded px-4 py-2 w-full text-sm placeholder-gray-300 focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60"></textarea>
    </div>
@endisset
<div class="mt-4">
    <label for="description" class="block mb-2 text-sm text-gray-700 variable-font-medium">توضیحات</label>
    <textarea id="description" name="description" autocomplete="off" class="resize-none border border-gray-500 h-24 md:h-16 rounded px-4 py-2 w-full text-sm placeholder-gray-300 focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60"></textarea>
</div>
