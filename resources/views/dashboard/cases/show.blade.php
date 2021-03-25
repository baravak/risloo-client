@extends($layouts->dashboard)

@section('content')
    @include('dashboard.cases.problem')

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-8">

        @include('dashboard.cases.therapists')

        @include('dashboard.cases.clients')

    </div>

    @include('dashboard.cases.sessions')

    @include('dashboard.cases.samples')
@endsection