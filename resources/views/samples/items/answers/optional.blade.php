@foreach ($item->answer->options as $option_key => $option)
<div class="sample-item-radio mb-4">
    <input type="radio" value="{{ $option_key + 1 }}" name="item-{{ $key + 1 }}" data-item="{{ $option_key + 1 }}" id="item-{{ $key+1 }}-{{ $option_key + 1 }}" class="absolute w-0 h-0 opacity-0"  data-keyboard="{{ $option_key + 1 }}" data-merge='[{{ $key+1 }}]' @radioChecked($item->user_answered, $option_key + 1)>
    <label for="item-{{ $key+1 }}-{{ $option_key + 1 }}">
        <span class="number">{{ $option_key + 1 }}</span>
        <span class="answer">{{ $option }}</span>
    </label>
</div>
@endforeach
