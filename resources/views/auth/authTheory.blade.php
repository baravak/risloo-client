@section('auth-form')
    <form action="" method="POST" data-form-page="password">
            <div class="form-group">
                <input type="text" class="form-control" disabled id="name" value="{{app('request')->cookie('login_name')}}">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" disabled id="username" value="{{app('request')->cookie('login_username')}}">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="{{__('Password')}}">
            </div>

            <button class="btn btn-dark btn-block btn-login mb-3">{{__('Login')}}</button>

            <div class="d-flex justify-content-center">
                <a href="{{route('auth.recovery')}}" class="text-light text-decoration-none fs-14">{{__('Forgot Password')}}</a>
                <span class="px-2 text-white">|</span>
                <a href="{{route('register')}}" class="text-light text-decoration-none font-weight-bold fs-14">{{__('Register')}}</a>
            </div>
        </form>
    </div>
@endsection
@extends(app('request')->ajax() ? 'auth.xhr' : 'auth.app')
