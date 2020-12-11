<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>@sortView($practices, 'id', '#')</th>
                <th>{{__('Title')}}</th>
                <th>{{__('Content')}}</th>
                <th>{{__('Attachment')}}</th>
                <th>{{__('Notic')}}</th>
                <th>{{__('Homework')}}</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($practices as $practice)
            @include('dashboard.practices.listRaw')
            @endforeach
        </tbody>
    </table>
</div>
