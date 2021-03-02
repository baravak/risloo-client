<div class="mt-8">
    <div class="flex justify-between items-center mb-4">
        <div class="flex items-center">
            <span class="w-8 border-t border-gray-200 inline-block ml-3"></span>
            <h3 class="font-bold text-gray-700 cursor-default">{{ __('My cases') }}</h3>
            <span class="text-xs text-gray-600 font-light mr-2" data-xhr="total">(3)</span>
        </div>
        <div>
            <a href="#" class="text-sm text-blue-700">{{ __('See All') }}</a>
        </div>
    </div>

    <div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-4">
            <a href="#" class="flex flex-col justify-between border border-gray-200 rounded hover:bg-gray-50">
                <div class="p-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <span class="text-green-600 text-xs">در جریان</span>
                        </div>
                        <div class="dir-ltr text-left text-gray-500">
                            <i class="fal fa-copy mr-1"></i>
                            <span class="font-semibold text-sm">RS966669C</span>
                        </div>
                    </div>
                    <div class="mt-4">
                        {{-- @foreach ($case->clients as $client) --}}
                        <div class="flex items-center">
                            <div class="flex items-center justify-center flex-shrink-0 w-8 h-8 bg-gray-300 text-xs text-gray-600 rounded-full border-2 border-white overflow-hidden ml-1">
                                {{-- @avatarOrName($client->user) --}}
                            </div>
                            <span class="text-xs text-gray-500">عباس غلام پور</span>
                        </div>
                        {{-- @endforeach --}}
                    </div>
                </div>
                <div class="flex items-center justify-between bg-gray-50 border-t border-gray-200 mt-2 px-4 py-3">
                        <div class="text-xs text-gray-500">
                            <i class="fal fa-clock ml-1"></i>
                            {{-- <span>@time($case->created_at, '%A %d %B %y')</span> --}}
                            <span>شنبه 11 بهمن 99</span>
                        </div>
                        <div class="text-xs text-gray-500">
                            <i class="fal fa-user-friends ml-1"></i>
                            {{-- <span>{{ __(':count sessions', ['count' => $case->sessions_count]) }}</span> --}}
                            <span>1 جلسه</span>
                        </div>
                </div>
            </a>
        </div>
    </div>
</div>