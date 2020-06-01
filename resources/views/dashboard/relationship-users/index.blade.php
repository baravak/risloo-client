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
                                <div class="media media-lg media-primary rounded-circle">
                                    <span>{{ mb_substr($relationship->creator->name, 0, 2) }}</span>
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
                                <div class="media media-lg media-primary rounded-circle">
                                    <span>{{ mb_substr($relationship->owner->name, 0, 2) }}</span>
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
                                <div class="media media-lg media-primary rounded-circle">
                                    <span>{{ mb_substr($relationship->manager->name, 0, 2) }}</span>
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
                            <th>@sortView($users, 'user')</th>
                            <th>@sortView($users, 'creator')</th>
                            <th>@sortView($users, 'position')</th>
                            <th>@sortView($users, 'accepted_at')</th>
                            <th>@sortView($users, 'status')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            @include('dashboard.relationship-users.list')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($users as $user)
            <div class="col-xl-2">
                <div class="card">
                    <div class="card-header trianglify-pattern-2">
                        <a href="#" class="fs-14 font-weight-bold text-dark text-decoration-none">@displayName($user->user)</a>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-3">
                            <div class="fs-12">
                                @if($user->allows('creator'))
                                    <select name="creator_id" data-lijax="change" data-action="{{ route('dashboard.relationship.users.update', ['relationshipUser'=> $user->id]) }}" data-method="PUT">
                                        @foreach ($user->allows('creator') as $item)
                                            <option value="{{$item->id}}" {{$item->id == $user->creator->id ? 'selected' : ''}}>{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <a href="{{ $user->creator->route('show') }}" class="font-weight-bold">
                                        @displayName($user->creator)
                                    </a>
                                @endif
                            </div>
                            <div class="fs-12">
                                @if($user->allows('position'))
                                    <select name="position" id="position" data-lijax="change" data-action="{{route('dashboard.relationship.users.update', ['relationshipUser'=> $user->id])}}" data-method="PUT">
                                        @foreach ($user->allows('position') as $item)
                                            <option value="{{$item}}" {{$user->position == $item ? 'selected' : ''}}>{{__(ucfirst($item))}}</option>
                                        @endforeach
                                    </select>
                                @else
                                    <span>
                                        {{__(ucfirst($user->position))}}
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="fs-12">
                            {{__(ucfirst($user->accepted_at))}}
                        </div>
                    </div>
                    <div class="card-footer bg-white">
                        <div class="fs-12">
                            @if($user->allows('status'))
                                <button class="btn btn-light btn-sm fs-10" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="far fa-cog"></i>
                                    <span>
                                        @if($user->kicked_at)
                                            {{__('Kicked') . ' '. $user->kicked_at}}
                                        @elseif(!$user->accepted_at)
                                            {{__('Awaiting')}}
                                        @else
                                            {{__('Accepted')}}
                                        @endif
                                    </span>
                                </button>
                                <div class="dropdown-menu">
                                    @foreach ($user->allows('status') as $acception)
                                        <a href="{{route('dashboard.relationship.users.update', ['relationshipUser'=> $user->id])}}" class="dropdown-item fs-10" data-lijax="click" data-method="PUT" data-name="status" data-value="{{$acception}}">
                                            <i class="fal fa-user-secret"></i> {{__(ucfirst($acception))}}
                                        </a>
                                    @endforeach
                                </div>
                            @else
                                @if($user->kicked_at)
                                    {{__('Kicked') . ' '. $user->kicked_at}}
                                @elseif(!$user->accepted_at)
                                    {{__('Awaiting')}}
                                @else
                                    {{__('Accepted')}}
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
