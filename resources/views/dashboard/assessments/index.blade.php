@extends($layouts->dashboard)

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Assessments') }} <sup>({{ $assessments->total() }})</sup>
            @filterBadge($assessments)
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>@sortView($assessments, 'id', '#')</th>
                            <th>@sortView($assessments, 'scale')</th>
                            <th>@sortView($assessments, 'edition')</th>
                            <th>@sortView($assessments, 'version')</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($assessments as $assessment)
                            <tr>
                                <td>
                                    @id($assessment)
                                </td>
                                <td>
                                    {{$assessment->title}}
                                </td>
                                <td>
                                    {{$assessment->edition}}
                                </td>
                                <td>
                                    {{$assessment->version}}
                                </td>
                                <td>
                                    @can('dashboard.sessions.create')
                                        <a href="{{route('dashboard.samples.create', ['scale' => substr($assessment->id, 1)])}}" class="text-decoration-none">
                                            <i class="fas fa-flask fs-14"></i> {{__('Create sample')}}
                                        </a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
