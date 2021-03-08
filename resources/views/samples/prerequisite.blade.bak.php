<form action="{{urldecode(route('samples.storeItems', $sample->id))}}" method="post" id="prerequisite" class="d-notification">
    <div class="col-6">
    @foreach ($sample->prerequisites as $item)
    @php
        $itemKey = $loop->index;
    @endphp
    <div class="form-group form-group-m">
        @include('samples.prerequisite.' . $item->answer->type)
    </div>
    @endforeach
    </div>
</form>
