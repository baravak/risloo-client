<?php
namespace App\Http\Controllers\Dashboard;

use App\Assessment;
use App\Sample;
use App\User;
use Illuminate\Http\Request;

class SampleController extends Controller
{
    public function index(Request $request)
    {
        $this->data->samples = Sample::apiIndex($request->all(['order', 'sort', 'parent', 'creator']));
        return $this->view($request, 'dashboard.samples.index');
    }

    public function create(Request $request)
    {
        if(isset($request->scale))
        {
            $this->data->scale = Assessment::apiShow($request->scale);
        }
        if (isset($request->client)) {
            $client = User::apiShow($request->client);
            if($client->type == 'client')
            {
                $this->data->client = $client;
            }
        }
        return $this->view($request, 'dashboard.samples.create');
    }

    public function store(Request $request)
    {
        $sample = Sample::apiStore($request->all());
        dd($sample);

    }
}
