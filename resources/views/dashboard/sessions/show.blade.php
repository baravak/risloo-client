@extends($layouts->dashboard)
@section('content')

    @include ('dashboard.sessions.sessionDetails')

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-8">

        @include ('dashboard.sessions.report')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            @include('dashboard.sessions.therapists')
            @include('dashboard.sessions.clients')

        </div>
    </div>

    @include('dashboard.sessions.practices')
    @include('dashboard.sessions.samples')
@endsection
