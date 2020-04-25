<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>@sortView($centers, 'owner', __('Title'))</th>
                {{-- <th>@sortView($centers, 'manager')</th> --}}
                <th>{{__('Acception status')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($centers as $center)
            @include('dashboard.centers.listRaw')
            @endforeach
        </tbody>
    </table>
</div>
