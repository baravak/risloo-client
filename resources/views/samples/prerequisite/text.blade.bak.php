<input type="hidden" name="prerequisites[{{$itemKey}}][0]" value="{{$itemKey+1}}">
<input type="{{$item->answer->type}}" class="form-control form-control-m" id="prerequisite_{{$loop->index}}" name="prerequisites[{{$itemKey}}][1]" value="{!! isset($item->user_answered) ? $item->user_answered : '' !!}">
<label for="prerequisite_{{$loop->index}}">{{$item->text}}</label>
