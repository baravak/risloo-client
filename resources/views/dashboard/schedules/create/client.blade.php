<div class="mt-4">
    <label for="clients_type" class="block mb-2 text-sm text-gray-700 font-medium">@lang('Type of clients')</label>
    <select id="clients_type" name="clients_type" class="border border-gray-500 h-10 rounded pl-4 pr-8 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
        <option value="risloo">@lang('Risloo users')</option>
        <option value="center">@lang('Users of :region', ['region' => $center->type == 'personal_clinic' ? __('Personal clinic of :user', ['user' => $room->manager->name]) : $center->detail->title])</option>
        @if ($center->type != 'personal_clinic')
            <option value="room">@lang('Users of :region', ['region' => __('Therapy room of :user', ['user' => $room->manager->name])])</option>
        @endif
        <option value="case">@lang('Case users ...')</option>
        @if (isset($session) && !isset($case))
            <option value="new_case">@lang('Create new case')</option>
        @endif
        {{-- <option value="client">@lang('Selected client')</option> --}}
    </select>
</div>

<div class="mt-4" id="case_selection_input">
    <label for="case_id" data-alias="case_id" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Case') }}</label>
    <select class="select2-select"  id="case_id" name="case_id" data-url="{{ route('dashboard.cases.index', ['room' => $room->id, 'instance' => 1]) }}">
        @isset($case)
        <option value="{{$case->id}}" selected>{{$case->clients->pluck('user.name')->join('-')}}</option>
        @endisset
    </select>
    @isset($case)
    <div data-for="case_id" class="hidden">
        @include('dashboard.cases.sampleSelect2', ['cases' => [$case]])
    </div>
    @endisset
</div>
@if (isset($session) && !isset($case))
    <div class="mt-4" id="new_case_selection_input">
        <label for="problem" class="block mb-2 text-sm text-gray-700 variable-font-medium">مسئله</label>
        <textarea id="problem" name="problem" autocomplete="off" class="resize-none border border-gray-500 h-24 md:h-16 rounded px-4 py-2 w-full text-sm placeholder-gray-300 focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60"></textarea>
    </div>
@endif

<div class="form-group mt-4">
    <input type="checkbox" id="group_session" name="group_session">
    <label for="group_session" data-alias="group_session" class="inline-block mb-2 text-sm text-gray-700 font-medium">@lang('جلسه گروهی')</label>
</div>

<div class="mt-4" id="clients-number-input">
    <label for="clients_number" class="inline-block mb-2 text-sm text-gray-700 font-medium">@lang('تعداد حداکثر مراجعین')</label>
    <input type="number" id="clients_number" name="clients_number" step="1" min="1" max="50" value="1" class="border border-gray-500 placeholder-gray-300 h-10 rounded px-4 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60 dir-ltr text-left">
</div>
<div class="mt-4">
    <label for="selection_type" class="block mb-2 text-sm text-gray-700 font-medium">@lang('نوع انتخاب مراجع(ین)')</label>
    <select id="selection_type" name="selection_type" class="border border-gray-500 h-10 rounded pl-4 pr-8 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
        <option value="first" @selectChecked($session->selection_type, 'first')>@lang('اولین نفر(هایی) که درخواست داد(دند)')</option>
        <option value="selective" @selectChecked($session->selection_type, 'selective')>@lang('انتخاب به عهده مرکز')</option>
    </select>
</div>
