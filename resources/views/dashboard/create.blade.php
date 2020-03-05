@extends($display->dashboard)

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-sm-8 col-md-8 col-lg-6 col-xl-4">
            <div class="card">
                <div class="card-header">@yield('create_title', __('Create'))</div>
                <form action="@yield('form_action', '')" method="POST">
                    <input type="hidden" name="_method" value="@yield('form_method', 'POST')">
                    <div class="card-body">
                        @yield('form_content')
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn {{$__env->yieldContent('form_method') == 'POST' || !$__env->yieldContent('form_method') ? 'btn-primary' : 'btn-success' }}">@yield('create_submit', __('Create'))</button>
                        @isset(app('router')->namedRoutes["$module->namespace.index"])
                            <a href="{{route("$module->namespace.index")}}" class="btn btn-light">{{ __('Cancel') }}</a>
                        @endisset
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
