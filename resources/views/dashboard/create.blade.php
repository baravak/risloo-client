@extends($layouts->dashboard)
@section('content')
    @yield('before_content')
    @section('form-tag')
    @hasSection ('form_action')
        <form class="m-auto w-full md:w-1/2" action="@yield('form_action')" method="POST">
    @else
    <form class="m-auto w-full md:w-1/2" action="@yield('form_action', request()->create(isset(${$module->result}) ? ${$module->result}->route('update') : route("$module->resource.store", ($module->parent ? request()->route()->parameters[$module->parent] : null)), 'GET', request()->all())->getUri())" method="POST">
    @endif
        @csrf
        <input type="hidden" name="_method" value="{{$module->action == 'edit' ? 'PUT' : 'POST'}}">
        <div class="border border-gray-200 rounded p-4 mt-8">
            @yield('form_content')
        </div>
            <div class="mt-6">
                <button type="submit" class="inline-flex justify-center items-center h-9 px-8 bg-brand text-white text-sm rounded-full hover:bg-brand-600 transition ml-4 focus" title="@yield('form-title', __(($module->action == 'create' ? "Create " : 'Edit ') . $module->singular))" aria-label="@yield('form-title', __(($module->action == 'create' ? "Create " : 'Edit ') . $module->singular))" role="button">
                    @yield('form-title', __(($module->action == 'create' ? "Create " : 'Edit ') . $module->singular))
                </button>
                @if(request()->callback || isset($callbackCancel))
                    <a href="{{request()->callback ?: $callbackCancel}}" class="text-sm text-gray-500 hover:text-gray-700 transition">{{ __('Cancel') }}</a>
                @elseif(Route::has($module->resource . '.index'))
                    <a href="{{ route($module->resource . '.index', $module->parent ? request()->route()->parameters[$module->parent] : null) }}" class="text-sm text-gray-500 hover:text-gray-700 transition">{{ __('Cancel') }}</a>
                @endif
            </div>
    </form>
    @show
    @yield('other-card')
    @yield('other-content')
@endsection
