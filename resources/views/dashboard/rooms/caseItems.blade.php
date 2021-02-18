<div data-xhr="case-items">
    @if ($cases && $cases->count())
        @include('dashboard.cases.items')
    @else
        @include('dashboard.emptyContent')
    @endif
</div>
