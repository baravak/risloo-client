@extends($layouts->dashboard)
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-3">
            <div class="card-header">
                {!!__('Case of :users', ['users' => '<small>' . $case->clients->take(2)->pluck('user.name')->join(', ') . '</small>'])!!}
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6 col-lg-6 col-xl-3 profile-separator">
                        <div class="d-flex align-items-center mb-3">
                            <div href="#" class="media media-xl rounded-circle">
                                <img src="{{$case->manager->avatar_url->url('large')}}" alt="Avatar">
                            </div>
                            <div class="px-3">
                                <div class="font-weight-bold">{{$case->manager->name}}</div>
                                @if ($case->room->type == 'room')
                                    <div class="fs-12">
                                        <a href="{{route('dashboard.rooms.show', $case->room->id)}}" class="text-decoration-none">
                                            {{__('Therapy room of :user' , ['user' => $case->room->manager->name])}}
                                        </a>
                                    </div>
                                @endif
                                <div class="fs-12">
                                    <a href="{{route('dashboard.centers.show', $case->room->center->id)}}" class="text-decoration-none">
                                        {{$case->room->center->detail->title}}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3 profile-separator">
                        <div class="row">
                            <div class="col-12">
                                <span class="fs-12">{{__('Chief complaint')}}: </span>
                                {{$case->detail->chief_complaint}}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-6 col-xl-3 profile-separator">
                        <div class="row">
                            <div class="col-6">
                                <span class="fs-12">تاریخ ساخت پرونده</span>
                            </div>
                            <div class="col-6">
                                <span class="fs-12 font-weight-bold d-inline-block direction-ltr">@time($case->created_at, 'Y-m-d H:i')</span>
                            </div>

                            <div class="col-6">
                                <span class="fs-12">تاریخ آخرین جلسه</span>
                            </div>
                            <div class="col-6">
                                <span class="fs-12 font-weight-bold d-inline-block direction-ltr">@time($case->created_at, 'Y-m-d H:i')</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-6 col-xl-3">
                        <div class="row">
                            <div class="col-6">
                                <span class="fs-12">جلسات مشاوره</span>
                            </div>
                            <div class="col-6">
                                <span class="fs-12 font-weight-bold">۴۳</span>
                            </div>

                            <div class="col-6">
                                <span class="fs-12">تست‌های گرفته‌شده</span>
                            </div>
                            <div class="col-6">
                                <span class="fs-12 font-weight-bold">۱۵۰</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
        <div class="card">
            <div class="card-header">
                {{__('Clients')}}<sup>({{ $case->clients ? $case->clients->count() : 0 }})
                <small>
                    <a href="{{route('dashboard.case.users.create', $case->id)}}" class="badge badge-primary p-1">{{__('Add client')}}</a>
                </small>
            </div>
            <div class="card-body">
                @if ($case->clients)
                    @foreach ($case->clients as $client)
                        <div class="d-flex align-items-center bg-light p-2">
                            <div class="px-3">
                                <div class="fs-12 font-weight-bold">
                                    @displayName($client->user)
                                    <a href="{{route('dashboard.samples.create', ['case' => $case->id, 'client' => $client->id])}}#case" class="badge badge-primary p-1">{{__('Create sampel')}}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
        <div class="card">
            <div class="card-header">
                {{__('Sessions & reserves')}}<sup>({{ $case->sessions ? $case->sessions->count() : 0 }})
                <small>
                    <a href="{{route('dashboard.sessions.create', ['case' => $case->id])}}" class="badge badge-primary p-1">{{__('Add session')}}</a>
                </small>
                <small>
                    <a href="{{route('dashboard.sessions.create', ['case' => $case->id])}}" class="badge badge-secondary p-1">{{__('Reports')}}</a>
                </small>
            </div>
            <div class="card-body">
                <table class="w-100 table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">{{ __('#') }}</th>
                            <th class="text-center">شروع</th>
                            <th class="text-center">مدت جلسه</th>
                            <th class="">وضعیت</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($case->sessions)
                            @foreach ($case->sessions as $session)
                                <tr class="m-2">
                                    <td>{{ $session->id }}</td>
                                    <td class="direction-ltr text-left">
                                        <span class="d-block fs-12 font-weight-bold">
                                            @time($session->started_at, 'y-n-j')
                                        </span>
                                        <small class="d-block">
                                            @time($session->started_at, 'G:i')
                                        </small>
                                    </td>
                                    <td>
                                        <span class="d-inline-block">
                                            @duration($session->duration, 'minute')
                                        </span>
                                    </td>
                                    <td>
                                        {{ __($session->status) }}
                                    </td>
                                    <td>
                                        @include('components._editLink', ['href' => route('dashboard.sessions.edit', ['session' => $session->id, 'callback' => route('dashboard.cases.show', $case->id)])])
                                        @if ($session->is_reported)
                                            <a href="{{ route('dashboard.sessions.show', $session->id) }}" title="{{ __('See report') }}"><i class="fas fa-comment"></i></a>
                                        @else
                                            <a href="{{ route('dashboard.sessions.report.create', $session->id) }}" title="{{ __('Submit report') }}"><i class="far fa-comment-edit fs-14"></i></a>
                                        @endif
                                        <div class="dropdown fs-12">
                                            <button class="btn dropdown-toggle btn-sm p-0 fs-12" type="button" id="practice-{{ $session->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="far fa-chalkboard-teacher" title="{{ __('Practice') }}"></i>
                                                {{ __('Practice') }}
                                            </button>
                                            <div class="dropdown-menu fs-12" aria-labelledby="practice-{{ $session->id }}">
                                              <a class="dropdown-item" href="{{ route('dashboard.sessions.practices.create', ['session'=> $session->id, 'callback' => route('dashboard.cases.show', $case->id)]) }}">
                                                <i class="far fa-file-plus"></i>
                                                {{ __('Create practice') }}
                                              </a>
                                              <a class="dropdown-item" href="{{ route('dashboard.sessions.practices.index', ['session'=> $session->id]) }}">
                                                <i class="far fa-file-plus"></i>
                                                {{ __('Practices') }}
                                            </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
            </table>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
        <div class="card">
            <div class="card-header">
                {{__('Samples')}}<sup>({{ $case->samples ? $case->samples->count() : 0 }})
                <small>
                    <a href="{{route('dashboard.samples.create', ['case' => $case->id])}}#case" class="badge badge-primary p-1">{{__('Create sampel')}}</a>
                </small>
            </div>
            <div class="card-body">
                <table class="w-100 table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">{{ __('Title') }}</th>
                            <th class="text-center">{{ __('Status') }}</th>
                            <th class="">{{ __('Session') }}</th>
                            <th class="">{{ __('Client') }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($case->samples)
                            @foreach ($case->samples as $sample)
                                <tr class="m-2">
                                    <td>
                                        <span class="d-block fs-12">
                                            {{ $sample->title }}
                                        </span>
                                        <small class="d-block direction-ltr font-weight-bold">
                                            {{ $sample->id }}
                                        </small>
                                    </td>
                                    <td>
                                        {{ __(ucfirst($sample->status)) }}
                                    </td>
                                    <td>
                                        {{ $sample->session_id }}
                                    </td>
                                    <td>
                                        {{ $sample->client->name }}
                                    </td>
                                    <td>
                                        @include('components._showLink', ['href' => route('dashboard.samples.show', $sample->id)])
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
@endsection
