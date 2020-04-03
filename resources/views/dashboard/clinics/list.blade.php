
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>@sortView($clinics, 'id', '#')</th>
                <th>@sortView($clinics, 'owner', __('Title'))</th>
                <th>@sortView($clinics, 'manager')</th>
                <th>@sortView($clinics, 'type')</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clinics as $clinic)
                <tr>
                    <td>
                        @id($clinic)
                    </td>
                    <td>
                        <a href="{{$clinic->owner->route('show')}}">
                            @displayName($clinic->owner)
                        </a>
                    </td>
                    <td>
                        <a href="{{$clinic->manager->route('show')}}">
                            @displayName($clinic->manager)
                        </a>
                    </td>
                    <td>
                        {{__(ucfirst($clinic->type))}}
                    </td>
                    <td>
                        @if (!$clinic->joined_at)
                            <a href="{{route('dashboard.clinics.request')}}" data-lijax="click" data-method="POST" data-name="clinic_id" data-value="{{$clinic->id}}">{{__('Acception request')}}</a>
                        @elseif(!$clinic->accepted_at)
                            {{__('Awaiting')}}
                        @else
                            {{__('Accepted')}}
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
