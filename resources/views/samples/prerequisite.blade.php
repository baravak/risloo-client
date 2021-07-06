<form action="{{ urldecode(route('samples.storeItems', $sample->id)) }}" method="post" id="prerequisite" class="d-notification">
    <div>
        @foreach ($sample->prerequisites as $key => $item)
            <input type="hidden" name="prerequisites[{{ $key }}][label]" value="{{ $item->label }}">
            <div class="mt-4">
                @include('samples.prerequisite.' . $item->answer->type)
            </div>
        @endforeach
    </div>
</form>
