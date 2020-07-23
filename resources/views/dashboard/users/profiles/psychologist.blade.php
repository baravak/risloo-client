@extends($layouts->dashboard)
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-3">
            <div class="card-header">
                {{$user->id == auth()->id() ? __('My profile') : __('profile :name', ['name' => ($user->name ?: $user->id)])}}
                @if ($user->can('edit'))
                    <a class="badge badge-primary fs-10" href="{{auth()->id() == $user->id ? route('dashboard.users.me.edit') : $user->route('edit')}}">
                        {{__('Edit')}}
                    </a>
                @endif
                @if (auth()->user()->type == 'admin' && auth()->user()->id != $user->id)
                    <a href="{{route('auth.as', ['user' => $user->id])}}" class="badge badge-secondary fs-10" data-lijax="click" data-method="POST">
                        <i class="fal fa-user-secret"></i> {{__('Login to this...')}}
                    </a>
                @endif
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6 col-lg-6 col-xl-3 profile-separator">
                        <div class="d-flex align-items-center mb-3">
                            <div href="#" class="media media-xl rounded-circle">
                                <img src="{{$user->avatar_url->url('large')}}" alt="Avatar">
                            </div>
                            <div class="px-3">
                                <div class="fs-14 font-weight-bold">{{$user->name ?: __('Anonymouse')}}</div>
                                <div class="fs-12 direction-ltr text-left text-color-1">@username($user->username)</div>
                                <div class="fs-8 badge badge-light">
                                    {{__('Level')}}:
                                    {{__(ucfirst($user->position))}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3 profile-separator">
                        <div class="row">
                            <div class="col-6">
                                <i class="far fa-mobile text-success"></i>
                            </div>
                            <div class="col-6">
                                @if ($mobile = App\Mobile::parse($user->mobile))
                                <a href="tel:+{{$mobile[2]}}{{$mobile[0]}}" class="fs-12 direction-ltr d-inline-block font-weight-bold text-decoration-none text-success" target="_blank">+{{$mobile[2]}} {{$mobile[0]}}</a>
                                @endif
                            </div>
                            <div class="col-6">
                                <i class="far fa-envelope text-primary"></i>
                            </div>
                            <div class="col-6">
                                <a href="mailto:{{$user->email}}" class="fs-12 font-weight-bold text-decoration-none">{{$user->email}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-6 col-xl-3 profile-separator">
                        <div class="row">
                            <div class="col-6">
                                <span class="fs-12">تحصیلات</span>
                            </div>
                            <div class="col-6">
                                <span class="fs-12 font-weight-bold">کارشناسی ارشد</span>
                            </div>

                            <div class="col-6">
                                <span class="fs-12">تاریخ تولد</span>
                            </div>
                            <div class="col-6">
                                <span class="fs-12 font-weight-bold">۱۳۷۰/۸/۲۷</span>
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
            <div class="card-header">اتاق‌های درمان</div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table mb-0 fs-12">
                        @foreach ($rooms as $room)
                            <tr>
                                @if ($room->owner->id == $room->manager->id)
                                    <td>
                                        <a href="{{route('dashboard.users.show', $room->manager->id)}}" class="text-decoration-none">
                                            <div class="d-flex align-items-center">
                                                <div href="#" class="media media-light rounded-circle pl-2">
                                                    <span>
                                                        @avatarOrName($room->manager)
                                                    </span>
                                                </div>
                                                <div>
                                                    {{__('Personal clinic of :user', ['user' => $room->manager->name])}}
                                                </div>
                                            </div>
                                        </a>
                                    </td>
                                @else
                                    <td>
                                        <a href="{{route('dashboard.users.show', $room->owner->id)}}" class="text-decoration-none">
                                            <div class="d-flex align-items-center">
                                                <div href="#" class="media media-light rounded-circle pl-2">
                                                    <span>
                                                        @avatarOrName($room->owner)
                                                    </span>
                                                </div>
                                                <div>
                                                    {{$room->owner->name}}
                                                </div>
                                            </div>
                                        </a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
        <div class="card">
            <div class="card-header">مدارک و اعتبارنامه‌ها</div>
            <div class="card-body">
                <div class="d-flex align-items-center bg-light p-2">
                    <div>
                        <i class="fal fa-2x fa-file"></i>
                    </div>
                    <div class="px-3">
                        <div class="fs-12 font-weight-bold">نام فایل</div>
                        <div class="fs-10">۱۱۰ کیلوبایت</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
