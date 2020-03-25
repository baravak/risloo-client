<?php
namespace App\Http\Controllers\Dashboard;

use App\Assessment;
use Illuminate\Http\Request;

class SampleController extends Controller
{
    public function index(Request $request)
    {
        $this->data->assessments = Assessment::apiIndex($request->all(['order', 'sort', 'parent', 'creator']));
        return $this->view($request, 'dashboard.samples.index');
    }

    public function create(Request $request)
    {
        if(isset($request->scale))
        {
            $this->data->assessment = Assessment::apiShow($request->scale);
        }
        return $this->view($request, 'dashboard.samples.create');
    }
}
