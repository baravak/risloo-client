<div>
    <div class="flex justify-between items-center mt-8 mb-4">
        <div>
            <h3 class="flex items-center font-bold text-gray-700 cursor-default">
                <span class="w-8 border-t border-gray-200 inline-block ml-3"></span>
                <span>{{ __('Users') }}</span>
                <span class="text-xs text-gray-600 font-light mr-2" data-xhr="total">({{ $session->clients ? $session->clients->count() : 0 }})</span>
            </h3>
        </div>
        {{-- @can('dashboard.cases.manager', $case) --}}
            <div>
                <a href="{{ route('dashboard.session.users.create', $session->id) }}" class="flex justify-center items-center flex-shrink-0 border border-green-700 text-green-700 px-4 w-9 sm:w-auto h-9 rounded-full text-xs leading-normal hover:bg-green-50 transition">
                    <i class="fal fa-plus sm:ml-2"></i>
                    <span class="hidden sm:inline">{{ __('Add user') }}</span>
                </a>
            </div>
        {{-- @endcan --}}
    </div>
    @include($session->clients && $session->clients->count() ? 'dashboard.sessions.usersList' : 'dashboard.sessions.emptyUsers')
</div>
