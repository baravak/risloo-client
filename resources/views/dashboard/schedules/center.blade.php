@extends($layouts->dashboard)
@section('content')
    @include('dashboard.schedules.navigation')
    <div data-page="dashboard-schedules" class="border border-gray-300 rounded mt-4">
        <ul data-tabs class="space-x-4 space-x-reverse p-4 overflow-x-auto">
            @foreach ($weeks as $key => $day)
                <li class="relative">
                    <a href="#{{ $key }}" {{ $day->format('Ymd') == date('Ymd') || ($weeks->sat->timestamp > time() && $key == 'sat') ? 'data-tabby-default': ''}} class="direct focus {{ $day->format('Ymd') < date('Ymd') ? 'disable' : '' }}">
                        <span class="text-sm variable-font-medium">@time($day, '%A')</span>
                        <span class="text-xs">@time($day, 'Y/m/d')</span>
                    </a>
                    @if ($schedules->where('started_at', '>=', $day)->where('status', 'session_awaiting')->where('started_at', '<=', (clone $day)->endOfDay())->count())
                        <span class="absolute top-2 left-2 rounded-full h-1 w-1 bg-brand"></span>
                    @elseif($schedules->where('started_at', '>=', $day)->where('started_at', '<=', (clone $day)->endOfDay())->count())
                        <span class="absolute top-2 left-2 rounded-full h-1 w-1 bg-gray-400"></span>
                    @endif
                </li>
            @endforeach
        </ul>
        <div>
            @foreach ($weeks as $key => $day)
            <div id="{{ $key }}">
                @if (!$schedules->where('started_at', '>=', $day)->where('started_at', '<=', (clone $day)->endOfDay())->count())
                    <div class="text-sm text-center text-gray-400 pb-8 pt-14">برنامه درمانی‌ای برای این روز در دسترس نیست.</div>
                @endif
                @include('dashboard.schedules.items')
            </div>
            @endforeach
        </div>
    </div>
@endsection
