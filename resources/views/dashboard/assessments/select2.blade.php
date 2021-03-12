@foreach ($assessments as $assessment)
    <div data-id="{{ $assessment->id }}">
        <div data-selection>
            <div class="text-xs text-gray-700 font-semibold">{{ $assessment->scale->title }}</div>
            <div class="text-xs text-gray-400">{{ $assessment->edition ? __('Edition :title', ['title' => $assessment->edition]) . ' - ' : ''}} {{ __('Version :ver', ['ver' => $assessment->version]) }}</div>
        </div>
    </div>
@endforeach