@extends($display->dashboard)

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Users') }} <sup>({{$users->total()}})</sup>
            @filterBadge($users)
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>@sortView($users,'id', '#')</th>
                            <th>@sortView($users,'name', __('users.name'))</th>
                            <th>@sortView($users,'email', __('users.email'), '<i class="far fa-envelope"></i>')</th>
                            <th>@sortView($users,'mobile', __('users.mobile'), '<i class="fas fa-mobile-alt"></i>')</th>
                            <th class="d-none d-sm-table-cell">
                                @sortView($users,'gender', __('users.gender'), '<i class="fas fa-venus-mars"></i>')
                                @filterView($users, 'gender')
                            </th>
                            <th>
                                @sortView($users,'status', __('users.status'), '<i class="fas fa-user-shield"></i>')
                                @filterView($users, 'status')
                            </th>
                            <th>
                                @sortView($users,'type', __('users.type'), '<i class="fas fa-award"></i>')
                                @filterView($users, 'type')
                            </th>
                            <th>@sortView($users,'username', __('users.username'), '<i class="fas fa-at"></i>')</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>@id($user)</td>
                                <td>{{ $user->name }}</td>
                                <td>@email($user->email)</td>
                                <td>@mobile($user->mobile)</td>
                                <td class="d-none d-sm-table-cell">{{ $user->gender ? __("gender.{$user->gender}") : '' }}</td>
                                <td>
                                    <span class="d-none d-sm-inline">
                                        {{ __("status.{$user->status}") }}
                                    </span>
                                    <span class="d-sm-none">
                                        {{ mb_substr(__("status.{$user->status}"), 0, 2) }}
                                    </span>

                                </td>
                                <td>
                                    <span class="d-none d-sm-inline">
                                        {{ __("type.{$user->type}") }}
                                    </span>
                                    <span class="d-sm-none">
                                        {{ mb_substr(__("type.{$user->type}"), 0, 2) }}
                                    </span>
                                </td>
                                <td>@username($user->username)</td>
                                <td>
                                    <button class="btn btn-sm btn-clear p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="far fa-cogs fs-12 text-primary"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a href="{{route('dashboard.users.edit', ['id' => $user->id])}}" title="{{__('Edit')}}" class="dropdown-item fs-12">
                                            <i class="far fa-user-cog text-primary"></i> {{__('Edit')}}
                                        </a>
                                        @if (app('request')->user()->type == 'admin')
                                        <a href="{{route('login.as', ['id' => $user->id])}}" class="dropdown-item fs-12">
                                            <i class="fal fa-user-secret text-primary"></i> {{__('Login to this...')}}
                                        </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
