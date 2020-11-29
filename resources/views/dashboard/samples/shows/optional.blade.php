<select type="text" data-action="{{urldecode(route('samples.storeItems', $sample->id, 1))}}" data-method="post" data-item="{{$loop->index + 1}}" data-name="items[{{$loop->index}}][1]" data-merge='{"items[{{$loop->index}}][0]" : {{$loop->index + 1}}}' data-lijax="change" id="item-{{$loop->index}}" class="form-items form-control form-control-m font-weight-bold d-notification" placeholder="&nbsp;" disabled>
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
<label for="item-{{$loop->index}}">{{$loop->index + 1}} - {{isset($item->text) ? $item->text : ''}}</label>
