@foreach ($assessments as $assessment)
<span data-id="{{ $assessment->id }}">{{ $assessment->title }}</span>
@endforeach
