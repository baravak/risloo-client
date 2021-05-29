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
                <div class="flex flex-wrap text-gray-700 text-xs mt-1">
                    @foreach ($center->detail->phone_numbers ?: [] as $number)
                        <a href="tel:{{ $number }}" class="font-medium ml-3 direct">
                            <i class="fal fa-phone-alt text-sm leading-normal ml-1"></i>
                            <span class="inline-flex text-left dir-ltr">{{ $number }}</span>
                        </a>
                    @endforeach
                </div>
            @endisset

            {{-- <div class="flex items-center text-xs mt-2">
                <span class="text-yellow-500">{{ __('Awaiting for acceptation') }}</span>
                <span class="text-red-500">{{ __('Kicked') }}</span>
                <span class="text-gray-500">{{ __('You are is :position of this cenetr', ['position' => __(ucfirst($center->acceptation->position))]) }}</span>
            </div> --}}
        </div>
    </div>
    @yield('relationship-detail')
@endsection
