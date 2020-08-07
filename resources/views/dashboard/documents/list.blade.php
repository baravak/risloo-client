<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>@sortView($documents, 'id', '#')</th>
                <th>{{__('Title')}}</th>
                <th>{{__('Attachment')}}</th>
                <th>
                    {{__('Status')}}
                    @filterView($documents, 'status')
                </th>
                <th>{{__('Notic')}}</th>
                <th>{{__('Description')}}</th>
                <th>تنظیمات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($documents as $document)
            @include('dashboard.documents.listRaw')
            @endforeach
        </tbody>
    </table>
</div>
