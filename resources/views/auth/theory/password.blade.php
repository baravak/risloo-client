@section('auth-form')
    <form action="" method="POST" data-form-page="auth" class="active">
            <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" value="{{app('request')->authorized_key}}" placeholder="{{__('Enter Password')}}">
            </div>

            <button class="btn btn-dark btn-block btn-login mb-3">{{__('Submit')}}</button>

            <div class="d-flex justify-content-center">
                <a href="{{route('auth.recovery')}}" class="text-light text-decoration-none fs-14">{{__('Forgot Password')}}</a>
                <span class="px-2 text-white">|</span>
                <a href="{{route('register')}}" class="text-light text-decoration-none font-weight-bold fs-14">{{__('Register')}}</a>
            </div>
        </form>
    </div>
@endsection
@extends(app('request')->ajax() ? 'auth.xhr' : 'auth.app')
