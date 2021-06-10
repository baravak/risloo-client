@extends($layouts->dashboard)
@section('content')
    {{-- <h2 class="text-gray-700 variable-font-bold mb-4">@lang('Welcome to risloo')</h2>
    @include('dashboard.home.client') --}}
    @if ($user->dalily_schedule_exports)
        <div class="flex justify-between items-center mt-8 mb-4">
            @foreach ($user->dalily_schedule_exports as $key => $item)
                <a href="{{ $item->png }}" target="_blank">@lang('Download :item schedule export', ['item' => __($key)])</a>
            @endforeach
        </div>
    @endif

    @include('dashboard.home.cases')
    @include('dashboard.home.samples')
    @include('dashboard.home.rooms')
    @include('dashboard.home.centers')
@endsection
