@section('aside')
    <aside id="aside">
        <div class="aside-brand d-flex justify-content-center align-items-center px-3">
            <h1 class="mb-0">
                <a href="/" class="text-white text-decoration-none" target="_blank">{{__('App Title')}}</a>
            </h1>
        </div>

        <ul class="nav aside-nav flex-column flex-nowrap overflow-hidden p-0">
            <li class="nav-item">
                <a class="nav-link text-truncate" href="{{route('dashboard')}}">
                    <span class="d-sm-inline">{{__('Dashboard')}}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-truncate" href="{{route('dashboard.users.index')}}">
                    <span class="d-sm-inline">{{__('Users')}}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed text-truncate direct" href="#submenu1" data-toggle="collapse"
                    data-target="#submenu1">
                    <span class="d-sm-inline">Reports</span>
                </a>
                <div class="collapse" id="submenu1" aria-expanded="false">
                    <ul class="flex-column nav p-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span>Orders</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </aside>
@endsection
