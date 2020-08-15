<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>@sortView($samples, 'id', __('Serial'))</th>
                <th>@sortView($samples, 'sample')</th>
                <th>@sortView($samples, 'client')</th>
                <th>
                    @sortView($samples, 'room')
                </th>
                <th>
                    @sortView($samples, 'case')
                </th>
                <th>
                    @sortView($samples, 'status')
                </th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($samples as $sample)
            @include('dashboard.samples.listRaw')
            @endforeach
        </tbody>
    </table>
</div>
