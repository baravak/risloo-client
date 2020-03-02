@section('auth-form')
    <form action="" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" id="mobile" name="mobile" value="{{app('request')->mobile}}">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="{{__('Password')}}">
            </div>

            <button class="btn btn-dark btn-block btn-login mb-3">{{__('Register')}}</button>

            <div class="d-flex justify-content-center">
                <a href="{{route('login.recovery')}}" class="text-light text-decoration-none fs-14">{{__('Forgot Password')}}</a>
                <span class="px-2 text-white">|</span>
                <a href="{{route('login')}}" class="text-light text-decoration-none font-weight-bold fs-14">{{__('Login')}}</a>
                <span class="px-2 text-white">|</span>
                <a href="{{route('login')}}" class="text-light text-decoration-none font-weight-bold fs-14">{{('validation.required')}}</a>
            </div>
        </form>
    </div>
@endsection
@extends(app('request')->ajax() ? 'auth.xhr' : 'auth.app')
