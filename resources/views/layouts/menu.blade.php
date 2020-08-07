@section('default-menu')
@parent
@php
    $_centers = auth()->user()->centers ? clone auth()->user()->centers : new Illuminate\Database\Eloquent\Collection();
    $personal_clinic = null;
    foreach($_centers as $key => $_center){
        if($_center->type == 'personal_clinic' && $_center->manager->id == auth()->id())
        {
            $_centers->forget($key);
            $personal_clinic = $_center;
        }
    }
@endphp
@if ($personal_clinic)
    <li class="nav-item">
        <a class="nav-link text-truncate" href="{{route('dashboard.centers.show', $personal_clinic->id)}}">
            <span class="d-sm-inline">{{__('My personal clinic')}}</span>
        </a>
    </li>
@endif

@if ($_centers->count())
    @if ($_centers->count() == 1)
        <li class="nav-item">
            <a class="nav-link text-truncate" href="{{route('dashboard.centers.show', $_centers->first()->id)}}">
                <span>
                    {{$_centers->first()->detail->title}}
                </span>
            </a>
        </li>
    @elseif ($_centers->count() < 4)
        <li class="nav-item">
            <a class="nav-link text-truncate direct" href="{{route('dashboard.home')}}#my-therapy-centers-menu" data-toggle="collapse" data-target="#my-therapy-centers-menu" aria-expanded="true">
                <span class="d-sm-inline">{{__('My therapy centers')}}</span>
            </a>
            <div class="collapse show" id="my-therapy-centers-menu" aria-expanded="false">
                <ul class="flex-column nav p-0">
                    @foreach ($_centers as $item)
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('dashboard.centers.show', $item->id)}}">
                                <span>{{$item->detail->title}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </li>
    @else
    <li class="nav-item">
        <a class="nav-link text-truncate" href="{{route('dashboard.centers.index', ['my' => 'yes'])}}">
            <span class="d-sm-inline">{{__('My therapy centers')}}</span>
        </a>
    </li>
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
