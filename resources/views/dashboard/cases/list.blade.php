<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>@sortView($cases, 'id', '#')</th>
                <th>{{__('Title')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cases as $case)
            @include('dashboard.cases.listRaw')
            @endforeach
        </tbody>
    </table>
</div>
