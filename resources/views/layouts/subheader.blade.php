<div id="subheader" class="subheader py-3">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-baseline">
            <div class="d-flex align-items-baseline">
                <h3 class="subheader-title">{{__('Dashboard')}}</h3>
                @if (DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::exists(app('request')->route()[1]['as']))
                    {{ DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render(app('request')->route()[1]['as'], get_defined_vars()) }}
                @endif
                @isset(app('router')->namedRoutes["$module->namespace.create"])
                    <a href="{{route("$module->namespace.create")}}" class="badge badge-success mx-2">{{__("$module->namespace.create")}}</a>
                @endif
            </div>
            <div></div>
        </div>
    </div>
</div>
