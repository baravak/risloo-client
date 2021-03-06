@extends($layouts->dashboard)
@section('content')
    <div>
        <div class="dropdown">
            <button>پایین‌افتنده</button>
            <div>
                <a href="#">خانه</a>
                <a href="#">درباره</a>
                <a href="#">تماس</a>
            </div>
        </div>
    </div>
    @include('dashboard.home.cases')
    @include('dashboard.home.samples')
    @include('dashboard.home.rooms')
    @include('dashboard.home.centers')
@endsection