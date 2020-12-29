<tr class="m-2" data-xhr="session-{{ $session->id }}">
    <td>@id($session)</td>
    <td class="direction-ltr text-left">
        <span class="d-block fs-12 font-weight-bold">
            @time($session->started_at, 'y-n-j')
        </span>
        <small class="d-block">
            @time($session->started_at, 'G:i')
        </small>
    </td>
    <td>
        <span class="d-inline-block">
            @duration($session->duration, 'minute')
        </span>
    </td>
    <td>
        {{ __($session->status) }}
        @can('dashboard.cases.isClient', [$case])
        @if ($session->status == 'client_awaiting')
            <a href="{{ route('dashboard.cases.sessions.sessionUpdate', [$case->id, $session->id]) }}" data-method="PUT" data-name="status" data-value="session_awaiting" class="badge badge-primary p-1 lijax">{{ __('Accept') }}</a>
        @elseif($session->status == 'session_awaiting')
        <a href="{{ route('dashboard.cases.sessions.sessionUpdate', [$case->id, $session->id]) }}" data-method="PUT" data-name="status" data-value="canceled_by_client" class="badge badge-danger p-1 lijax">{{ __('Cancel') }}</a>
        @endif
        @endcan
    </td>
    <td>
        @can('dashboard.cases.manager', [$case])
            @include('components._editLink', ['href' => route('dashboard.sessions.edit', ['session' => $session->id, 'callback' => route('dashboard.cases.show', $case->id)])])
        @endcan
        @can('dashboard.sessions.update', [$case , 'report'])
            @if ($session->is_reported)
                <a href="{{ route('dashboard.sessions.show', $session->id) }}" title="{{ __('See report') }}"><i class="fas fa-comment"></i></a>
            @else
                <a href="{{ route('dashboard.sessions.report.create', $session->id) }}" title="{{ __('Submit report') }}"><i class="far fa-comment-edit fs-14"></i></a>
            @endif
        @endcan
        <div class="dropdown fs-12">
            <button class="btn dropdown-toggle btn-sm p-0 fs-12" type="button" id="practice-{{ $session->id }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="far fa-chalkboard-teacher" title="{{ __('Practice') }}"></i>
                {{ __('Practice') }}
            </button>
            <div class="dropdown-menu fs-12" aria-labelledby="practice-{{ $session->id }}">
                @can('dashboard.cases.manager', [$case])
                <a class="dropdown-item" href="{{ route('dashboard.sessions.practices.create', ['session'=> $session->id, 'callback' => route('dashboard.cases.show', $case->id)]) }}">
                    <i class="far fa-file-plus"></i>
                    {{ __('Create practice') }}
                </a>
              @endcan
              <a class="dropdown-item" href="{{ route('dashboard.sessions.practices.index', ['session'=> $session->id]) }}">
                <i class="far fa-file-plus"></i>
                {{ __('Practices') }}
            </a>
            </div>
        </div>
    </td>
</tr>
