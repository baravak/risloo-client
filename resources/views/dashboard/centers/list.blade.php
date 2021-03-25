<div  data-xhr="center-items">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 2xl:grid-cols-5 gap-4">
        @if ($centers->count())
            @foreach ($centers as $center)
                @include('dashboard.centers.listRaw')
            @endforeach
        @else
            @include('dashboard.emptyContent')
        @endif
    </div>
    {{ $centers->links() }}
</div>
