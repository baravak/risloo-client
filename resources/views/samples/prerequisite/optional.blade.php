<div class="mb-4">
<label>{{$item->text}}</label>
<input type="hidden" name="prerequisites[{{$key}}][0]" value="{{$key+1}}">
@foreach ($item->answer->options as $option_key => $option)
<div class="richak richak-xs richak-secondary richak-radio">
    <input type="radio" name="prerequisites[{{$key}}][1]" id="prerequisite_{{$key}}-{{$option_key}}" value="{{$option_key+1}}" checked>
    <label for="prerequisite_{{$key}}-{{$option_key}}">
        <span class="richak-icon"></span>
        <span>{{$option}}</span>
    </label>
</div>
@endforeach
</div>
