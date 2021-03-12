<?php

namespace App\Http\Controllers\Dashboard;

use App\TherapyCase;
use App\TherapyCaseUser;
use Illuminate\Http\Request;

class CaseUserController extends Controller
{
    public function index(Request $request, $case)
    {
        if(!$request->ajax())
        {
            return redirect()->route('dashboard.cases.show', $case);
        }
        return TherapyCaseUser::apiIndex($case, $request->all())->response()->json();
    }

    public function store(Request $request, $case)
    {
        return TherapyCaseUser::apiStore($case, $request->all())->response()->json(['redirect' => route('dashboard.cases.show', $case)]);
    }

    public function create(Request $request, $TherapyCase)
    {
        $case = $this->data->case = TherapyCase::apiShow($TherapyCase);
        $room = $this->data->room = $case->room;
        $center = $this->data->center = $room->center;
        return $this->view($request, 'dashboard.case-users.create');
    }
}
