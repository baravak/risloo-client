@extends($layouts->dashboard)

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Document') }} <sup>({{$documents->total()}})</sup>
            @filterBadge($documents)
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>@sortView($documents,'id', '#')</th>
                            <th>@sortView($documents,'title', __('Title'))</th>
                            <th>@sortView($documents,'notic', __('Notic'))</th>
                            <th>@sortView($documents,'user', __('User'), '<i class="fas fa-at"></i>')</th>
                            <th>@sortView($documents,'term', __('Term'), '<i class="far fa-tags"></i>')</th>
                            <th>@sortView($documents,'document', __('Attachment'), '<i class="far fa-paperclip"></i>')</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($documents as $document)
                            <tr>
                                <td>
                                    @if ($document->verified)
                                        <i class="fas fa-badge-check text-primary fs-16"></i>
                                    @endif
                                    @id($document)
                                </td>
                                <td>
                                    {{$document->title}}
                                </td>
                                <td>
                                    {{$document->notic}}
                                </td>
                                <td>
                                    <a href="{{route('dashboard.users.show', ['id' => $document->user->id])}}">@displayName($document->user)</a>
                                </td>
                                <td>
                                    @termBadge($document->terms[0])
                                </td>
                                <td>
                                    @if (empty($document->documents))
                                    <span class="badge badge-warning text-light">{{__('Reserved')}}</span>
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-clear p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="far fa-cogs fs-12 text-primary"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a href="{{route('dashboard.documents.edit', ['id' => $document->id])}}" title="{{__('Edit')}}" class="dropdown-item fs-12">
                                            <i class="far fa-user-cog text-primary"></i> {{__('Edit')}}
                                        </a>
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
