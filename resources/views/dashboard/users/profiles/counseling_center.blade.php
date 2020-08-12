@extends($layouts->dashboard)
@section('content')
    <div class="row">
        <div class="col-12 col-sm-12 col-xl-6">
            <div class="card mb-3">
                <div class="card-header d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <div class="d-flex align-items-center">
                        <a href="#" class="media media-lg media-primary rounded-circle">
                            @if (isset($user->name))
                                <span>{{ Illuminate\Support\Str::substr($user->name, 0, 1) }}</span>
                            @else
                                <span>?</span>
                            @endif
                        </a>
                        <div class="mr-3">
                            <div class="mb-1">
                                {{$user->name ?: __('Anonymouse')}}
                                @if ($user->can('edit'))
                                    <a href="{{ auth()->id() == $user->id ? route('dashboard.users.me.edit') : $user->route('edit') }}" class="badge badge-primary">{{__('Edit')}}</a>
                                @endif
                                @if (auth()->user()->type == 'admin' && auth()->user()->id != $user->id)
                                    <a href="{{ route('auth.as', ['user' => $user->id]) }}" class="badge badge-secondary" data-lijax="click" data-method="POST">
                                        <i class="fal fa-user-secret"></i> {{__('Login to this...')}}
                                    </a>
                                @endif
                            </div>
                            <div class="fs-14 font-weight-bold mb-1">#1310</div>
                            @include('dashboard.users.profiles.centerAcceptation', ['center' => $user->center])
                        </div>
                    </div>
                    <div data-xhr="center-acceptation">
                        @can('details', $user->center)
                            <a href="{{ route('dashboard.relationship.users.index', $user->center->id) }}" class="btn btn-sm btn-outline-dark mt-3 m-sm-0">
                                <i class="far fa-address-book align-middle ml-1"></i>
                                {{__('Center members')}}
                            </a>
                        @endcan
                    </div>
                </div>

                <div class="card-body">Hi</div>
            </div>
        </div>

        <div class="col-xl-3">
            <div class="card mb-3">
                <div class="card-header">تخصص&zwnj;های درمانی</div>
                <div class="card-body">
                    <ul class="list-group list-group-flush pr-0">
                        <li class="list-group-item fs-14">تخصص شماره یک</li>
                        <li class="list-group-item fs-14">تخصص شماره دو</li>
                        <li class="list-group-item fs-14">تخصص شماره سه</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-xl-3">
            <div class="card mb-3">
                <div class="card-header">روان&zwnj;شناس&zwnj;ها</div>
                <div class="card-body">
                    <ul class="list-group list-group-flush pr-0">
                        <li class="list-group-item fs-14">روان&zwnj;شناس شماره یک</li>
                        <li class="list-group-item fs-14">روان&zwnj;شناس شماره دو</li>
                        <li class="list-group-item fs-14">روان&zwnj;شناس شماره سه</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-xl-3">
            <div class="card mb-3">
                <div class="card-header">کارگاه&zwnj;های اجرا شده</div>
                <div class="card-body">
                    <ul class="list-group list-group-flush pr-0">
                        <li class="list-group-item fs-14">کارگاه شماره یک</li>
                        <li class="list-group-item fs-14">کارگاه شماره دو</li>
                        <li class="list-group-item fs-14">کارگاه شماره سه</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
