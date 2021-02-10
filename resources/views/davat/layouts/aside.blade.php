@section('aside')
    <aside id="aside" class="bg-gray-50 border-l border-gray-200 overflow-y-auto">
        <h1 class="text-2xl font-extrabold text-blue-500 py-6 px-3">
            <a href="/" target="_blank">{{ __('App Title') }}</a>
        </h1>
        <ul class="px-3">
            <li class="mb-1">
                <a href="{{ route('dashboard.home') }}" class="flex justify-between items-center h-12 px-6 rounded text-gray-900 hover:bg-gray-200 transition">
                    <div class="flex items-center">
                        <i class="fal fa-tachometer-alt-fastest ml-2"></i>
                        <span class="font-light">{{ __('Dashboard') }}</span>
                    </div>
                </a>
            </li>

            @isset($layouts->asideMenu)
                @include($layouts->asideMenu)
            @endisset
        </ul>
    </aside>

    @if (false)
        @if (config('app.debug'))
            <div class="absolute right-0 bottom-0 text-xs">
                {{ Carbon\Carbon::createFromTimestamp(session()->get('User_cacheed_at'))->format('H:i:s') }}
            </div>
        @endif
    @endif
@endsection