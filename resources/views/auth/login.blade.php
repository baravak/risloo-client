@section('auth-form')
    <form action="{{route('login')}}" method="POST" data-form-page="login" class="active">
            <div class="form-group">
                <input type="text" class="form-control" id="username" name="username" value="{{app('request')->username}}" placeholder="{{__('Phone, Email or Username')}}">
            </div>

            <button class="btn btn-dark btn-block btn-login mb-3">{{__('Enter')}}</button>

            <div class="d-flex justify-content-center">
                <a href="{{route('login.recovery')}}" class="text-light text-decoration-none fs-14">{{__('Forgot Password')}}</a>
                <span class="px-2 text-white">|</span>
                <a href="{{route('register')}}" class="text-light text-decoration-none font-weight-bold fs-14">{{__('Register')}}</a>
            </div>
        </form>
    </div>
@endsection
@extends(app('request')->ajax() ? 'auth.xhr' : 'auth.app')
