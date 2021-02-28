@foreach ($assessments as $assessment)
<span data-id="{{ $assessment->id }}">
<span data-selection>
    {{ $assessment->title }}
</span>
</span>
@endforeach
