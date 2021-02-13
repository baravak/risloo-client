@extends($layouts->dashboard)

@section('content')
    <div class="border border-gray-200 rounded-sm overflow-hidden">
        <div class="h-24 sm:h-44 bg-gradient-to-b from-gray-200 to-gray-50 border-b border-gray-200"></div>
        <div class="relative p-4">
            @if (false)
                <div class="absolute top-3 left-3 flex">
                    <button class="flex justify-center items-center flex-shrink-0 border border-green-700 text-green-700 px-4 rounded-full ml-2 text-sm leading-normal hover:bg-green-50 transition-all">
                        <i class="fal fa-plus ml-2"></i>
                        <span class="font-medium">افزودن</span>
                    </button>
                    <button class="flex justify-center items-center flex-shrink-0 border border-gray-400 text-gray-500 w-9 h-9 rounded-full hover:bg-gray-50 transition-all">
                        <i class="fal fa-ellipsis-v text-xl"></i>
                    </button>
                </div>
            @endif

            <div class="flex justify-center items-center flex-shrink-0 w-24 h-24 md:w-32 md:h-32 -mt-16 md:-mt-20 bg-gray-300 text-gray-600 text-2xl rounded-full border-4 border-white overflow-hidden mb-4 relative">@avatarOrName($center->detail)</div>

            <h2 class="font-bold text-lg text-gray-900 cursor-default">@displayName($center->detail)</h2>

            @isset ($center->detail->description)
                <div class="text-sm text-gray-700 mt-1 cursor-default">{{ $center->detail->description }}</div>
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

    <div class="flex items-center mt-8 mb-4 cursor-default">
        <span class="w-8 border-t border-gray-200 inline-block ml-3"></span>
        <h3 class="font-bold text-gray-800">{{ __('Rooms') }}</h3>
    </div>

    @include($rooms->count() ? 'dashboard.rooms.items' : 'dashboard.centers.emptyRoom')
@endsection