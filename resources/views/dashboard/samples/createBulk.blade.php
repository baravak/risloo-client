<input type="hidden" name="type" value="bulk">
<div class="mt-8">
    <div class="flex items-center text-xs text-gray-500 border-r-2 border-gray-400 pr-2">
        <span>زمانی که قصد دارید تعداد نا مشخصی از اعضا که به آن‌ها دسترسی ندارید، نمونه‌(ها)ای را پر کنند، با این قسمت نمونه را بسازید. در این‌حالت یک لینک در اختیار شما قرار می‌گیرد که آن را به اشتراک می‌گذارید و هرفردی که با این لینک وارد شد، نمونه(ها) برای او فعال می‌شود</span>
    </div>

    <div class="mt-4">
        <label for="title" class="block mb-2 text-sm text-gray-700 font-medium">@lang('Title')</label>
        <input type="text" name="title" id="title" autocomplete="off" class="border border-gray-500 h-10 rounded px-4 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60 placeholder-gray-400 placehol" placeholder="مثال: گروه‌درمانی دکتر جان‌بزرگی - CBT - درمان وسواس">
        <div class="flex items-center text-xs text-gray-400 mt-2">
            <i class="fal fa-info-circle ml-1"></i>
            <span>کمک می‌کند تا نمونه‌های شما یک نام مشترک داشته باشند و راحت‌تر آن‌ها را پیدا کنید.</span>
        </div>
    </div>

    <div class="mt-4">
        <label for="group_count" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Count of users') }}</label>
        <input type="number" name="count" id="group_count" autocomplete="off" class="border border-gray-500 h-10 rounded px-4 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
        <div class="flex items-center text-xs text-gray-400 mt-2">
            <i class="fal fa-info-circle ml-1"></i>
            <span>تعداد اعضاءی که قصد دارند نمونه(ها) را انجام دهند</span>
        </div>
    </div>

    <div class="mt-4">
        <label for="case_status" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Case status') }}</label>
        <select  id="case_status" name="case_status" class="border border-gray-500 h-10 rounded px-4 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
            <option value="">@lang('Without case')</option>
            <option value="personal">@lang('Create personal case')</option>
            <option value="group">@lang('Create group case')</option>
            <option value="exist">@lang('Exists case')</option>
        </select>
    </div>

    <div class="mt-4">
        <label for="bulk_case_id" class="block mb-2 text-sm text-gray-700 font-medium">{{ __('Case') }}</label>
        <select class="select2-select" id="bulk_case_id" name="case_id" data-url="{{ isset($room) ? route('dashboard.cases.index', ['room' => $room->id, 'instance' => 1]) : '' }}"  data-url-pattern="{{ route('dashboard.cases.index', ['room' => '%%', 'instance' => 1]) }}">
            @isset($case)
            <option value="{{$case->id}}" selected>{{$case->clients->pluck('user.name')->join('-')}}</option>
            @endisset
        </select>
        @isset($case)
        <div data-for="bulk_case_id" class="hidden">
            @include('dashboard.cases.select2', ['cases' => [$case]])
        </div>
        @endisset
    </div>

    <div class="mt-4">
        <label class="inline-flex items-center group">
            <input type="checkbox"name="integrated" value="1" checked class="w-3.5 h-3.5 border border-gray-600 rounded-sm focus:ring-1 focus:ring-offset-1">
            <span class="text-sm text-gray-600 mr-2 group-hover:text-blue-600">@lang('Integrated serial & pin')</span>
        </label>
    </div>
</div>
