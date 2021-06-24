@extends($layouts->dashboard)
@section('content')

<h2 class="text-gray-700 variable-font-bold mb-4">@lang('Welcome to risloo')</h2>
@if (config('app.env') == 'local')
    @include('dashboard.home.alerts')
    @include('dashboard.home.summary')
@endif
@if ($user->dalily_schedule_exports)
    @include('dashboard.home.schedules')
@endif
@endsection
