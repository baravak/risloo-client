@extends($layouts->dashboard)

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Terms') }} <sup>({{ $sample->total() }})</sup>
            @filterBadge($sample)
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>@sortView($sample, 'id', '#')</th>
                            <th>@sortView($sample, 'title')</th>
                            <th>
                                @sortView($sample, 'parent')
                                @filterView($sample, 'parent')
                            </th>
                            <th>
                                @sortView($sample, 'creator')
                                @filterView($sample, 'creator')
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sample as $term)
                            <tr>
                                <td>
                                    @id($term)
                                </td>
                                <td>
                                    {{ $term->title }}
                                </td>
                                <td>
                                    @foreach ($term->parents as $parent)
                                        <a href="{{ route('dashboard.sample.show', ['id' => $parent]) }}"  class="badge badge-secondary">{{ $parent->title }}</a>
                                    @endforeach
                                </td>
                                <td>
                                    {{ $term->creator->name ?: $term->creator->id }}
                                </td>
                                <td>
                                    @if ($term->can('edit'))
                                        <a href="{{route('dashboard.sample.edit', ['id' => $term->id])}}" title="{{__('Edit')}}">
                                            <i class="far fa-user-cog text-primary"></i>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
