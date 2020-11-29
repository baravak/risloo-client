<?php

namespace App\Http\Controllers\Dashboard;

use App\Session;
use Illuminate\Http\Request;

class SessionReportController extends Controller
{
    public function create(Request $request, Session $session){
        // dd($session);
    }
}
