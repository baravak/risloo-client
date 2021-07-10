<div class="flex items-center justify-between mt-8">
    <div class="relative dropdown">
        <button role="button" class="schedules-filter-active text-sm text-gray-500 border border-gray-500 rounded-full h-8 w-8 sm:w-auto sm:px-4 hover:bg-gray-100 transition focus-current ring-gray-500 dropdown-toggle" data-toggle="dropdownx" aria-haspopup="true">
            <i class="fal fa-filter relative top-0.5"></i>
            <span class="mr-1 hidden sm:inline-flex">@lang('فیلتر')</span>
        </button>
        <div class="rounded bg-white border border-gray-200 mt-2 shadow-md dropdown-menu min-w-64 absolute p-4 right:0 sm:right-4">
            @isset($allowedFilters->room)
                <div>
                    <span class="text-sm text-gray-600 variable-font-medium cursor-default">بر اساس اتاق درمان</span>
                    <div class="border border-gray-200 rounded bg-white mt-2 p-2 overflow-y-auto max-h-28">
                        @foreach ($allowedFilters->room as $filter_room)
                            @if ($schedules->where('room.id', $filter_room->id)->first())
                                @include('dashboard.schedules.roomFilterRaw', ['room' => $filter_room])
                            @endif
                        @endforeach
                        @foreach ($allowedFilters->room as $filter_room)
                            @if (!$schedules->where('room.id', $filter_room->id)->first())
                                @include('dashboard.schedules.roomFilterRaw', ['room' => $filter_room])
                            @endif
                        @endforeach
                    </div>
                </div>
            @endisset
            <div class="mt-4">
                <span class="text-sm text-gray-600 variable-font-medium cursor-default">بر اساس وضعیت</span>
                <div class="border border-gray-200 rounded bg-white mt-2 p-2 overflow-y-auto max-h-16">
                    @foreach ($allowedFilters->status as $filter_status)
                        <label class="flex items-center group cursor-pointer mb-2" title="">
                            <a href="{{ request()->create(url()->current(), 'GET', array_merge(request()->all(), ['status' => $filter_status]))->getUri() }}" class="text-xs text-gray-500 mr-2 group-hover:text-blue-600 truncate">@lang(ucfirst($filter_status))</a>
                        </label>
                    @endforeach
                </div>
            </div>

            <div class="flex items-center justify-between mt-4">
                <a href="{{ request()->create(url()->current(), 'GET', ['room' => null, 'status' => null])->getUri() }}" class="flex items-center justify-center rounded-full text-xs text-gray-500 hover:text-gray-700 transition max-h h-8 focus:outline-none">@lang('پاک کردن همه فیلترها')</a>
                {{-- <button class="flex items-center justify-center border border-brand rounded-full text-xs text-brand hover:text-white hover:bg-brand transition px-4 h-8">@lang('اعمال فیلتر')</button> --}}
            </div>
        </div>
    </div>
    <div class="flex items-center">
        <a href="{{ isset($room) || $center->type =='personal_clinic' ? route('dashboard.room.schedules.index', ['room' => $room->id, 'time'=>$weeks->sat->timestamp -1 ]) : route('dashboard.center.schedules.index', ['center' => $center->id, 'time'=>$weeks->sat->timestamp -1 ]) }}" role="button" class="flex items-center justify-center flex-shrink-0 text-sm text-brand border border-brand hover:text-white hover:bg-brand rounded-full w-8 sm:w-auto h-8 sm:px-4 transition focus">
            <i class="fal fa-chevron-right"></i>
            <span class="hidden sm:block mr-2">هفته قبل</span>
        </a>
        <div class="relative dropdown">
            <button disabled role="button" class="cursor-default flex items-center text-sm text-gray-600 border border-gray-600 hover:bg-gray-50 rounded-full h-8 px-6 transition focus mx-1 dropdown-toggle" data-toggle="dropdownx" aria-haspopup="true">
                <span class="pt-1">@time($weeks->sat, 'm/d') تا @time($weeks->fri, 'm/d')</span>
                {{-- <i class="fal fa-chevron-down mr-2"></i> --}}
            </button>
            {{-- <div class="mt-2 rounded bg-white border border-gray-200 shadow-lg dropdown-menu">
                <a href="#" class="dropdown-item text-sm block w-full px-1 py-2 text-center rounded text-gray-600 hover:text-brand hover:bg-gray-100 pt-2 border-b border-gray-200">۰۲/۲۵ تا ۰۳/۰۲</a>
                <a href="#" class="dropdown-item text-sm block w-full px-1 py-2 text-center rounded text-gray-600 hover:text-brand hover:bg-gray-100 pt-2 border-b border-gray-200">۰۴/۰۳ تا ۰۴/۰۹</a>
                <a href="#" class="dropdown-item text-sm block w-full px-1 py-2 text-center rounded text-gray-600 hover:text-brand hover:bg-gray-100 pt-2 border-b border-gray-200">۰۴/۱۰ تا ۰۴/۱۷</a>
            </div> --}}
        </div>
        <a href="{{ isset($room) || $center->type =='personal_clinic' ? route('dashboard.room.schedules.index', ['room' => $room->id, 'time'=>$weeks->fri->timestamp + (60*60*24) ]) : route('dashboard.center.schedules.index', ['center' => $center->id, 'time'=>$weeks->fri->timestamp + (60*60*24) ]) }}" role="button" class="flex items-center justify-center flex-shrink-0 text-sm text-brand border border-brand hover:text-white hover:bg-brand rounded-full w-8 sm:w-auto h-8 sm:px-4 transition focus">
            <span class="hidden sm:block ml-2">هفته بعد</span>
            <i class="fal fa-chevron-left"></i>
        </a>
    </div>
</div>
@if (config('app.env') == 'local')
    @if (isset($filters->room) || isset($filters->status))
        <div class="flex items-center flex-wrap mt-4">
            @isset($filters->room)
            <div class="flex items-center bg-gray-200 px-2 h-7 rounded ml-2 mt-2">
                <span class="text-xs text-gray-800 ml-2 cursor-default">{{ $filters->room->manager->name }}</span>
                <a href="{{ request()->create(url()->current(), 'GET', array_merge(request()->all(), ['room' => null]))->getUri() }}" class="inline-flex items-center text-xs justify-center text-gray-600 w-3 h-3 rounded-full focus:outline-none hover:text-red-600"><i class="fal fa-times"></i></a>
            </div>
            @endisset
            @isset($filters->status)
            <div class="flex items-center bg-gray-200 px-2 h-7 rounded ml-2 mt-2">
                <span class="text-xs text-gray-800 ml-2 cursor-default">@lang(ucfirst($filters->status))</span>
                <a href="{{ request()->create(url()->current(), 'GET', array_merge(request()->all(), ['status' => null]))->getUri() }}" class="inline-flex items-center text-xs justify-center text-gray-600 w-3 h-3 rounded-full focus:outline-none hover:text-red-600"><i class="fal fa-times"></i></a>
            </div>
            @endisset
        </div>
    @endif
@endif
