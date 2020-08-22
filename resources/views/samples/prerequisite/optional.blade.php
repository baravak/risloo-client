<div class="mb-4">
<label>{{$item->text}}</label>
<input type="hidden" name="prerequisites[{{$itemKey}}][0]" value="{{$itemKey+1}}">
@foreach ($item->answer->options as $option)
<div class="richak richak-xs richak-secondary richak-radio">
    <input type="radio" name="prerequisites[{{$itemKey}}][1]" id="prerequisite_{{$itemKey}}-{{$loop->index}}" value="{{$loop->index+1}}" checked>
    <label for="prerequisite_{{$itemKey}}-{{$loop->index}}">
        <span class="richak-icon"></span>
        <span>{{$option}}</span>
    </label>
</div>
@endforeach
</div>
