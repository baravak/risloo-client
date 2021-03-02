<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>@sortView($sessions, 'id', '#')</th>
                <th>{{__('Room')}}</th>
                <th>
                    {{__('Case')}}
                </th>
                <th>{{__('Client')}}</th>
                <th>{{__('Start time')}}</th>
                <th>{{__('Session duration')}}</th>
                <th>{{__('Status')}}</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sessions as $session)
            @include('dashboard.sessions.listRaw')
            @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{$sessions->links()}}
        </div>
    </div>
</div>
