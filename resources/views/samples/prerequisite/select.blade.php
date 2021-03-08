<input type="hidden" name="prerequisites[{{$itemKey}}][0]" value="{{$itemKey+1}}">
<label for="prerequisite_{{$loop->index}}"  class="block mb-2 text-sm text-gray-700 font-medium">{{ $item->text }}</label>
<select class="w-full md:w-1/2 lg:w-1/3" placeholder="&nbsp;" name="prerequisites[{{$itemKey}}][1]" id="prerequisite_{{$loop->index}}">
    @foreach ($item->answer->options as $option)
        <option value="{{$loop->index+1}}" {!! isset($item->user_answered) && $item->user_answered == $loop->index+1 ? 'selected' : '' !!}>{{$option}}</option>
    @endforeach
</select>
