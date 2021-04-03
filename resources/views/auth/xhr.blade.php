<div data-xhr="form">
    @hasSection ('auth-form')
        <form action="{{ route($route, $theoryRouteParms) }}" method="POST" data-form-page="auth" class="active">
            @csrf
            @yield('auth-form')
        </form>
    @else
    @yield('form')
    @endif
    @yield('auth-nav')
</div>
