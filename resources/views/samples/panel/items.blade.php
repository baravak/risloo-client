@foreach ($sample->items as $key => $item)
    @isset($sample->entities)
        @foreach ($sample->entities as $entKey => $entity)
            @if ($entity->offset == $key)
                @include('samples.panel.entities')
            @endif
        @endforeach
    @endisset
    <div  data-nav="{{ $key+1 }}" data-title="{{ $key+1 }}" class="hidden" data-type="item" data-answer-type="{{ $item->answer->type }}" data-answer="{{ isset($item->user_answered) ? $item->user_answered : null }}">
        @isset($item->category)
        <h4 class="text-gray-700 mb-2">{{ $item->category }}</h4>
        @endisset
        @include('samples.items.types.' . $item->type)
        @isset($item->description)
            <p class="text-sm mb-8">{{ $item->description }}</p>
        @endisset
        <div id="item-section">
            @include('samples.items.answers.' . $item->answer->type)
        </div>
    </div>
@endforeach
