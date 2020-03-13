<?php
namespace App\Http\Controllers\Dashbaord;

use App\Assessment;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    public function index(Request $request)
    {
        $this->data['assessments'] = Assessment::apiIndex($request->all(['order', 'sort', 'parent', 'creator']));
        return $this->view($request);
    }

    public function create(Request $request)
    {
        return $this->view($request);
    }

    public function store(Request $request)
    {
        return Term::apiStore($request->except('_method'))->response()->json([
            'redirect' => route('dashboard.terms.create')
        ]);
    }

    public function edit(Request $request, $term)
    {
        $this->data['term'] = Term::apiShow($term)->check('edit');
        return $this->view($request);
    }

    public function update(Request $request, $term)
    {
        return Term::apiUpdate($term, $request->except('_method'))->response()->json(['redirect' => route('dashboard.terms.edit', ['id'=>$term])]);
    }

    public function show(Request $request, $term)
    {
        $this->data['term'] = Term::apiShow($term);
        return $this->view($request);
    }
}
