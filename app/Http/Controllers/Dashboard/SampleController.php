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
        return Sample::apiStore($request->all());
    }

    public function show(Request $request, $serial){
        $sample = $this->data->sample = Sample::apiShow($serial);
        $this->data->global->title = $sample->scale->title . ' - ' . $sample->client->name;
        return $this->view($request, 'dashboard.samples.show');
    }

    public function scoring(Request $request, $serial)
    {
        $scoring = $this->data->sample = Sample::scoring($serial);
        return $scoring->response()->json([
            'replace' => true,
            'redirect' => urldecode(route('dashboard.samples.show', $serial))
            ]);
    }

    public function profile(Request $request, $serial){
        $sample = $this->data->sample = Sample::apiShow($serial);
        $this->data->global->title = $sample->id;
        if($request->has('single')){
            $this->data->global->title .= '-single';
        }
        return $this->view($request, 'dashboard.samples.profile');
    }
}
