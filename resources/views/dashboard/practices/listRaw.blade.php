<tr data-xhr="practice-list-{{$practice->id}}">
    <td>
        @id($practice)
    </td>
    <td>
        {{$practice->title}}
    </td>
    <td>
        {{$practice->content}}
    </td>
    <td>
        @if ($practice->getRelationValue('attachments'))
            <a href="{{$practice->attachments->get('original')->url}}" target="_blank">{{__('practice')}}</a>
        @else
            {{__('No attachment')}}
        @endif
    </td>
    <td>
        {{$practice->notic}}
    </td>
    <td>
    </td>
</tr>
