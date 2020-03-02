<header id="header" class="bg-white px-3 d-flex justify-content-between">
    <div class="d-flex align-items-center">
        <button id="aside-btn" class="btn btn-light d-lg-none">
            <i class="far fa-bars align-middle"></i>
        </button>
    </div>
    <div class="d-flex align-items-center">
        <div class="profile-div">
            <img src="dist/images/avatar/avatar.jpg" alt="Avatar" class="profile rounded-circle" width="32" height="32">
            <!-- <span class="profile profile-placeholder d-flex justify-content-center align-items-center">S</span> -->
            <div class="profile-dropdown shadow">
                <div class="profile-dropdown-header p-3 d-flex align-items-center">
                    <a href="#" class="text-white text-decoration-none fs-14">Username</a>
                </div>
                <div class="profile-dropdown-body p-3">
                    <a href="{{route('logout')}}" data-lijax='click' data-method='post' class="btn btn-primary btn-block direct">Logout</a>
                </div>
            </div>
        </div>
    </div>
</header>
