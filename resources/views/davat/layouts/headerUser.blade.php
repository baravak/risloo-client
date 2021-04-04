<div class="flex" data-xhr="user-header-nav">
    <a href="{{ route('dashboard.users.me') }}" class="flex items-center border border-gray-300 rounded px-3 h-12 hover:bg-gray-50 transition dropdown-toggle mr-2 sm:mr-0 focus">
        <div class="flex justify-center items-center flex-shrink-0 w-8 h-8 rounded overflow-hidden ml-2 text-white border border-gray-200 text-xs {{ !auth()->user()->avatar ? 'bg-blue-500' : '' }}" data-xhr="short-avatar">
            @avatarOrName(auth()->user())
        </div>
        <div class="flex justify-between items-center">
            <div class="font-medium text-xs text-gray-700 variable-font-medium truncate" style="max-width: 6rem;">{{ auth()->user()->name ?: auth()->user()->id }}</div>
        </div>
    </a>

    @if (auth()->user()->response('current'))
        <a href="{{ route('auth.back') }}" data-lijax='click' data-method='post' class="flex justify-center items-center flex-shrink-0 w-12 h-12 border border-gray-300 text-gray-400 rounded hover:bg-gray-50 hover:text-brand mr-2 group direct" title="{{ __('Admin') }}">
            <i class="fal fa-user-crown text-xl text-gray-500 group-hover:text-brand"></i>
        </a>
    @endif

    <a href="{{ route('logout') }}" data-lijax='click' data-method='post' class="flex justify-center items-center flex-shrink-0 w-12 h-12 border border-gray-300 text-gray-400 rounded hover:bg-gray-50 hover:text-red-500 mr-2 group focus-current ring-red-500 direct" title="{{ __('Logout') }}">
        <i class="fal fa-sign-out text-xl text-gray-500 group-hover:text-red-500 transform rotate-180"></i>
    </a>

    @if (false)
        <div class="relative dropdown">
            <button type="button" class="flex items-center border border-gray-300 rounded px-3 h-12 hover:bg-gray-50 transition dropdown-toggle focus">
                <div class="flex justify-center items-center flex-shrink-0 w-8 h-8 rounded overflow-hidden ml-3 bg-brand text-white border border-gray-200 text-xs" data-xhr="short-avatar">
                    @avatarOrName(auth()->user())
                </div>
                <div class="flex justify-between items-center">
                    <div>
                        <div class="font-medium text-xs text-gray-700">{{ auth()->user()->name ?: auth()->user()->id }}</div>
                        <div class="text-xs text-green-500 mt-1 dir-ltr">
                            <span class="inline-block">تومان</span>
                            <span class="inline-block">۱۰۰,۰۰۰,۰۰۰</span>
                        </div>
                    </div>
                </div>
            </button>
            <div class="rounded bg-white border border-gray-200 mt-1 shadow-md dropdown-menu">
                <a href="{{ route('dashboard.users.me') }}" class="block text-sm text-gray-700 text-center py-3 hover:bg-gray-100 border-b border-gray-100 transition">مشاهده پروفایل</a>
                <a href="#" class="block text-sm text-gray-700 text-center py-3 hover:bg-gray-100 border-b border-gray-100 transition">@lang('Financial treasuries')</a>
                <a href="{{ route('logout') }}" data-lijax='click' data-method='post' title="{{ __('Logout') }}" class="block text-sm text-red-600 text-center py-3 hover:bg-gray-100 transition">@lang('Logout')</a>
            </div>
        </div>
    @endif
</div>
