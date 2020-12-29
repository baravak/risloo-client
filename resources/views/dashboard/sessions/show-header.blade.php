<div class="card-header" data-xhr="session-header">
    {{ __('Therapy session') }} <small>({{ __($session->status) }})</small>
    @can('dashboard.cases.isClient', [$session->case])
    @if ($session->status == 'client_awaiting')
        <a href="{{ route('dashboard.sessions.sessionUpdate', [$session->id]) }}" data-method="PUT" data-name="status" data-value="session_awaiting" class="badge badge-primary p-1 lijax">{{ __('Accept') }}</a>
    @elseif($session->status == 'session_awaiting')
    <a href="{{ route('dashboard.sessions.sessionUpdate', [$session->id]) }}" data-method="PUT" data-name="status" data-value="canceled_by_client" class="badge badge-danger p-1 lijax">{{ __('Cancel') }}</a>
    @endif
    @endcan
</div>
