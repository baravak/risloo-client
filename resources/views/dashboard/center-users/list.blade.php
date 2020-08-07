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
            @include('dashboard.center-users.listRaw')
            @endforeach
        </tbody>
    </table>
</div>
