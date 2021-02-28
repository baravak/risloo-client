<header id="header" class="flex justify-between items-center h-20 px-4">
    <div>
        <button id="aside-open" class="lg:hidden flex justify-center items-center w-12 h-12 border border-gray-300 text-gray-400 rounded hover:bg-gray-50">
            <i class="fal fa-bars text-xl text-gray-500"></i>
        </button>
    </div>

    <div class="flex">
        @if (false)
            <a href="#" class="flex justify-center items-center w-12 h-12 border border-gray-300 text-gray-400 rounded hover:bg-gray-50 ml-2">
                <i class="fal fa-bell text-xl text-gray-500"></i>
            </a>
        @endif

        <a href="{{ route('dashboard.users.me') }}" class="flex items-center border border-gray-300 rounded px-3 h-12 hover:bg-gray-50 transition" title="{{ __('Me') }}">
            <div class="flex justify-center items-center flex-shrink-0 w-8 h-8 rounded overflow-hidden ml-3 bg-blue-500 text-white border border-gray-200 text-xs">
                {{-- <span>ا ج</span> --}}
                <img src="{{ auth()->user()->avatar_url->url('small') }}" alt="{{ auth()->user()->name }}" class="w-full h-full object-cover object-center">
            </div>
            <div class="flex justify-between items-center">
                <div>
                    <div class="font-medium text-xs text-gray-700">{{ auth()->user()->name ?: auth()->user()->id }}</div>

                    @if (false)
                        <div class="text-xs text-green-500 mt-1 dir-ltr">
                            <span class="inline-block">تومان</span>
                            <span class="inline-block">۱۰۰,۰۰۰,۰۰۰</span>
                        </div>
                    @endif
                </div>
            </div>
        </a>

        <a href="{{ route('logout') }}" data-lijax='click' data-method='post' class="flex justify-center items-center w-12 h-12 border border-gray-300 text-gray-400 rounded hover:bg-gray-50 hover:text-red-500 mr-2 group direct" title="{{ __('Logout') }}">
            <i class="fal fa-sign-out text-xl text-gray-500 group-hover:text-red-500 transform rotate-180"></i>
        </a>
    </div>
</header>