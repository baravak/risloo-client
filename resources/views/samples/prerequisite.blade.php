<form action="{{ urldecode(route('samples.storeItems', $sample->id)) }}" method="post" id="prerequisite" class="d-notification">
    <div>
        @foreach ($sample->prerequisites as $item)
            @php
                $itemKey = $loop->index;
            @endphp
            <div class="mt-4">
                @include('samples.prerequisite.' . $item->answer->type)
            </div>
        @endforeach
    </div>
</form>
