@foreach (['session_awaiting', 'in_session', 'finished', 'canceled_by_client', 'canceled_by_center'] as $item)
    @if ($session->status != $item)
        <a class="dropdown-item" data-method="put" data-lijax href="{{ route('dashboard.sessions.update', $session->id) }}" data-name="status" data-value="{{ $item }}">{{ __($item) }}</a>
    @endif
@endforeach

