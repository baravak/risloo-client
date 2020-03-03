@extends($display->dashboard)

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            {{ __('users') }}
            <span class="badge badge-secondary">
                <i class="fas fa-times align-middle"></i>
                وضعیت: فعال
            </span>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>@sortView($users,'id', '#')</th>
                            <th>@sortView($users,'name', __('users.name'))</th>
                            <th>@sortView($users,'email', __('users.email'))</th>
                            <th>@sortView($users,'mobile', __('users.mobile'))</th>
                            <th>
                                @sortView($users,'gender', __('users.gender'))
                                @isset($users->response('meta')->filters->allowed->gender)
                                    <button class="btn btn-sm btn-clear p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-filter fs-12"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item fs-12 {{!app('request')->gender ? 'active' : ''}}" href="{{app('request')->create($users->url($users->currentPage()), 'GET', ['gender' => null])->getUri()}}">{{__("All Items")}}</a>
                                        @foreach ($users->response('meta')->filters->allowed->gender as $item)
                                            <a class="dropdown-item fs-12 {{app('request')->gender == $item ? 'active' : ''}}" href="{{app('request')->create($users->url($users->currentPage()), 'GET', ['gender' => $item])->getUri()}}">{{__("gender.$item")}}</a>
                                        @endforeach
                                    </div>
                                @endisset
                            </th>
                            <th>
                                @sortView($users,'status', __('users.status'))
                                @isset($users->response('meta')->filters->allowed->status)
                                    <button class="btn btn-sm btn-clear p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-filter fs-12"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item fs-12 {{!app('request')->status ? 'active' : ''}}" href="{{app('request')->create($users->url($users->currentPage()), 'GET', ['status' => null])->getUri()}}">{{__("All Items")}}</a>
                                        @foreach ($users->response('meta')->filters->allowed->status as $item)
                                            <a class="dropdown-item fs-12 {{app('request')->status == $item ? 'active' : ''}}" href="{{app('request')->create($users->url($users->currentPage()), 'GET', ['status' => $item])->getUri()}}">{{__("status.$item")}}</a>
                                        @endforeach
                                    </div>
                                @endisset
                            </th>
                            <th>
                                @sortView($users,'type', __('users.type'))
                                @isset($users->response('meta')->filters->allowed->type)
                                    <button class="btn btn-sm btn-clear p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-filter fs-12"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item fs-12 {{!app('request')->type ? 'active' : ''}}" href="{{app('request')->create($users->url($users->currentPage()), 'GET', ['type' => null])->getUri()}}">{{__("All Items")}}</a>
                                        @foreach ($users->response('meta')->filters->allowed->type as $item)
                                            <a class="dropdown-item fs-12 {{app('request')->type == $item ? 'active' : ''}}" href="{{app('request')->create($users->url($users->currentPage()), 'GET', ['type' => $item])->getUri()}}">{{__("type.$item")}}</a>
                                        @endforeach
                                    </div>
                                @endisset
                            </th>
                            <th>@sortView($users,'username', __('users.username'))</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>@id($user)</td>
                                <td>{{ $user->name }}</td>
                                <td>@email($user->email)</td>
                                <td>@mobile($user->mobile)</td>
                                <td>{{ $user->gender }}</td>
                                <td>{{ $user->status }}</td>
                                <td>{{ $user->type }}</td>
                                <td>@username($user->username)</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
