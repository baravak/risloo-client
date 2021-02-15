<div>
    <div class="mb-4 mt-8">
        <h3 class="flex items-center font-bold text-gray-700 cursor-default">
            <span class="w-8 border-t border-gray-200 inline-block ml-3"></span>
            <span>{{ __('Practices') }}</span>
        </h3>
    </div>
    
    <div class="flex items-center justify-between mb-4">
        <div class="w-1/2">
            <input type="search" placeholder="{{ __('Search') }}" class="w-full px-3 h-7 rounded border border-gray-200 font-light text-sm placeholder-gray-300">
        </div>
        <div>
            <a href="#" class="flex justify-center items-center flex-shrink-0 border border-green-700 text-green-700 px-4 h-7 rounded-full text-xs leading-normal hover:bg-green-50 transition-all">
                <i class="fal fa-plus ml-2"></i>
                <span class="font-medium">{{ __('Create practice') }}</span>
            </a>
        </div>
    </div>
    {{-- @include($session->practices && $session->practices->count() ? 'dashboard.sessions.practicesList' : 'dashboard.sessions.emptyPractices') --}}
</div>