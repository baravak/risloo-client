<header id="header" class="bg-white px-3 d-flex justify-content-between">
    <div class="d-flex align-items-center">
        <button id="aside-btn" class="btn btn-light d-lg-none">
            <i class="far fa-bars align-middle"></i>
        </button>
    </div>
    <div class="d-flex align-items-center">
        <div class="profile-div {{app('request')->user()->response('current') ? 'profile-div-danger' : ''}}">
            <div class="pulse">
                <img src="dist/images/avatar/avatar.jpg" alt="Avatar" class="profile rounded-circle" width="32" height="32">
                <!-- <span class="profile profile-placeholder d-flex justify-content-center align-items-center">S</span> -->
            </div>
            <div class="profile-dropdown shadow">
                <div class="profile-dropdown-header p-3 d-flex flex-column align-items-center">
                    <a href="#" class="text-white text-decoration-none fs-14">{{app('request')->user()->name ?: app('request')->user()->id}}</a>
                    @if (app('request')->user()->response('current'))
                        <a href="#" class="text-white text-decoration-none fs-14">{{app('request')->user()->response('current')->name ?: app('request')->user()->response('current')->id}}</a>
                    @endif
                </div>
                <div class="profile-dropdown-body p-3">
                    @if (app('request')->user()->response('current'))
                        <a href="{{route('logout')}}" data-lijax='click' data-method='post' class="btn btn-primary direct">{{__('Logout')}}</a>
                        <a href="{{route('login.to')}}" data-lijax='click' data-method='post' class="btn btn-primary direct">{{__('Admin')}}</a>
                    @else
                        <a href="{{route('logout')}}" data-lijax='click' data-method='post' class="btn btn-primary btn-block direct">{{__('Logout')}}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>
