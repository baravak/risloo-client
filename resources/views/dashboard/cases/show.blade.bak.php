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
                                <span class="fs-12">{{__('Problem')}}: </span>
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
                    @can('dashboard.cases.manager', [$case])
                        <small>
                            <a href="{{route('dashboard.case.users.create', $case->id)}}" class="badge badge-primary p-1">{{__('Add client')}}</a>
                        </small>
                    @endcan
            </div>
            <div class="card-body">
                @if ($case->clients)
                    @foreach ($case->clients as $client)
                        <div class="d-flex align-items-center bg-light p-2">
                            <div class="px-3">
                                <div class="fs-12 font-weight-bold">
                                    @displayName($client->user)
                                    @can('dashboard.cases.manager', [$case])
                                        <a href="{{route('dashboard.samples.create', ['case' => $case->id, 'client' => $client->id])}}#case" class="badge badge-primary p-1">{{__('Create sampel')}}</a>
                                    @endcan
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
                    @can('dashboard.cases.manager', [$case])
                        <small>
                            <a href="{{route('dashboard.sessions.create', ['case' => $case->id])}}" class="badge badge-primary p-1">{{__('Add session')}}</a>
                        </small>
                    @endcan
                <small>
                    {{-- <a href="{{route('dashboard.sessions.create', ['case' => $case->id])}}" class="badge badge-secondary p-1">{{__('Reports')}}</a> --}}
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
                                @include('dashboard.cases.show.session-list')
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
                    @can('dashboard.cases.manager', [$case])
                    <small>
                        <a href="{{route('dashboard.samples.create', ['case' => $case->id])}}#case" class="badge badge-primary p-1">{{__('Create sampel')}}</a>
                    </small>
                    @endcan
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
                                        @can('dashboard.cases.manager', [$case])
                                            @include('components._showLink', ['href' => route('dashboard.samples.show', $sample->id)])
                                        @endcan
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