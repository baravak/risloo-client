@extends($layouts->dashboard)
@section('content')
    @include('dashboard.sessions.newSessionDetails')
    @include('dashboard.sessions.createUserForm')
@endsection
