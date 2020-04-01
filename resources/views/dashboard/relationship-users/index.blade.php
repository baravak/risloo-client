@extends($layouts->dashboard)

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-3">
                <div class="card-header"><a class="badge badge-primary fs-10" href="">{{__('Edit')}}</a></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 col-lg-6 col-xl-3 profile-separator">
                            <h6>{{__('Creator')}}</h6>
                            <div class="d-flex align-items-center mb-3">
                                <h1></h1>
                                <div href="#" class="media media-xl rounded-circle">
                                    <img src="{{$relationship->creator->avatar_url->url('large')}}" alt="Avatar">
                                </div>
                                <div class="px-3">
                                    <div class="fs-14 font-weight-bold">
                                        <a href="{{$relationship->creator->route('show')}}">
                                            {{$relationship->creator->name ?: __('Anonymouse')}}
                                        </a>
                                    </div>
                                    <div class="fs-12 direction-ltr text-left d-inline-block text-color-1">@username($relationship->creator->username)</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-6 col-xl-3 profile-separator">
                            <h6>{{__('Owner')}}</h6>
                            <div class="d-flex align-items-center mb-3">
                                <div href="#" class="media media-xl rounded-circle">
                                    <img src="{{$relationship->owner->avatar_url->url('large')}}" alt="Avatar">
                                </div>
                                <div class="px-3">
                                    <div class="fs-14 font-weight-bold">
                                        <a href="{{$relationship->owner->route('show')}}">
                                            {{$relationship->owner->name ?: __('Anonymouse')}}
                                        </a>
                                    </div>
                                    <div class="fs-12 direction-ltr text-left d-inline-block text-color-1">@username($relationship->owner->username)</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-6 col-xl-3 profile-separator">
                            <h6>{{__('Manager')}}</h6>
                            <div class="d-flex align-items-center mb-3">
                                <div href="#" class="media media-xl rounded-circle">
                                    <img src="{{$relationship->manager->avatar_url->url('large')}}" alt="Avatar">
                                </div>
                                <div class="px-3">
                                    <div class="fs-14 font-weight-bold">
                                        <a href="{{$relationship->manager->route('show')}}">
                                            {{$relationship->manager->name ?: __('Anonymouse')}}
                                        </a>
                                    </div>
                                    <div class="fs-12 direction-ltr text-left d-inline-block text-color-1">@username($relationship->manager->username)</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-6 col-xl-3 profile-separator">
                        <div class="row">
                            <div class="col-6">
                                <span class="fs-12">{{__('Type')}}</span>
                            </div>
                            <div class="col-6">
                                <span class="fs-12 font-weight-bold">{{__(ucfirst($relationship->type))}}</span>
                            </div>

                            <div class="col-6">
                                <span class="fs-12">{{__('Create time')}}</span>
                            </div>
                            <div class="col-6">
                                <span class="fs-12 font-weight-bold">{{$relationship->created_at}}</span>
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
            {{ __('Relationship users') }} <sup>({{ $users->total() }})</sup>
            @filterBadge($users)
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>@sortView($users, 'id', '#')</th>
                            <th>@sortView($users, 'creator')</th>
                            <th>@sortView($users, 'user')</th>
                            <th>@sortView($users, 'position')</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    @id($user)
                                </td>
                                <td>
                                    <a href="{{$user->creator->route('show')}}">
                                        @displayName($user->creator)
                                    </a>
                                </td>
                                <td>
                                    <a href="{{$user->user->route('show')}}">
                                        @displayName($user->user)
                                    </a>
                                </td>
                                <td>
                                    {{__(ucfirst($user->position))}}
                                </td>
                                <td>
                                    {{-- <a href="{{route('dashboard.user-users.index')}}" class="fs-14 text-decoration-none">
                                        <i class="far fa-address-book"></i>
                                        {{__('Users')}}
                                    </a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
