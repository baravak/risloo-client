@extends($layouts->dashboard)
@section('content')
<h2 class="text-gray-700 variable-font-bold mb-4">@lang('Welcome to risloo')</h2>
@include('dashboard.home.alerts')
@if ($user->rooms && $user->rooms->where('acceptation.position', 'manager')->count())
    @include('dashboard.home.schedules')
    <h3 class="text-gray-700 variable-font-bold mb-4 mt-8">@lang('Therapy rooms')</h3>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 2xl:grid-cols-6 gap-4 mt-4">
        @foreach ($user->rooms->where('acceptation.position', 'manager') as $room)
            <div>
                <a href="{{ route('dashboard.rooms.show', $room->id)  }}" class="flex items-center justify-between border border-gray-600 rounded p-4 group hover:bg-gray-600 transition">
                    <i class="fal fa-door-open text-3xl text-gray-600 group-hover:text-white"></i>
                    <div class="flex flex-col justify-center text-left relative top-1">
                        <span class="text-xs text-gray-600 group-hover:text-white">@center($room->center)</span>
                        {{-- <span class="text-xl text-gray-600 variable-font-semibold group-hover:text-white">5</span> --}}
                    </div>
                </a>
                <a href="{{ route('dashboard.room.schedules.index', $room->id) }}" class="flex items-center justify-center border border-gray-600 border-dashed rounded text-gray-600 p-2 mt-2 hover:bg-gray-50 transition">
                    <span class="text-sm">برنامه درمانی هفتگی</span>
                </a>
            </div>
        @endforeach
    </div>
@endif



@if (config('app.env') == 'local')
    {{-- @include('dashboard.home.summary') --}}
@endif
@endsection
