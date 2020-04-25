@extends($layouts->dashboard)

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-3">
                <div class="card-header"><a class="badge badge-primary fs-10" href="">{{__('Edit')}}</a></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 col-lg-6 col-xl-3 profile-separator">
                            <h6>{{__('Owner')}}</h6>
                            <div class="d-flex align-items-center mb-3">
                                <div href="#" class="media media-xl rounded-circle">
                                    <img src="{{$room->owner->avatar_url->url('large')}}" alt="Avatar">
                                </div>
                                <div class="px-3">
                                    <div class="fs-14 font-weight-bold">
                                        <a href="{{$room->owner->route('show')}}">
                                            {{$room->owner->name ?: __('Anonymouse')}}
                                        </a>
                                    </div>
                                    <div class="fs-12 direction-ltr text-left d-inline-block text-color-1">@username($room->owner->username)</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-6 col-xl-3 profile-separator">
                            <h6>{{__('Psychologist')}}</h6>
                            <div class="d-flex align-items-center mb-3">
                                <div href="#" class="media media-xl rounded-circle">
                                    <img src="{{$room->manager->avatar_url->url('large')}}" alt="Avatar">
                                </div>
                                <div class="px-3">
                                    <div class="fs-14 font-weight-bold">
                                        <a href="{{$room->manager->route('show')}}">
                                            {{$room->manager->name ?: __('Anonymouse')}}
                                        </a>
                                    </div>
                                    <div class="fs-12 direction-ltr text-left d-inline-block text-color-1">@username($room->manager->username)</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-6 col-xl-3">
                        <div class="row">
                            <div class="col-6">
                                <span class="fs-12">{{__('Type')}}</span>
                            </div>
                            <div class="col-6">
                                <span class="fs-12 font-weight-bold">{{__(ucfirst($room->type))}}</span>
                            </div>

                            <div class="col-6">
                                <span class="fs-12">{{__('Create time')}}</span>
                            </div>
                            <div class="col-6">
                                <span class="fs-12 font-weight-bold">{{$room->created_at}}</span>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header">
            {{ __('room users') }} <sup>({{ $users->total() }})</sup>
            @filterBadge($users)
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>@sortView($users, 'id', '#')</th>
                            <th>@sortView($users, 'user')</th>
                            <th>@sortView($users, 'creator')</th>
                            <th>@sortView($users, 'position')</th>
                            <th>@sortView($users, 'accepted_at')</th>
                            <th>@sortView($users, 'status')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            @include('dashboard.room-users.list')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
