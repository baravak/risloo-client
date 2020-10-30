<tr data-xhr="session-list-{{$session->id}}">
    <td class="align-middle">
        @id($session)
    </td>
    <td class="align-middle">
        @room($session->case->room)
    </td>
    <td class="align-middle">
        @id($session->case)
    </td>
    <td class="align-middle">
        @displayName($session->client)
    </td>
    <td class="align-middle">
        <span class="d-block fs-12 font-weight-bold">
            @time($session->started_at, 'y-n-j')
        </span>
        <small class="d-block">
            @time($session->started_at, 'G:i')
        </small>
    </td>
    <td class="align-middle">
            @duration($session->duration, 'minute')
    </td>
    <td class="align-middle">
        {{ __($session->status) }}
    </td>
    <td class="align-middle">
        @editLink($session)
    </td>
</tr>
