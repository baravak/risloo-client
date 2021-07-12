<h3 class="text-gray-700 variable-font-bold mb-4 mt-8">@lang('My therapy rooms')</h3>
<div class="grid grid-cols-1 sm:grid-cols-2 2xl:grid-cols-4 gap-4 mt-4">
    @foreach ($user->rooms->where('acceptation.position', 'manager') as $room)
        <div class="p-4 pl-12 pb-2 relative border border-gray-500 rounded">
            <a href="{{ route('dashboard.rooms.show', $room->id)  }}" class="flex items-center group">
                <div class="flex justify-center items-center flex-shrink-0 w-16 h-16 bg-gray-300 text-gray-600 text-xs rounded-full border-2 border-white overflow-hidden">
                    م‌ص
                </div>
                <div class="flex flex-col mr-2">
                    <span class="text-sm font-semibold text-brand transition">اتاق درمانی مهدیه حیدری‌زاد</span>
                    <span class="text-xs text-gray-600 group-hover:text-brand transition mt-1">@center($room->center)</span>
                </div>
            </a>
            <div class="flex flex-col absolute left-4 top-4">
                <a href="#" class="flex items-center justify-center w-7 h-7 bg-brand hover:bg-brand-600 transition rounded-md text-white text-sm"><i class="fal fa-eye"></i></a>
                <a href="#" class="flex items-center justify-center w-7 h-7 bg-green-500 hover:bg-green-700 transition rounded-md text-white mt-1"><i class="fal fa-calendar-alt"></i></a>
            </div>
            <div class="flex items-center flex-wrap mt-4">
                <a href="#" class="flex items-center text-xs text-gray-600 bg-blue-50 rounded h-5 px-2 hover:bg-brand hover:text-white transition ml-2 mb-2">اضطراب</a>
                <a href="#" class="flex items-center text-xs text-gray-600 bg-blue-50 rounded h-5 px-2 hover:bg-brand hover:text-white transition ml-2 mb-2">استرس</a>
                <a href="#" class="flex items-center text-xs text-gray-600 bg-blue-50 rounded h-5 px-2 hover:bg-brand hover:text-white transition ml-2 mb-2">آسیب‌شناسی اجتماعی</a>
                <a href="#" class="flex items-center text-xs text-gray-600 bg-blue-50 rounded h-5 px-2 hover:bg-brand hover:text-white transition ml-2 mb-2">روانشناختی</a>
                <a href="#" class="flex items-center text-xs text-gray-600 bg-blue-50 rounded h-5 px-2 hover:bg-brand hover:text-white transition ml-2 mb-2">طلاق پدر و مادر</a>
            </div>
        </div>
    @endforeach
</div>