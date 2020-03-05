@extends($display->dashboard)

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Users') }} <sup>({{$documents->total()}})</sup>
            @filterBadge($documents)
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>@sortView($documents,'id', '#')</th>
                            <th>@sortView($documents,'verified', __('documents.verified'))</th>
                            <th>@sortView($documents,'email', __('documents.email'), '<i class="far fa-envelope"></i>')</th>
                            <th>@sortView($documents,'mobile', __('documents.mobile'), '<i class="fas fa-mobile-alt"></i>')</th>
                            <th class="d-none d-sm-table-cell">
                                @sortView($documents,'gender', __('documents.gender'), '<i class="fas fa-venus-mars"></i>')
                                @filterView($documents, 'gender')
                            </th>
                            <th>
                                @sortView($documents,'status', __('documents.status'), '<i class="fas fa-user-shield"></i>')
                                @filterView($documents, 'status')
                            </th>
                            <th>
                                @sortView($documents,'type', __('documents.type'), '<i class="fas fa-award"></i>')
                                @filterView($documents, 'type')
                            </th>
                            <th>@sortView($documents,'username', __('documents.username'), '<i class="fas fa-at"></i>')</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($documents as $document)
                            <tr>
                                <td>@id($document)</td>
                                <td>{{ $document->verified }}</td>
                                <td>@email($document->email)</td>
                                <td>@mobile($document->mobile)</td>
                                <td class="d-none d-sm-table-cell">{{ $document->gender ? __("gender.{$document->gender}") : '' }}</td>
                                <td>
                                    <span class="d-none d-sm-inline">
                                        {{ __("status.{$document->status}") }}
                                    </span>
                                    <span class="d-sm-none">
                                        {{ mb_substr(__("status.{$document->status}"), 0, 2) }}
                                    </span>

                                </td>
                                <td>
                                    <span class="d-none d-sm-inline">
                                        {{ __("type.{$document->type}") }}
                                    </span>
                                    <span class="d-sm-none">
                                        {{ mb_substr(__("type.{$document->type}"), 0, 2) }}
                                    </span>
                                </td>
                                <td>@username($document->username)</td>
                                <td>
                                    <button class="btn btn-sm btn-clear p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="far fa-cogs fs-12 text-primary"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a href="{{route('dashboard.documents.edit', ['id' => $document->id])}}" title="{{__('Edit')}}" class="dropdown-item fs-12">
                                            <i class="far fa-user-cog text-primary"></i> {{__('Edit')}}
                                        </a>
                                        @if (app('request')->user()->type == 'admin')
                                        <a href="{{route('login.as', ['id' => $document->id])}}" class="dropdown-item fs-12">
                                            <i class="fal fa-user-secret text-primary"></i> {{__('Login to this...')}}
                                        </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
