@extends($layouts->dashboard)

@section('content')
    <div class="border border-gray-200 rounded-sm overflow-hidden">
        <div class="h-20 sm:h-28 bg-gradient-to-b from-blue-100 to-blue-50 border-b border-gray-200"></div>
        <div class="relative p-4">
                <div class="absolute top-3 left-3 flex">
                    @can('update', [$user])
                        <a href="{{ $user->route('edit') }}" class="flex justify-center items-center flex-shrink-0 border border-gray-500 text-gray-600 hover:bg-gray-50 px-4 h-9 rounded-full text-sm leading-normal transition-all">
                            <span class="font-medium">{{ __('Edit') }}</span>
                        </a>
                    @endcan
                    @can('admin', App\User::class)
                        <a href="{{ route('auth.as', ['user' => $user->id]) }}"  data-lijax="click" data-method="POST" class="flex justify-center items-center flex-shrink-0 border border-gray-500 text-gray-600 hover:bg-gray-50 w-9 sm:w-auto px-4 h-9 rounded-full text-sm leading-normal transition-all mr-2">
                            <i class="fal fa-user-cog"></i>
                            <span class="font-medium mr-2 hidden sm:inline">{{ __('Login to this...') }}</span>
                        </a>
                    @endcan
                </div>
            <div class="flex justify-center items-center flex-shrink-0 w-24 h-24 md:w-32 md:h-32 -mt-16 md:-mt-20 bg-gray-300 text-gray-600 text-2xl rounded-full border-4 border-white overflow-hidden mb-4 relative">@avatarOrName($user)</div>

            <h2 class="font-bold text-lg text-gray-900 cursor-default">{{ $user->name ?: __('Anonymouse') }}</h2>

            <span class="block dir-ltr text-right text-sm text-gray-600 mt-1 cursor-default">{{ $user->username }}</span>

            <div class="flex flex-wrap items-center mt-2">
                {{-- <div class="inline-flex items-center text-gray-500 mb-2 sm:mb-0 ml-6 cursor-default">
                    <i class="fal fa-graduation-cap mb-2 ml-2"></i>
                    <span class="text-sm">دکترای روانشناسی بالینی</span>
                </div> --}}
                {{-- <div class="inline-flex items-center text-gray-500 mb-2 sm:mb-0 ml-6 cursor-default">
                    <i class="fal fa-calendar-alt mb-2 ml-2"></i>
                    <span class="text-sm">۲۰ آذر ۱۳۶۰</span>
                </div> --}}
                <div class="inline-flex items-center text-gray-500 mb-2 sm:mb-0 ml-6">
                    <i class="fal fa-envelope mb-2 ml-2"></i>
                    <a href="mailto:{{ $user->email }}" class="block dir-ltr text-right text-sm hover:text-blue-500 direct">{{ $user->email }}</a>
                </div>
                <div class="inline-flex items-center text-gray-500 mb-2 sm:mb-0 ml-6">
                    <i class="fal fa-phone mb-2 ml-2"></i>
                    <a href="tel:+{{ $user->mobile }}" class="block dir-ltr text-right text-sm hover:text-blue-500 direct">+{{ $user->mobile }}</a>
                </div>
            </div>
        </div>
    </div>

    {{-- @include($documents->count() ? 'dashboard.users.profiles.documents' : '') --}}

@endsection
