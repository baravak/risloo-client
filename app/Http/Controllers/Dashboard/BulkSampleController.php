<?php

namespace App\Http\Controllers\Dashboard;

use App\BulkSample;
use Illuminate\Http\Request;

class BulkSampleController extends Controller
{
    public function index(Request $request)
    {
        $bulkSamples = $this->data->bulkSamples = BulkSample::apiIndex($request->all());

        return $this->view($request, 'dashboard.bulk-samples.index');
    }

    public function show(Request $request, BulkSample $bulkSample){
        $this->data->bulkSample = $bulkSample;
        $room = $this->data->room = $bulkSample->room;
        $center = $this->data->center = $room->center;
        return $this->view($request, 'dashboard.bulk-samples.show');
    }
}
