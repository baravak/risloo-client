@section('default-menu')
@parent
    <li class="nav-item">
        <a class="nav-link text-truncate" href="{{route('dashboard.assessments.index')}}">
            <span class="d-sm-inline">{{__('Assessments')}}</span>
        </a>
    </li>
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

@endsection
@include('layouts.default-menu')
