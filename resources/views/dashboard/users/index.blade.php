@extends('dashboard.app')

@section('content')
    <div class="card mb-3">
        <div class="card-header">کاربران</div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>نام</th>
                            <th>رایانامه</th>
                            <th>تلفن همراه</th>
                            <th>جنسیت</th>
                            <th>وضعیت</th>
                            <th>نوع</th>
                            <th>شناسه کاربری</th>
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
