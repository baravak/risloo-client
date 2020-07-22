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
                            <th>@sortView($samples, 'id', __('Serial'))</th>
                            <th>@sortView($samples, 'sample')</th>
                            <th>@sortView($samples, 'client')</th>
                            <th>
                                @sortView($samples, 'room')
                            </th>
                            <th>
                                @sortView($samples, 'case')
                            </th>
                            <th>
                                @sortView($samples, 'status')
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($samples as $sample)
                            <tr>
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
                                    @displayName($sample->client)
                                </td>
                                <td>
                                    <div class="d-flex align-items-center fs-12">
                                        <div class="ml-2">
                                            <a href="#" class="media media-light rounded-circle">
                                            <span>
                                                @avatarOrName($sample->room->manager)
                                            </span>
                                        </a>
                                        </div>
                                        <div>
                                            <div class="font-weight-bold">
                                                @displayName($sample->room->manager)
                                            </div>
                                            <div>
                                                @if ($sample->room->manager->id == $sample->room->owner->id)
                                                    {{__('Personal clinic')}}
                                                @else
                                                    @displayName($sample->room->owner)
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    {{$sample->case->id}}
                                </td>
                                <td>
                                    {{__(ucfirst($sample->status))}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
