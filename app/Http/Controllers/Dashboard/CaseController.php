<?php

namespace App\Http\Controllers\Dashboard;

use App\TherapyCase;
use Illuminate\Http\Request;

class CaseController extends Controller
{
    public function index(Request $request)
    {
        $this->data->cases = TherapyCase::apiIndex($request->all());
        return $this->view($request, 'dashboard.cases.index');
    }

    public function create(Request $request)
    {
        return $this->view($request, 'dashboard.cases.create');
    }
    public function store(Request $request)
    {
        return TherapyCase::apiStore($request->all());
    }

    public function show(Request $request, $relationship)
    {
        return TherapyCase::apiShow($relationship);
    }
}
