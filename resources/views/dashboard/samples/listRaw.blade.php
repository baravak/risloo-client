<tr data-xhr="sample-list-{{$sample->id}}">
    <td>
        @can('dashboard.samples.management', $sample)
            @id($sample)
        @elseif(in_array($sample->status, ['seald', 'open']))
            @include('components._id', ['href' => route('samples.form', $sample->id), 'id' => $sample->serial])
        @else
            @include('components._id', ['id' => $sample->serial])
        @endcan
    </td>
    <td>
        {{ $sample->scale->title }} <sup>{{$sample->version}}</sup> <small>{{$sample->edition}}</small>
    </td>
    <td>
        @if ($sample->client)
            @displayName($sample->client)
        @else
        <span class="fs-10">
            {{__('Code')}}: {{$sample->code}}
        </span>
        @endif
    </td>
    <td>
        @room($sample->room)
    </td>
    <td>
        @if ($sample->case)
        <a href="{{route('dashboard.cases.show', $sample->case->id)}}">
            {{$sample->case->clients->pluck('user.name')->join(', ')}}
        </a>
        @endif
    </td>
    <td>
        {{__(ucfirst($sample->status))}}
    </td>
</tr>
