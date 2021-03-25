<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-4">
    @foreach ($cases as $case)
        @include('dashboard.cases.item')
    @endforeach
</div>

{{ $cases->links() }}