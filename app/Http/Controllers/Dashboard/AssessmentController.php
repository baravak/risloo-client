<?php

namespace App\Http\Controllers\Dashboard;

use App\Assessment;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('dashboard.assessments.viewAny');
        $assessments = $this->data->assessments = Assessment::apiIndex($request->all());

        switch($request->header('data-xhr-base')){
            case 'quick_search': $view = 'dashboard.assessments.list-xhr'; break;
            case 'select2':
                $view = 'dashboard.assessments.select2';
                $this->data->global = $assessments->map(function($assessment){
                    return ['id' => $assessment->id, 'title' => $assessment->title];
                });
                break;
            default : $view = 'dashboard.assessments.index';
        }
        return $this->view($request, $view);
    }

    public function show(Request $request, $term)
    {
        $this->authorize('dashboard.assessments.view');
        $this->data['term'] = Term::apiShow($term);
        return $this->view($request);
    }
}
