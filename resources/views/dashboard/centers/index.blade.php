@extends($layouts->dashboard)

@section('content')
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{$centers->links()}}
        </div>
    </div>

    @include($centers->count() ? 'dashboard.centers.list' : 'dashboard.emptyContent')

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{$centers->links()}}
        </div>
    </div>
@endsection
