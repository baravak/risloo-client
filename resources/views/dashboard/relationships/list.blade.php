
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>@sortView($relationships, 'creator')</th>
                <th>@sortView($relationships, 'owner')</th>
                <th>@sortView($relationships, 'manager')</th>
                <th>@sortView($relationships, 'type')</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($relationships as $relationship)
                <tr>
                    <td>
                        <a href="{{$relationship->creator->route('show')}}">
                            @displayName($relationship->creator)
                        </a>
                    </td>
                    <td>
                        <a href="{{$relationship->owner->route('show')}}">
                            @displayName($relationship->owner)
                        </a>
                    </td>
                    <td>
                        <a href="{{$relationship->manager->route('show')}}">
                            @displayName($relationship->manager)
                        </a>
                    </td>
                    <td>
                        {{__(ucfirst($relationship->type))}}
                    </td>
                    <td>
                        @can('details', $relationship)
                            <a href="{{route('dashboard.relationship.users.index', $relationship->id)}}" class="text-primary text-decoration-none">
                                <i class="far fa-address-book"></i>
                                {{__('Members')}}
                            </a>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
