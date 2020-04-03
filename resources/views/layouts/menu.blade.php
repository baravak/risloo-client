@section('default-menu')
@if (auth()->user()->type == 'counseling_center')
    <li class="nav-item">
        <a class="nav-link text-truncate" href="{{route('dashboard.users.me')}}">
            <span class="d-sm-inline">{{__('Counseling center profile')}}</span>
        </a>
    </li>
@endif
@parent
    @can('dashboard.assessments.viewAny')
        <li class="nav-item">
            <a class="nav-link text-truncate" href="{{route('dashboard.assessments.index')}}">
                <span class="d-sm-inline">{{__('Assessments')}}</span>
            </a>
        </li>
    @endcan
    <li class="nav-item">
        <a class="nav-link text-truncate" href="{{route('dashboard.samples.index')}}">
            <span class="d-sm-inline">{{__('Samples')}}</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-truncate" href="{{route('dashboard.relationships.index')}}">
            <span class="d-sm-inline">{{__('Relationships')}}</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-truncate" href="{{route('dashboard.clinics.index')}}">
            <span class="d-sm-inline">{{__('Clinics and Psychologists')}}</span>
        </a>
    </li>

@endsection
@include('layouts.default-menu')
