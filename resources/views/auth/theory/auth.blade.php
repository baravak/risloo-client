@section('auth-form')
    {{$message}}
@endsection
@extends(app('request')->ajax() ? 'auth.xhr' : 'auth.app')
