@extends($layouts->dashboard)
@section('content')

<h2 class="text-gray-700 variable-font-bold mb-4">@lang('Welcome to risloo')</h2>
@include('dashboard.home.alerts')
@if ($user->dalily_schedule_exports)
    @include('dashboard.home.schedules')
@endif

@if (config('app.env') == 'local')
    {{-- @include('dashboard.home.summary') --}}
@endif
@endsection
