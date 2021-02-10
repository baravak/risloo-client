@if (Breadcrumbs::exists(\Route::getCurrentRoute()->getAction('as')))
    <nav class="flex items-center mb-4" data-xhr="subheader">
        {{ Breadcrumbs::render(\Route::getCurrentRoute()->getAction('as'), get_defined_vars()) }}
    </nav>
@endif