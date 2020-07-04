<select class="form-control form-control-m" placeholder="&nbsp;" name="prerequisite[{{$itemKey+1}}]" id="prerequisite_{{$loop->index}}">
    @foreach ($item->answer->options as $option)
        <option value="{{$loop->index+1}}" {!! isset($item->user_answered) && $item->user_answered == $loop->index+1 ? 'selected' : '' !!}>{{$option}}</option>
    @endforeach
</select>
<label for="prerequisite_{{$loop->index}}">{{$item->text}}</label>
