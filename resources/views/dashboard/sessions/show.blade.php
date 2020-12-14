@extends($layouts->dashboard)
@section('content')
    <div class="col-lg-12">
        <div class="card mb-3">
            <div class="card-header">
                {{ __('Therapy session') }}
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6 col-lg-6 col-xl-3 profile-separator">
                        <div class="d-flex align-items-center mb-3">
                            <div href="#" class="media media-xl rounded-circle">
                                <img src="{{$session->case->manager->avatar_url->url('large')}}" alt="Avatar">
                            </div>
                            <div class="px-3">
                                <div class="font-weight-bold">{{$session->case->manager->name}}</div>
                                @if ($session->case->room->type == 'room')
                                    <div class="fs-12">
                                        <a href="{{route('dashboard.rooms.show', $session->case->room->id)}}" class="text-decoration-none">
                                            {{__('Therapy room of :user' , ['user' => $session->case->room->manager->name])}}
                                        </a>
                                    </div>
                                @endif
                                <div class="fs-12">
                                    <a href="{{route('dashboard.centers.show', $session->case->room->center->id)}}" class="text-decoration-none">
                                        {{$session->case->room->center->detail->title}}
                                    </a>
                                </div>
                                <div class="fs-12">
                                    <a href="{{route('dashboard.cases.show', $session->case->id)}}" class="text-decoration-none">
                                    {{ __("Case") }}: {{  $session->case->id }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @can('dashboard.sessions.update', [$session , 'report'])
    <div class="col-lg-12">
        <div class="card mb-3">
            <div class="card-header">
                {{ __("Report text") }} <a href="{{ route('dashboard.sessions.report.create', $session->id) }}" class="badge badge-primary">{{ __('Create report') }}</a>
            </div>
            <div class="card-body">
                <p data-encType="{{ $session->encryption_type }}">{{ $session->report }}</p>
            </div>
        </div>
    </div>
    @endcan

@endsection
