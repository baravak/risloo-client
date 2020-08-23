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
        $case = TherapyCase::apiStore($request->room_id, $request->except('room_id'));
        return $case->response()->json([
            'redirect' => route('dashboard.cases.show', $case->id)
        ]);
    }

    public function show(Request $request, TherapyCase $case)
    {
        $this->data->case = $case;
        return $this->view($request, 'dashboard.cases.show');

    }
}
