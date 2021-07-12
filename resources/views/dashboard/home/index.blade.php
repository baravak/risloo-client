@extends($layouts->dashboard)
@section('content')
<h2 class="text-gray-500 variable-font-semibold text-sm mb-4">@lang('Welcome to risloo')</h2>
@include('dashboard.home.alerts')
@if ($user->rooms && $user->rooms->where('acceptation.position', 'manager')->count())
    @include('dashboard.home.schedules')
    @include('dashboard.home.newMyRooms')
@endif

@if (config('app.env') == 'local')
    {{-- @include('dashboard.home.summary') --}}
@endif
@endsection
