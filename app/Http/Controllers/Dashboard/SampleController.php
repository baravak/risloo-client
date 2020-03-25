<?php
namespace App\Http\Controllers\Dashboard;

use App\Assessment;
use App\User;
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
            $this->data->scale = Assessment::apiShow($request->scale);
        }
        if (isset($request->client)) {
            $this->data->client = User::apiShow($request->client);
        }
        return $this->view($request, 'dashboard.samples.create');
    }
}
