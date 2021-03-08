@if (in_array($sample->status, ['scoring', 'creating_files']))
    <span class="text-xs text-gray-500 cursor-default" data-samplsta="{{ $sample->id }}" data-xhr="sample-status-{{ $sample->id }}">
        <i class="fad fa-spinner-third animate-spin"></i>
    </span>
    @else
    <span class="text-xs text-gray-500 cursor-default"data-xhr="sample-status-{{ $sample->id }}">
        {{ __(ucfirst($sample->status)) }}
    </span>
    @endif
