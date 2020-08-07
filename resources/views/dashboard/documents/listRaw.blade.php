<tr data-xhr="document-list-{{$document->id}}">
    <td>
        @id($document)
    </td>
    <td>
        {{$document->title}}
    </td>
    <td>
        @if ($document->getRelationValue('attachments'))
            <a href="{{$document->attachments->get('original')->url}}" target="_blank">{{__('Document')}}</a>
        @else
            {{__('No attachment')}}
        @endif
    </td>
    <td>
        {{__(ucfirst($document->status))}}
    </td>
    <td>
        {{$document->notic}}
    </td>
    <td>
        {{$document->description}}
    </td>
    <td>
        <button class="btn btn-sm btn-clear p-0" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="far fa-cogs fs-12 text-primary"></i>
        </button>
        <div class="dropdown-menu">
            @if ($document->status == 'verified')
                <a href="{{route('dashboard.documents.update', $document->id)}}" data-xhrBase="raw" data-name="status" data-value="unverified" data-method="PUT" title="{{__('Unverify')}}" class="lijax dropdown-item fs-12">
                    <i class="far fa-minus-circle text-danger"></i> {{__('Unverify')}}
                </a>
            @else
                <a href="{{route('dashboard.documents.update', $document->id)}}" data-xhrBase="raw" data-name="status" data-value="verified" data-method="PUT" title="{{__('Verify')}}" class="lijax dropdown-item fs-12">
                    <i class="far fa-badge-check text-primary"></i> {{__('Verify')}}
                </a>
            @endif
        </div>
    </td>
</tr>
