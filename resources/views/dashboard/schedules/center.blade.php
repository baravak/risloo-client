@extends($layouts->dashboard)
@php
    $borders = [
        'draft' => 'gray',
        'registration_awaiting' => 'yellow',
        'client_awaiting' => 'yellow',
        'awaiting' => 'yellow',
        'session_awaiting' => 'brand',
        'in_session' => 'green',
        'finished' => 'purple',
        'canceled_by_client' => 'red',
        'canceled_by_center' => 'red',
    ];
@endphp
@section('content')
<span style="display: none" class="text-gray-400 text-yellow-400 text-brand-400 text-green-400 text-purple-400 text-red-400"></span>
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
                        <span class="text-brand-400 absolute" style="font-size:8px;right: 5px; bottom: 5px">⬤</span>
                    @elseif($schedules->where('started_at', '>=', $day)->where('started_at', '<=', (clone $day)->endOfDay())->count())
                        <span class="text-gray-400 absolute" style="font-size:8px;right: 5px; bottom: 5px">⬤</span>
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
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-4 p-4">
                    @foreach ($schedules->where('started_at', '>=', $day)->where('started_at', '<=', (clone $day)->endOfDay()) as $schedule)
                    <a href="{{ $schedule->status == 'registration_awaiting' ? route('dashboard.schedules.show', $schedule->id) : route('dashboard.sessions.show', $schedule->id) }}" class=" flex flex-col justify-between border border-gray-300 hover:border-brand transition rounded focus">
                        <div>
                            <div class="text-gray-700 text-sm variable-font-semibold text-center border-b border-gray-300 p-2">
                                <span class="text-xs text-{{ isset($borders[$schedule->status]) ? $borders[$schedule->status] : 'gray' }}-400" style="float: right">⬤</span>
                                <span>ساعت {{ $schedule->started_at->format('H:i') }}</span>
                            </div>
                            <div class="p-3">
                                @if (!isset($RoomMode))
                                    <div class="flex items-center mb-4">
                                        <div href="#" class="flex justify-center items-center flex-shrink-0 w-7 h-7 bg-gray-300 text-gray-600 text-xs rounded-full overflow-hidden">
                                            @avatarOrName($schedule->room->manager)
                                        </div>
                                        <div class="text-xs variable-font-medium text-gray-600 mr-2">
                                            <span>@displayName($schedule->room->manager)</span>
                                        </div>
                                    </div>
                                @endif
                                @if ($schedule->case)
                                    <div class="flex items-center text-xs text-gray-500">
                                        <i class="fal fa-folder ml-2"></i>
                                        <span>@lang('Therapy case :serial', ['serial' => $schedule->case->id])</span>
                                    </div>
                                @endif
                                <div class="flex items-center text-xs text-gray-500 mt-2">
                                    <i class="fal fa-clock ml-2"></i>
                                    <span>@lang(':time minute(s)', ['time' => $schedule->duration])</span>
                                </div>
                                @if ($schedule->clients_number > 1)
                                    <div class="flex items-center text-xs text-gray-500 mt-2">
                                        <i class="fal fa-user-friends ml-2"></i>
                                        <span>{{ $schedule->clients_number }}</span>
                                    </div>
                                @endif

                                @if ($schedule->clients)
                                    <div class="mt-4">
                                        <span class="inline text-xs variable-font-medium text-gray-600 mb-2">مراجعین:</span>
                                            <div class="inline text-xs text-gray-500">
                                                @foreach ($schedule->clients as $client)
                                                    <span>{{ $client->name }}</span>
                                                    @if (!$loop->last)
                                                        <span class="mx-1">|</span>
                                                    @endif
                                                @endforeach
                                        </div>
                                    </div>
                                @endif
                                <div class="mt-4">
                                    <span class="block text-xs variable-font-medium text-gray-600 mb-2">محورهای جلسه</span>
                                    <div class="bg-gray-100 p-2 rounded max-h-16 overflow-y-auto leading-snug">
                                        <div class="inline text-xs text-gray-500">
                                            @foreach ($schedule->clients && $schedule->clients->count() ? $schedule->clients->pluck('field')->unique() : $schedule->fields as $field)
                                                <span title="@lang('amount :amount Toman', ['amount' => isset($field->amount) ? $field->amount : 0])">{{ $field->title }}</span>
                                                @if (!$loop->last)
                                                    <span class="mx-1">|</span>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <span class="text-xs variable-font-medium text-gray-600 mb-2">مکان‌های برگزاری جلسه:</span>
                                        <div class="inline text-xs text-gray-500">
                                            @foreach ($schedule->clients && $schedule->clients->count() ? $schedule->clients->pluck('session_platform')->unique() : ($schedule->session_platforms ?: []) as $platform)
                                                <span >{{ isset($platform->title) ? $platform->title : '' }}</span>
                                                @if (!$loop->last)
                                                    <span class="mx-1">|</span>
                                                @endif
                                            @endforeach
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-between items-center text-xs text-gray-500 px-3 pt-1 pb-3">
                            <span>@lang($schedule->group_session ? 'Group session' : '')</span>
                            <span>@lang(ucfirst($schedule->status))</span>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
