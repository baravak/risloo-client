@section('auth-form')
    <form action="" method="POST" data-form-page="auth" class="active">
            <div class="form-group">
                <input type="text" class="form-control" id="code" name="code" placeholder="{{__('Enter mobile code')}}">
            </div>

            <button class="btn btn-dark btn-block btn-login mb-3">{{__('Submit')}}</button>

            <div class="d-flex justify-content-center">
                <a href="{{route('auth')}}" class="text-light text-decoration-none fs-14 font-weight-bold">{{__('Login')}}</a>
                <span class="px-2 text-white">|</span>
                <a href="{{route('register')}}" class="text-light text-decoration-none fs-14">{{__('Register')}}</a>
            </div>
        </form>
    </div>
@endsection
@extends(app('request')->ajax() ? 'auth.xhr' : 'auth.app')
