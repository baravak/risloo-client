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
                            <th>@sortView($users,'email', __('users.email'))</th>
                            <th>@sortView($users,'mobile', __('users.mobile'))</th>
                            <th>
                                @sortView($users,'gender', __('users.gender'))
                                @filterView($users, 'gender')
                            </th>
                            <th>
                                @sortView($users,'status', __('users.status'))
                                @filterView($users, 'status')
                            </th>
                            <th>
                                @sortView($users,'type', __('users.type'))
                                @filterView($users, 'type')
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
