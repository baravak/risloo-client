@extends($display->app)
@section('body-content')
    <div class="enter-bg">
        {{-- <div id="particles"></div> --}}
        <div class="enter d-flex justify-content-center align-items-center">
            <div class="enter-inner">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="text-center mb-2">
                            <a href="#" class="enter-logo">
                                <img src="images/logo/logo.svg" alt="Logo">
                            </a>
                        </div>

                        <h1 class="h5 text-center mb-4">
                            <a href="#" class="text-white text-decoration-none">Sarkoot</a>
                        </h1>

                        <div data-xhr="form">
                            @yield('auth-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
