<?php

namespace App\Http\Controllers\Dashboard;

use App\Session;
use Illuminate\Http\Request;

class SessionReportController extends Controller
{
    public function create(Request $request, Session $session){
        $this->authorize('dashboard.sessions.update', [$session, 'report']);
        $this->data->session = $session;
        $case = $this->data->case = $session->case;
        $room = $this->data->room = $case->room;
        $center = $this->data->center = $room->center;
        return $this->view($request, 'dashboard.sessions.reports.create');
    }
    public function store(Request $request, $session){
        return Session::apiUpdate($session, $request->all())->response()->json([
            'redirect' => route('dashboard.sessions.show', $session)
        ]);
    }
}
