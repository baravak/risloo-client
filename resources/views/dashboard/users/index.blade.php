@extends('dashboard.app')

@section('content')
    <div class="card mb-3">
        <div class="card-header">{{ __('users') }}</div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>{{ __('users.name') }}</th>
                            <th>{{ __('users.email') }}</th>
                            <th>{{ __('users.mobile') }}</th>
                            <th>{{ __('users.gender') }}</th>
                            <th>{{ __('users.status') }}</th>
                            <th>{{ __('users.type') }}</th>
                            <th>{{ __('users.username') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->mobile }}</td>
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
