<input type="{{$item->answer->type}}" class="form-control form-control-m" id="prerequisite_{{$loop->index}}" name="prerequisite[{{$itemKey+1}}]">
<label for="prerequisite_{{$loop->index}}">{{$item->text}}</label>
