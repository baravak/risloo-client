<div class="mb-4">
<label>{{$item->text}}</label>
@foreach ($item->answer->options as $option)
<div class="richak richak-xs richak-secondary richak-radio">
    <input type="radio" name="prerequisite[{{$itemKey+1}}]" id="prerequisite_{{$itemKey}}-{{$loop->index}}" value="{{$loop->index+1}}" checked>
    <label for="prerequisite_{{$itemKey}}-{{$loop->index}}">
        <span class="richak-icon"></span>
        <span>{{$option}}</span>
    </label>
</div>
@endforeach
</div>
