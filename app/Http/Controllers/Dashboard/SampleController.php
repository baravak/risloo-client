<?php
namespace App\Http\Controllers\Dashboard;

use App\Assessment;
use App\Room;
use App\Sample;
use App\SampleSummary;
use App\scoreResult;
use App\Session;
use App\TherapyCase;
use App\User;
use Illuminate\Http\Request;

class SampleController extends Controller
{
    public function index(Request $request)
    {
        $samples = $this->data->samples = SampleSummary::apiIndex($request->all());
        return $this->view($request, $request->header('data-xhr-base') == 'quick_search' ? 'dashboard.samples.list-xhr' : 'dashboard.samples.index');
    }

    public function create(Request $request)
    {
        $this->data->global->title = __('Create new sample') ;
        $this->authorize('dashboard.samples.create');
        if(isset($request->scale))
        {
            $scale = $this->data->scale = Assessment::apiShow($request->scale);
            $this->data->global->title = __('Create new sample in scale :scale' , ['scale' => $scale->title]) ;
    }
        if ($request->session) {
            $session = $this->data->session = Session::apiShow($request->session);
            $case = $this->data->case = $session->case;
            $room = $this->data->room = $case->room;
            $this->data->global->title = __('Create new sample for :type :serial', ['type' => __('Therapy session'), 'serial' => $session->id]) ;
        }elseif ($request->case) {
            $case = $this->data->case = TherapyCase::apiShow($request->case);
            $room = $this->data->room = $case->room;
            $this->data->global->title = __('Create new sample for :type :serial', ['type' => __('Case'), 'serial' => $case->id]) ;
        }elseif($request->room){
            $room = $this->data->room = Room::apiShow($request->room);
            $this->data->global->title = __('Create new sample for :type :serial', ['type' => __('Therapy room'), 'serial' => $room->id]) ;
        }
        return $this->view($request, 'dashboard.samples.create');
    }

    public function store(Request $request)
    {
        $sample = Sample::apiStore($request->all());
        if($sample instanceof Sample && substr($sample->id, 0, 2) == 'BS'){
            return response()->json([
                'redirect' => route('dashboard.bulk-samples.show', $sample->id)
            ]);
        }
        return $sample->response()->json([
            'redirect' => urldecode(route('dashboard.samples.index', ['ids' => $sample->pluck('id')->toArray()]))
        ]);
    }

    public function show(Request $request, $serial){
        $sample = $this->data->sample = is_string($serial) ? Sample::apiShow($serial) : $serial;
        $room = $this->data->room = $sample->room;
        $center = $this->data->center = $room->center;
        $case = $this->data->case = $sample->case;
        $this->authorize('dashboard.samples.management', $sample);
        $this->data->global->title = $sample->scale->title . ' - ' . ($sample->client ? $sample->client->name : '');
        return $this->view($request, 'dashboard.samples.show');
    }

    public function scoring(Request $request, $serial)
    {
        $sample = $this->data->sample = Sample::scoring($serial);
        if($sample->status == 'done'){
            return $this->show($request, $sample);
        }
        return response()->json([
            'redirect' => urldecode(route('dashboard.samples.show', $serial)),
            'lijax_type' => 'render'
        ]);
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
        $dones = $this->data->samples = Sample::statusCheck((array) $serial)->whereIn('status', ['done', 'closed']);
        if(!$dones->count()){
            return [];
        }
        return [
            'redirect' => urldecode(route('dashboard.samples.show', $dones->get(0)->id)),
            'lijax_type' => 'render'
        ];
    }
    public function statuCheck(Request $request){
        $dones = $this->data->samples = Sample::statusCheck((array) $request->samples)->whereIn('status', ['done', 'closed']);
        if(!$dones->count()){
            return [];
        }
        return $this->view($request, 'dashboard.samples.tables.status-list');
    }
}
