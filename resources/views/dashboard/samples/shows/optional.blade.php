<label for="item-{{$loop->index}}" class="block mb-2 text-sm text-gray-700 font-medium">{{$loop->index + 1}} - {{isset($item->text) ? $item->text : ''}}</label>
<select type="text" data-action="{{urldecode(route('samples.storeItems', $sample->id, 1))}}" data-method="post" data-item="{{$loop->index + 1}}" data-name="items[{{$loop->index}}][1]" data-merge='{"items[{{$loop->index}}][0]" : {{$loop->index + 1}}}' data-lijax="change" id="item-{{$loop->index}}" placeholder="&nbsp;" disabled class="border border-gray-500 h-10 rounded px-4 w-full text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60 form-items d-notification">
    <option></option>
    @foreach ($item->answer->options as $option)
        <option {{isset($item->user_answered) && $item->user_answered == $loop->index +1 ? 'selected' : ''}} value="{{$loop->index + 1}}">
            @if ($item->answer->type == 'optional')
                {{$loop->index + 1}}: {{$option}}
            @else
                {{$loop->index + 1}}
            @endif
        </option>
    @endforeach
</select>
