<?php

namespace App\Http\Controllers\Dashboard;

use App\Clinic;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    public function index(Request $request)
    {
        $this->data->clinics = Clinic::apiIndex();
        return $this->view($request, 'dashboard.clinics.index');
    }
    public function request(Request $request)
    {
        $this->data->clinics = Clinic::request($request->clinic_id);
        dd($this->data->clinics);
    }
}
