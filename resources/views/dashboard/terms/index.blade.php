@extends($layouts->dashboard)

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Term') }} <sup>({{ $terms->total() }})</sup>
            @filterBadge($terms)
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>@sortView($terms, 'id', '#')</th>
                            <th>@sortView($terms, 'title', __('Title'))</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($terms as $term)
                            <tr>
                                <td>
                                    @id($term)
                                </td>
                                <td>
                                    {{ $term->title }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
