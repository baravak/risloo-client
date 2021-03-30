<div data-xhr="assessment-items">
    @include($assessments && $assessments->count() ? 'dashboard.assessments.assessmentsList' : 'dashboard.assessments.emptyAssessments')
    {{$assessments->links()}}
</div>