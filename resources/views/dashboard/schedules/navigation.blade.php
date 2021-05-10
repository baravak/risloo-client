<div class="flex justify-center items-start">
    <a href="{{ isset($room) || $center->type =='personal_clinic' ? route('dashboard.room.schedules.index', ['room' => $room->id, 'time'=>$weeks->sat->timestamp -1 ]) : route('dashboard.center.schedules.index', ['center' => $center->id, 'time'=>$weeks->sat->timestamp -1 ]) }}" role="button" class="flex items-center justify-center flex-shrink-0 text-sm text-brand border border-brand hover:text-white hover:bg-brand rounded-full w-9 sm:w-auto h-9 sm:px-6 transition focus ml-2">
        <i class="fal fa-chevron-right"></i>
        <span class="hidden sm:block mr-2">هفته قبل</span>
    </a>
    <div class="relative dropdown">
        <button role="button" class="flex items-center text-sm text-gray-600 border border-gray-600 hover:bg-gray-50 rounded-full h-9 px-6 transition focus ml-2 dropdown-toggle" data-toggle="dropdownx" aria-haspopup="true">
            <span class="pt-1">@time($weeks->sat, 'm/d') تا @time($weeks->fri, 'm/d')</span>
            {{-- <i class="fal fa-chevron-down mr-2"></i> --}}
        </button>
        {{-- <div class="mt-2 rounded bg-white border border-gray-200 shadow-lg dropdown-menu">
            <a href="#" class="dropdown-item text-sm block w-full px-1 py-2 text-center rounded text-gray-600 hover:text-brand hover:bg-gray-100 pt-2 border-b border-gray-200">۰۲/۲۵ تا ۰۳/۰۲</a>
            <a href="#" class="dropdown-item text-sm block w-full px-1 py-2 text-center rounded text-gray-600 hover:text-brand hover:bg-gray-100 pt-2 border-b border-gray-200">۰۴/۰۳ تا ۰۴/۰۹</a>
            <a href="#" class="dropdown-item text-sm block w-full px-1 py-2 text-center rounded text-gray-600 hover:text-brand hover:bg-gray-100 pt-2 border-b border-gray-200">۰۴/۱۰ تا ۰۴/۱۷</a>
        </div> --}}
    </div>
    <a href="{{ isset($room) || $center->type =='personal_clinic' ? route('dashboard.room.schedules.index', ['room' => $room->id, 'time'=>$weeks->fri->timestamp + (60*60*24) ]) : route('dashboard.center.schedules.index', ['center' => $center->id, 'time'=>$weeks->fri->timestamp + (60*60*24) ]) }}" role="button" class="flex items-center justify-center flex-shrink-0 text-sm text-brand border border-brand hover:text-white hover:bg-brand rounded-full w-9 sm:w-auto h-9 sm:px-6 transition focus">
        <span class="hidden sm:block ml-2">هفته بعد</span>
        <i class="fal fa-chevron-left"></i>
    </a>
</div>
