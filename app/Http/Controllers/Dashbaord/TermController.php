<?php
namespace App\Http\Controllers\Dashbaord;

use Illuminate\Http\Request;
use App\Term;

class TermController extends Controller
{
    public function index(Request $request)
    {
        $this->data['terms'] = Term::apiIndex($request->all(['order', 'sort', 'parent', 'creator']));
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
        $this->data['term'] = Term::apiShow($term);
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
