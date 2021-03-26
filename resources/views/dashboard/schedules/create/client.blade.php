<div class="form-group mt-4">
    <input type="checkbox" id="group_session" name="group_session">
    <label for="group_session" data-alias="group_session" class="inline-block mb-2 text-sm text-gray-700 font-medium">@lang('جلسه گروهی')</label>
</div>
<div class="mt-4">
    <label for="clients_type" class="block mb-2 text-sm text-gray-700 font-medium">@lang('Type of clients')</label>
    <select id="clients_type" name="clients_type" class="border border-gray-500 h-10 rounded pl-4 pr-8 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
        <option value="risloo">@lang('Risloo users')</option>
        <option value="center">@lang('Center users')</option>
        <option value="room">@lang('Room usres')</option>
        <option value="case">@lang('Case users')</option>
        <option value="client">@lang('Selected client')</option>
    </select>
</div>

<div class="form-group mt-4">
    <label for="region_id" data-alias="region_id" class="block mb-2 text-sm text-gray-700 font-medium">@lang('Client')</label>
    <select class="select2-select" name="region_id"  id="region_id" data-url="{{route('dashboard.users.index')}}">
    </select>
</div>

<div class="mt-4">
    <label for="clients_number" class="inline-block mb-2 text-sm text-gray-700 font-medium">@lang('تعداد حداکثر مراجعین')</label>
    <input type="number" id="clients_number" name="clients_number" step="1" min="1" max="50" value="1" class="border border-gray-500 placeholder-gray-300 h-10 rounded px-4 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60 dir-ltr text-left">
</div>

<div class="mt-4">
    <label for="seletion_type" class="block mb-2 text-sm text-gray-700 font-medium">@lang('نوع انتخاب مراجع(ین)')</label>
    <select id="seletion_type" name="seletion_type" class="border border-gray-500 h-10 rounded pl-4 pr-8 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
        <option value="first">@lang('اولین نفر(هایی) که درخواست داد(دند)')</option>
        <option value="selective">@lang('انتخاب به عهده مرکز')</option>
    </select>
</div>
