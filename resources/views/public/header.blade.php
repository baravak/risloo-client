@section('header')
    <nav class="navbar navbar-expand-lg navbar-dark navbar-main">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('/public/images/logo/logo.svg') }}" alt="" height="32">
                <span class="font-weight-bold">ریسلو</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link fs-14" href="#home">خانه</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-14" href="#features">ویژگی‌ها</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-14" href="#benefits">مزایا</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-14" href="#blog">بلاگ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-14" href="#endorsement">نظر اساتید</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-14" href="#services">خدمات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-14" href="#target">جامعه هدف</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-14" href="#price">هزینه‌ها</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-14 direct" href="/auth">ورود</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-14 direct" href="/register">عضویت</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@endsection
