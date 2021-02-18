<?php

namespace App\Http\Controllers\Dashboard;

use App\Assessment;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('dashboard.assessments.viewAny');
        $this->data->assessments = Assessment::apiIndex($request->all());
        return $this->view($request, $request->header('data-xhr-base') == 'quick_search'? 'dashboard.assessments.list-xhr' : 'dashboard.assessments.index');
    }

    public function show(Request $request, $term)
    {
        $this->authorize('dashboard.assessments.view');
        $this->data['term'] = Term::apiShow($term);
        return $this->view($request);
    }
}
