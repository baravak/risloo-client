<?php

namespace App\Http\Controllers\Dashboard;

use App\Session;
use Illuminate\Http\Request;

class SessionReportController extends Controller
{
    public function create(Request $request, Session $session){
        $this->data->session = $session;
        return $this->view($request, 'dashboard.sessions.reports.create');
    }
    public function store(Request $request, $session){
        return Session::apiUpdate($session, $request->all())->response()->json();
    }
}
