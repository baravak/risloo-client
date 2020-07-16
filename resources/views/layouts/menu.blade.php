@section('default-menu')
@if (auth()->user()->type == 'counseling_center')
    <li class="nav-item">
        <a class="nav-link text-truncate" href="{{route('dashboard.users.me')}}">
            <span class="d-sm-inline">{{auth()->user()->name}}</span>
        </a>
    </li>
@elseif (auth()->user()->type == 'psychologist')
    <li class="nav-item">
        <a class="nav-link text-truncate" href="{{route('dashboard.users.me')}}">
            <span class="d-sm-inline">{{__('My clinic')}}</span>
        </a>
    </li>
@endif

@if (auth()->user()->centers)
    @php
    $authCenters = clone auth()->user()->centers;
    foreach ($authCenters as $key => $value) {
        if($value->owner->id == auth()->id())
        {
            $authCenters->forget($key);
        }
    }
    @endphp
    @if ($authCenters->count())
        @if ($authCenters->where('type' , 'counseling_center')->count() == 1)
            <li class="nav-item">
                <a class="nav-link text-truncate" href="{{route('dashboard.users.show', $authCenters->where('type' , 'counseling_center')->first()->owner->id)}}">
                    <span class="d-sm-inline">{{$authCenters->where('type' , 'counseling_center')->first()->owner->name}}</span>
                </a>
            </li>
        @elseif ($authCenters->where('type' , 'counseling_center')->count() < 4)
            <li class="nav-item">
                <a class="nav-link text-truncate direct" href="{{route('dashboard.home')}}#my-therapy-centers-menu" data-toggle="collapse" data-target="#my-therapy-centers-menu" aria-expanded="true">
                    <span class="d-sm-inline">{{__('My therapy centers')}}</span>
                </a>
                <div class="collapse show" id="my-therapy-centers-menu" aria-expanded="false">
                    <ul class="flex-column nav p-0">
                        @foreach (auth()->user()->centers->where('type' , 'counseling_center') as $item)
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('dashboard.users.show', $item->owner->id)}}">
                                    <span>{{$item->owner->name}}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </li>
        @else
        <li class="nav-item">
            <a class="nav-link text-truncate" href="{{route('dashboard.centers.index', ['my' => 1])}}">
                <span class="d-sm-inline">{{__('My therapy centers')}}</span>
            </a>
        </li>
        @endif
    @endif
@endif

@if (in_array(auth()->user()->type,['psychologist', 'operator', 'counseling_center']))
    <li class="nav-item">
        <a class="nav-link text-truncate direct" href="{{route('dashboard.home')}}#my-therapy-menu" data-toggle="collapse" data-target="#my-therapy-menu" aria-expanded="true">
            <span class="d-sm-inline">{{__('Therapy')}}</span>
        </a>
        <div class="collapse show" id="my-therapy-menu" aria-expanded="false">
            <ul class="flex-column nav p-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('dashboard.rooms.index')}}">
                        <span class="d-sm-inline">{{__('Therapy rooms')}}</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('dashboard.cases.index')}}">
                        <span class="d-sm-inline">{{__('Cases')}}</span>
                    </a>
                </li>

                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{route('dashboard.rooms.index')}}">
                        <span class="d-sm-inline">{{__('Sessions')}}</span>
                    </a>
                </li> --}}
            </ul>
        </div>
    </li>
    <li class="nav-item">
            <a class="nav-link text-truncate" href="{{route('dashboard.reserves.index')}}">
                <span class="d-sm-inline">{{__('Reservation')}}</span>
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
    @if (auth()->user()->isAdmin())
        <li class="nav-item">
            <a class="nav-link text-truncate" href="{{route('dashboard.relationships.index')}}">
                <span class="d-sm-inline">{{__('Relationships')}}</span>
            </a>
        </li>
    @endif
    <li class="nav-item">
        <a class="nav-link text-truncate" href="{{route('dashboard.centers.index')}}">
            <span class="d-sm-inline">{{__('Therapy centers')}}</span>
        </a>
    </li>

@endsection
@include('layouts.default-menu')
