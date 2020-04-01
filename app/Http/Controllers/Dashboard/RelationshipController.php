<?php

namespace App\Http\Controllers\Dashboard;

use App\Relationship;
use Illuminate\Http\Request;

class RelationshipController extends Controller
{
    public function index(Request $request)
    {
        $this->data->relationships = Relationship::apiIndex($request->all(['order', 'sort', 'parent', 'creator']));
        return $this->view($request, 'dashboard.relationships.index');
    }
    public function create(Request $request)
    {
        return $this->view($request, 'dashboard.relationships.create');
    }

    public function store(Request $request)
    {
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
