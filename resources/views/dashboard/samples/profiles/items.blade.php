<div class="page">
    <h1>پاسخ گویه‌ها</h1>
    <div class="row fs-10">
        @foreach ($sample->items as $item)
            <div class="col-1">
                {{$loop->index +1 }}: {{isset($item->user_answered) ? $item->user_answered : '-'}}
            </div>
        @endforeach
    </div>
</div>
