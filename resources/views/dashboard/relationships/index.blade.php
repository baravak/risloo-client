@extends($layouts->dashboard)

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Relationships') }} <sup>({{ $relationships->total() }})</sup>
            @filterBadge($relationships)
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>@sortView($relationships, 'id', '#')</th>
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
                                    @id($relationship)
                                </td>
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
                                    <a href="{{route('dashboard.relationship.users.index', $relationship->id)}}" class="fs-14 text-decoration-none">
                                        <i class="far fa-address-book"></i>
                                        {{__('Users')}}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
