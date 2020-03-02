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
                            <th>@sortView($users,'status', __('users.status'))</th>
                            <th>@sortView($users,'type', __('users.type'))</th>
                            <th>@sortView($users,'username', __('users.username'))</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->idView }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->mobileView }}</td>
                                <td>{{ $user->gender }}</td>
                                <td>{{ $user->status }}</td>
                                <td>{{ $user->type }}</td>
                                <td>{{ $user->username }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
