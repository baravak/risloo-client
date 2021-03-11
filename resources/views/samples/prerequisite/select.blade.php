<input type="hidden" name="prerequisites[{{$key}}][0]" value="{{$key+1}}">
<label for="prerequisite_{{$key}}"  class="block mb-2 text-sm text-gray-700 font-medium">{{ $item->text }}</label>
<select class="border border-gray-500 h-10 rounded px-4 w-full md:w-1/2 lg:w-1/3 text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60" placeholder="&nbsp;" name="prerequisites[{{$key}}][1]" id="prerequisite_{{$key}}">
    @foreach ($item->answer->options as $option_key => $option)
        <option value="{{$option_key+1}}" {!! isset($item->user_answered) && $item->user_answered == $option_key+1 ? 'selected' : '' !!}>{{$option}}</option>
    @endforeach
</select>
