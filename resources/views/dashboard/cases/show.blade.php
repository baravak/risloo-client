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
                {{__('Clients')}}<sup>({{ $case->clients->count() }})
                <small>
                    <a href="{{route('dashboard.case.users.create', $case->id)}}" class="badge badge-primary p-1">{{__('Add client')}}</a>
                </small>
            </div>
            <div class="card-body">
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
            </div>
        </div>
    </div>
</div>
@endsection
