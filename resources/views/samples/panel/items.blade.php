@foreach ($sample->items as $key => $item)
    <div  data-nav="{{ $key+1 }}" data-title="{{ $key+1 }}" class="hidden" data-type="item" data-autonext>
        @include('samples.items.types.' . $item->type)
        <div id="item-section">
            @include('samples.items.answers.' . $item->answer->type)
        </div>
    </div>
@endforeach
