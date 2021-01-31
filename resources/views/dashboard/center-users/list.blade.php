<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>@sortView($users, 'id', '#')</th>
                <th>@sortView($users, 'user')</th>
                <th>{{ __('Mobile') }}</th>
                <th class="d-none d-md-table-cell">@sortView($users, 'creator')</th>
                <th>
                    <span class="d-none d-md-inline">
                        @sortView($users, 'position') /
                        @sortView($users, 'status')
                    </span>
                    <span class="d-md-none">
                        @sortView($users, 'position', __('short_position')) /
                        @sortView($users, 'status', __('short_status'))
                    </span>
                </th>
                <th>
                    <span class="d-none d-md-inline">
                        @sortView($users, 'accepted_at')
                    </span>
                    <span class="d-md-none">
                        @sortView($users, 'accepted_at', __('Time'))
                    </span>
                </th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            @include('dashboard.center-users.listRaw')
            @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{$users->links()}}
        </div>
    </div>
</div>
