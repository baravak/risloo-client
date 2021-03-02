<div>
    <div class="flex justify-between items-center mb-4">
        <div class="flex items-center">
            <span class="w-8 border-t border-gray-200 inline-block ml-3"></span>
            <h3 class="font-bold text-gray-700 cursor-default">{{ __('My therapy centers') }}</h3>
            <span class="text-xs text-gray-600 font-light mr-2" data-xhr="total">(8)</span>
        </div>
        <div>
            <a href="#" class="text-sm text-blue-700">{{ __('See All') }}</a>
        </div>
    </div>

    <div data-xhr="center-items">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <a href="#" class="border border-gray-200 rounded hover:bg-gray-50 transition">
                <div class="h-24 bg-gray-100 border-b border-gray-200"></div>

                <div class="flex justify-center items-center flex-shrink-0 w-24 h-24 mx-auto -mt-12 bg-gray-300 text-gray-600 rounded-full border-4 border-white overflow-hidden">
                    <span>ت م</span>
                </div>

                <div class="p-4">
                    <div class="text-sm sm:text-base text-center text-gray-700 font-bold">
                        <span>عنوان مرکز درمانی</span>
                    </div>
                    {{-- <div class="text-xs text-center text-gray-700 mt-2">نام مدیر</div> --}}
                    <div class="text-xs text-center text-gray-500 mt-2">{{ __('Personal clinic') }}</div>
                </div>
            </a>
        </div>
    </div>
</div>