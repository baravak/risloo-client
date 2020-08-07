@extends($layouts->dashboard)

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            {{ __('Users of :center', ['center' => $center->detail->title]) }} <sup>({{ $users->total() }})</sup>
            @filterBadge($users)
        </div>
        <div class="card-body p-0">
            @include('dashboard.center-users.list')
        </div>
    </div>
@endsection
