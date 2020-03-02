<?php

namespace App\Http\Controllers\Dashbaord;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('dashboard.home.index', $this->data);
    }
}
