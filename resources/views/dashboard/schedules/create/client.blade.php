<div class="mt-4">
    <label for="clients_type" class="block mb-2 text-sm text-gray-700 font-medium">@lang('Type of clients')</label>
    <select id="clients_type" name="clients_type" class="border border-gray-500 h-10 rounded pl-4 pr-8 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
        <option value="risloo">@lang('Risloo users')</option>
        <option value="center">@lang('Users of :region', ['region' => $center->type == 'personal_clinic' ? __('Personal clinic of :user', ['user' => $room->manager->name]) : $center->detail->title])</option>
        @if ($center->type != 'personal_clinic')
            <option value="room">@lang('Users of :region', ['region' => __('Therapy room of :user', ['user' => $room->manager->name])])</option>
        @endif
        <option value="case">@lang('Case users ...')</option>
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

{{-- <div class="form-group mt-4" id="client_selection_input">
    <label for="client_id" data-alias="client_id" class="block mb-2 text-sm text-gray-700 font-medium">@lang('Client')</label>
    <select class="select2-select" name="client_id"  id="client_id" data-url="{{route('dashboard.room.users.index', $room->id)}}">
    </select>
</div> --}}

{{-- <div class="mt-4">
    <label for="selection_type" class="block mb-2 text-sm text-gray-700 font-medium">@lang('نوع انتخاب مراجع(ین)')</label>
    <select id="selection_type" name="selection_type" class="border border-gray-500 h-10 rounded pl-4 pr-8 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
        <option value="first">@lang('اولین نفر(هایی) که درخواست داد(دند)')</option>
        <option value="selective">@lang('انتخاب به عهده مرکز')</option>
    </select>
</div> --}}
