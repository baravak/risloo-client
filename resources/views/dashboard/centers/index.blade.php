@extends($layouts->dashboard)

@section('content')
    @include($centers->count() ? 'dashboard.centers.list' : 'dashboard.emptyContent')
    {{ $centers->links() }}
@endsection