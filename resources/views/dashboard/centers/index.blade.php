@extends($layouts->dashboard)

@section('content')
    @include($centers->count() ? 'dashboard.centers.list' : 'dashboard.emptyContent')

    <div class="flex justify-center">
        {{ $centers->links() }}
    </div>
@endsection