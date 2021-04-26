@extends($layouts->dashboard)
@section('content')

    {{-- @include ('dashboard.sessions.sessionDetails') --}}
    @include ('dashboard.sessions.newSessionDetails')

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-8">
        @include ('dashboard.sessions.report')
        @include('dashboard.sessions.therapists')
    </div>

    @include('dashboard.sessions.users')
    @isset($case)
        @include('dashboard.sessions.practices')
        @include('dashboard.sessions.samples')
    @endisset
    @include('dashboard.sessions.transactions')
@endsection
