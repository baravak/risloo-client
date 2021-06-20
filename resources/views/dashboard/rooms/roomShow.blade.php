@extends($layouts->dashboard)

@section('content')
    <div class="border border-gray-200 rounded-sm">
        <div class="h-20 sm:h-28 bg-gradient-to-b from-blue-100 to-blue-50 border-b border-gray-200"></div>
        <div class="relative p-4">
            @if ($room->type == 'personal_clinic')
                {{-- @include('dashboard.centers.showButtons', ['center' => $center]) --}}
                @isset ($center->detail->description)
                    <div class="text-sm font-light text-gray-500 mt-1 cursor-default">{{ $center->detail->description }}</div>
                @endisset
            @else
                <div class="absolute top-3 left-3 flex items-center dir-ltr">
                    @can('viewAny', [App\RoomUser::class, $room])
                        <div class="relative dropdown">
                            <button type="button" class="flex items-center justify-center border border-gray-300 rounded-full h-9 w-9 hover:bg-gray-100 transition text-2xl text-gray-400 focus mr-2 dropdown-toggle">
                                <i class="fal fa-ellipsis-v"></i>
                            </button>
                            <div class="rounded bg-white border border-gray-200 mt-2 shadow-md dropdown-menu min-w-max absolute left-0">
                                <a href="{{ route($room->type == 'personal_clinic' ? 'dashboard.center.users.index' : 'dashboard.room.users.index', $room->id) }}" title="{{ __('Users') }}" class="flex items-center text-sm text-gray-700 py-3 px-4 hover:bg-gray-100 border-b border-gray-100 transition dir-rtl">
                                    <i class="w-6 text-center fal fa-users pb-1"></i>
                                    <span class="vaiable-font-medium mr-2">@lang('Users')</span>
                                </a>
                                <a href="{{ route('dashboard.room.setting.session-platforms', $room->id) }}" class="flex items-center text-sm text-gray-700 py-3 px-4 hover:bg-gray-100 border-b border-gray-100 transition dir-rtl">
                                    <i class="w-6 text-center fal fa-cog pb-1"></i>
                                    <span class="vaiable-font-medium mr-2">@lang('Settings')</span>
                                </a>
                            </div>
                        </div>
                    @endcan
                    <a href="{{ route('dashboard.room.schedules.index', $room->id) }}" class="flex justify-center items-center flex-shrink-0 border border-brand text-brand hover:bg-blue-50 px-4 h-9 rounded-full text-sm leading-normal transition">
                        <span class="font-medium">{{ __('Therapy Schedules') }}</span>
                    </a>
                </div>
            @endif
            <div class="flex justify-center items-center flex-shrink-0 w-24 h-24 md:w-32 md:h-32 -mt-16 md:-mt-20 bg-gray-300 text-gray-600 text-2xl rounded-full border-4 border-white overflow-hidden mb-4 relative">@avatarOrName($room->manager)</div>
            <h2 class="font-bold text-lg text-gray-900 cursor-default">@displayName($room->manager)</h2>
        </div>
    </div>
    @include('dashboard.rooms.caseShow')
@endsection
