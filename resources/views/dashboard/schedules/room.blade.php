@extends($layouts->dashboard)
@section('content')
    {{-- <div class="flex items-center justify-between border border-gray-300 rounded py-6 px-4">
        <div class="text-gray-500 cursor-default">هیچ برنامه درمانی‌ای تعریف نشده است.</div>
        <div>
            <a href="#" target="_blank" class="px-4 py-2 text-sm text-green-600 hover:text-white border border-green-600 hover:bg-green-600 rounded-full transition">تعریف برنامه درمانی</a>
        </div>
    </div> --}}
    {{-- <div class="flex items-center justify-center border border-gray-300 rounded py-6 px-4">
        <div class="text-gray-500 cursor-default">هیچ برنامه درمانی‌ای تعریف نشده است.</div>
    </div> --}}
    @include('dashboard.schedules.navigation')
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-4 mt-4">
        @can('create', [App\TherapyCase::class, $room])
            <a href="{{ route('dashboard.room.schedules.create', $room->id) }}" class="flex flex-col items-center justify-center text-gray-400 hover:text-green-600 border border-gray-300 hover:border-green-600 transition rounded py-8 focus-current ring-green-600">
                <i class="fal fa-plus text-xl mb-4"></i>
                <span>@lang('Define new schedule')</span>
            </a>
        @endcan
        @foreach ($schedules as $schedule)
        <a href="{{ $schedule->status == 'registration_awaiting' ? route('dashboard.schedules.show', $schedule->id) : route('dashboard.sessions.show', $schedule->id) }}" class=" flex flex-col justify-between border border-gray-300 hover:border-brand transition rounded focus">
            <div>
                <div class="text-gray-700 text-sm variable-font-semibold text-center border-b border-gray-300 p-2"><span>@time($schedule->started_at, 'Y-m-d - ساعت H:i')</span></div>
                <div class="p-3">
                    <div class="flex items-center mb-4">
                        <div href="#" class="flex justify-center items-center flex-shrink-0 w-7 h-7 bg-gray-300 text-gray-600 text-xs rounded-full overflow-hidden">
                            @avatarOrName($schedule->room->manager)
                        </div>
                        <div class="text-xs variable-font-medium text-gray-600 mr-2">
                            <span>@displayName($schedule->room->manager)</span>
                        </div>
                    </div>
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

                    <div class="mt-4">
                        <span class="block text-xs variable-font-medium text-gray-600 mb-2">محورهای جلسه</span>
                        <div class="bg-gray-100 p-2 rounded max-h-16 overflow-y-auto leading-snug">
                            <div class="inline text-xs text-gray-500">
                                @foreach ($schedule->fields as $field)
                                    <span title="@lang('amount :amount Toman', ['amount' => $field->amount])">{{ $field->title }}</span>
                                    @if (!$loop->last)
                                        <span class="mx-1">|</span>
                                    @endif
                                @endforeach
                            </div>
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
@endsection
