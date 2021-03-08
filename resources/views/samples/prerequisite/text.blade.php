<input type="hidden" name="prerequisites[{{ $key }}][0]" value="{{ $key+1 }}">
<label for="prerequisite_{{ $loop->index }}" class="block mb-2 text-sm text-gray-700 font-medium">{{ $item->text }}</label>
<input type="{{ $item->answer->type }}" id="prerequisite_{{ $loop->index }}" name="prerequisites[{{ $key }}][1]" value="{!! isset($item->user_answered) ? $item->user_answered : '' !!}" class="border border-gray-500 h-10 rounded px-4 w-full md:w-1/2 lg:w-1/3 text-sm focus:border-brand focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-opacity-60">
