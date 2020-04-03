<?php

namespace App\Http\Controllers\Dashboard;

use App\Relationship;
use Illuminate\Http\Request;

class RelationshipController extends Controller
{
    public function index(Request $request)
    {
        $this->data->relationships = Relationship::apiIndex($request->all(['order', 'sort', 'parent', 'creator']));
        if(count($this->data->relationships) === 1)
        {
            if($request->ajax() && strpos(strtolower($request->headers->get('accept')), 'application/json') == false)
            {
                return [
                    'redirect' => route('dashboard.relationship.users.index', $this->data->relationships->get(0)->id)
                ];
            }
            elseif(!$request->ajax())
            {
                return redirect()->route('dashboard.relationship.users.index', $this->data->relationships->get(0)->id);
            }
        }
        return $this->view($request, 'dashboard.relationships.index');
    }
    public function create(Request $request)
    {
        $this->authorize('dashboard.relationships.create');
        return $this->view($request, 'dashboard.relationships.create');
    }

    public function store(Request $request)
    {
        $this->authorize('dashboard.relationships.create');
        return Relationship::apiStore($request->all());
    }

    public function update(Request $request, $relation)
    {
        Relationship::apiUpdate($relation, $request->all());
        return response()->json([
            'redirect' => route('dashboard.relationships.index')
        ]);
    }
}
