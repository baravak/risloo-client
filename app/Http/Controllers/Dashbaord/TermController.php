<?php
namespace App\Http\Controllers\Dashbaord;

use Illuminate\Http\Request;
use App\Term;

class TermController extends Controller
{
    public function index(Request $request)
    {
        $this->data['terms'] = Term::apiIndex($request->all(['order', 'sort']));
        return view('dashboard.terms.index', $this->data);
    }

    public function create(Request $request)
    {
        return view('dashboard.terms.create', $this->data);
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
        return view('dashboard.terms.create', $this->data);
    }

    public function update(Request $request, $term)
    {
        return Term::apiUpdate($term, $request->except('_method'))->response()->json(['redirect' => route('dashboard.terms.edit', ['id'=>$term])]);
    }
}
