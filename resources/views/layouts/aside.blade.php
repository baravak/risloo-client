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
            @if (app('request')->user()->isAdmin())
                <li class="nav-item">
                    <a class="nav-link text-truncate" href="{{route('dashboard.users.index')}}">
                        <span class="d-sm-inline">{{__('Users')}}</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed text-truncate direct" href="#documents-nav" data-toggle="collapse"
                        data-target="#documents-nav">
                        <span class="d-sm-inline">{{__('Documents')}}</span>
                    </a>
                    <div class="collapse" id="documents-nav" aria-expanded="false">
                        <ul class="flex-column nav p-0">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('dashboard.documents.index')}}">
                                    <span>{{__('View')}}</span>
                                </a>
                                <a class="nav-link" href="#">
                                    <span>{{__('Reserve')}}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link text-truncate" href="{{route('dashboard.terms.index')}}">
                    <span class="d-sm-inline">{{__('Terms')}}</span>
                </a>
            </li>
            <li class="nav-item">
                    <a class="nav-link collapsed text-truncate direct" href="#assessments-nav" data-toggle="collapse"
                        data-target="#assessments-nav">
                        <span class="d-sm-inline">{{__('Assessments')}}</span>
                    </a>
                    <div class="collapse" id="assessments-nav" aria-expanded="false">
                        <ul class="flex-column nav p-0">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('dashboard.assessments.index')}}">
                                    <span>{{__('View')}}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
        </ul>
    </aside>
@endsection
