@extends($layouts->dashboard)

@section('content')
    <div class="border border-gray-200 rounded-sm overflow-hidden">
        <div class="h-24 sm:h-44 bg-gradient-to-b from-blue-100 to-white border-b border-gray-200"></div>
        <div class="relative p-4">
            @include('dashboard.centers.showButtons')

            <div class="flex justify-center items-center flex-shrink-0 w-24 h-24 md:w-32 md:h-32 -mt-16 md:-mt-20 bg-gray-300 text-gray-600 text-2xl rounded-full border-4 border-white overflow-hidden mb-4 relative">@avatarOrName($center->detail)</div>

            <h2 class="font-bold text-lg text-gray-900 cursor-default">@displayName($center->detail)</h2>

            @if ($center->type == 'counseling_center')
                <div class="text-sm text-gray-700 mt-1 cursor-default">
                    <i class="fal fa-user-crown"></i>
                    <span class="mr-1">{{ $center->manager->name }}</span>
                </div>
            @endif

            @isset ($center->detail->description)
                <div class="text-sm font-light text-gray-500 mt-1 cursor-default">{{ $center->detail->description }}</div>
            @endisset

            @isset ($center->detail->phone_numbers)
                <div class="flex flex-wrap text-gray-700 text-xs mt-2">
                    @foreach ($center->detail->phone_numbers ?: [] as $number)
                        <a href="tel:{{ $number }}" class="font-medium ml-3 direct">
                            <i class="fal fa-phone-alt text-sm leading-normal ml-1"></i>
                            <span class="inline-flex text-left dir-ltr">{{ $number }}</span>
                        </a>
                    @endforeach
                </div>
            @endisset
        </div>
    </div>

    {{-- @include('dashboard.centers.myRooms') --}}

    <div class="mb-4 mt-8">
        <h3 class="flex items-center font-bold text-gray-700 cursor-default">
            <span class="w-8 border-t border-gray-200 inline-block ml-3"></span>
            <span>{{ __('Rooms') }}</span>
            <span class="text-xs text-gray-600 font-light mr-2" data-xhr="total">({{ $rooms->total() }})</span>
        </h3>
    </div>

    <div class="flex justify-between items-center flex-wrap mb-4">
        @include('layouts.quick_search')
        @can('create', [App\Room::class, $center])
            <a href="{{ route('dashboard.center.rooms.create', ['center' => $center->id]) }}" class="flex items-center justify-center flex-shrink-0 w-10 sm:w-auto h-9 sm:px-4 text-sm text-green-700 border border-green-700 rounded-full hover:bg-green-50 transition mr-4" title="{{ __('Create new room') }}">
                <i class="fal fa-plus sm:ml-2"></i>
                <span class="hidden sm:inline">{{ __('Create new room') }}</span>
            </a>
        @endcan
    </div>

    @include('dashboard.centers.rooms')
@endsection
