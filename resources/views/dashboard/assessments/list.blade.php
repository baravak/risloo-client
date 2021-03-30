<div data-xhr="assessment-items">
    <div class="overflow-x-auto">
        <div class="align-middle inline-block min-w-full">
            <div class="overflow-hidden border border-gray-200 rounded">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50 cursor-default">
                        <tr>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">{{ __('Serial') }}</th>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">{{ __('Scale') }}</th>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">{{ __('Edition') }}</th>
                            <th class="px-3 py-2 text-right text-xs variable-font-medium text-gray-500" scope="col">{{ __('Version') }}</th>
                            <th class="px-3 py-2" scope="col"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($assessments as $assessment)
                            @include($assessments && $assessments->count() ? 'dashboard.assessments.listRaw' : 'dashboard.assessments.emptyAssessments')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{$assessments->links()}}
</div>