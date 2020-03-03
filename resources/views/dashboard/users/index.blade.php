@extends($display->dashboard)

@section('content')
    <div class="card mb-3">
        <div class="card-header">{{ __('users') }}</div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>@sortView($users,'id', '#')</th>
                            <th>@sortView($users,'name', __('users.name'))</th>
                            <th>@sortView($users,'email', __('users.email'))</th>
                            <th>@sortView($users,'mobile', __('users.mobile'))</th>
                            <th>@sortView($users,'gender', __('users.gender'))</th>
                            <th>
                                @sortView($users,'status', __('users.status'))
                                <button class="btn btn-sm btn-light" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-filter fs-12"></i>
                                </button>
                                <div class="dropdown-menu">
                                    @foreach ($users->response('meta')->filters->allowed->status as $item)
                                        <a class="dropdown-item fs-12" href="#">{{__("status.$item")}}</a>
                                    @endforeach
                                </div>
                            </th>
                            <th>
                                <select name="" id="" class="form-control form-control-sm">
                                    <option value="">A</option>
                                    <option value="">B</option>
                                    <option value="">C</option>
                                </select>
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
