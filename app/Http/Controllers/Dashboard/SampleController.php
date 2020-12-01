<?php
namespace App\Http\Controllers\Dashboard;

use App\Assessment;
use App\Policies\SamplePolicy;
use App\Sample;
use App\scoreResult;
use App\TherapyCase;
use App\User;
use Illuminate\Http\Request;

class SampleController extends Controller
{
    public function index(Request $request)
    {
        $this->data->samples = Sample::apiIndex($request->all());
        return $this->view($request, 'dashboard.samples.index');
    }

    public function create(Request $request)
    {
        $this->authorize('dashboard.samples.create');
        if(isset($request->scale))
        {
            $this->data->scale = Assessment::apiShow($request->scale);
        }
        if (isset($request->case)) {
            $this->data->case = TherapyCase::apiShow($request->case);
        }
        return $this->view($request, 'dashboard.samples.create');
    }

    public function store(Request $request)
    {
        $sample = Sample::apiStore($request->all());
        return $sample->response()->json([
            'redirect' => urldecode(route('dashboard.samples.index', ['ids' => $sample->pluck('id')->toArray()]))
        ]);
    }

    public function show(Request $request, $serial){
        $sample = $this->data->sample = Sample::apiShow($serial);
        $this->authorize('dashboard.samples.management', $sample);
        $this->data->global->title = $sample->scale->title . ' - ' . ($sample->client ? $sample->client->name : '');
        return $this->view($request, 'dashboard.samples.show');
    }

    public function scoring(Request $request, $serial)
    {
        $scoring = $this->data->sample = Sample::scoring($serial);
        return $scoring->response()->json();
    }
    public function close(Request $request, $serial)
    {
        $scoring = $this->data->sample = Sample::close($serial);
        return $scoring->response()->json([
            'replace' => true,
            'redirect' => urldecode(route('dashboard.samples.show', $serial))
        ]);
    }

    public function update(Request $request, $serial)
    {
        return Sample::apiUpdate($serial, $request->all())->response()->json();
    }

    public function open(Request $request, $serial)
    {
        $scoring = $this->data->sample = Sample::open($serial);
        return $scoring->response()->json([
            'replace' => true,
            'redirect' => urldecode(route('dashboard.samples.show', $serial))
        ]);
    }

    public function scoreResult(Request $request, $serial){
        $scoring = $this->data->scoring = scoreResult::result($serial);
        if($request->has('html')) {
            return $this->view($request, 'dashboard.samples.scales.' . substr($scoring->scale->id, 1));
        } else {
            return $scoring->response()->json();
        }
    }
}
