@extends($layouts->dashboard)

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Samples') }} <sup>({{ $samples->total() }})</sup>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>@sortView($samples, 'id', '#')</th>
                            <th>@sortView($samples, 'title')</th>
                            <th>
                                @sortView($samples, 'parent')
                                @filterView($samples, 'parent')
                            </th>
                            <th>
                                @sortView($samples, 'creator')
                                @filterView($samples, 'creator')
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($samples as $sample)
                            <tr>
                                <td>
                                    @id($sample)
                                </td>
                                <td>
                                    {{ $sample->title }}
                                </td>
                                <td>

                                </td>
                                <td>
                                </td>
                                <td>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
