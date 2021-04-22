<?php

namespace App\Http\Controllers\Dashboard;

use App\Session;
use App\Room;
use App\TherapyCase;
use App\Practice;
use App\SessionDashboard;
use Illuminate\Http\Request;
use jDate;
class SessionController extends Controller
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
        // $this->data->module->singular = 'reserve';
    }
    public function index(Request $request)
    {
        $this->data->sessions = $sessions = Session::apiIndex($request->all());
        if($request->instance && $request->header('data-xhr-base')){
                $this->data->global = $sessions->map(function($session){
                    return ['id' => $session->id, 'title' => $session->id];
                });
            return $this->view($request, 'dashboard.sessions.select2');
        }
        return $this->view($request, 'dashboard.sessions.index');
    }

    public function create(Request $request)
    {
        $this->data->global->title = __('Create new session');
        $case = $this->data->case = TherapyCase::apiShow($request->case);
        $room = $this->data->room = $case->room;
        $center = $this->data->center = $room->center;
        return $this->view($request, 'dashboard.sessions.create');
    }

    public function edit(Request $request, Session $session)
    {
        $this->data->global->title = __('Edit session');
        $this->authorize('dashboard.sessions.update', [$session]);

        $this->data->session = $session;
        $this->data->case = $session->case;
        $this->data->room = $session->room;
        $this->data->center = $this->data->room->center;
        $this->data->module->action = 'edit';
        return $this->view($request, 'dashboard.schedules.create');
    }
    public function store(Request $request, $case)
    {
        $session = Session::apiStore($case, $request->all());
        return $session->response()->json([
            'redirect' => route('dashboard.sessions.edit', $session->id)
        ]);
    }

    public function show(Request $request, $session)
    {
        $this->data->session = $session = SessionDashboard::apiDashboard($session);
        $practices = $this->data->practices = $session->practices;
        $samples = $this->data->samples = $session->samples;
        if($session->parentModel instanceof Room){
            $room = $this->data->room = $session->parentModel;
        }else{
            $case = $this->data->case = $session->parentModel;
            $room = $this->data->room = $case->room;
        }
        $center = $this->data->center = $room->center;
        $this->data->global->title = __('Therapy session :serial', ['serial' => $session->id]) ;
        return $this->view($request, 'dashboard.sessions.show');
    }

    public function update(Request $request, $session){
        $bind = [];
        if($request->callback){
            $bind['redirect'] = urldecode($request->callback);
        }
        return Session::apiUpdate($session, $request->all())->response()
        ->json($bind);
    }

    public function sessionUpdate(Request $request, $session){
        $session = $this->data->session = Session::apiUpdate($session, $request->all());
        return $this->view($request, 'dashboard.sessions.show-header');
    }
    public function createUser(Request $request, Session $session){
        $this->data->session = $session;
        $room = $this->data->room = $session->room;
        $case = $this->data->case = $session->case;
        $center = $this->data->center = $room->center;
        $this->authorize('addUser', $session);
        return $this->view($request, 'dashboard.sessions.createUser');
    }

    public function storeUser(Request $request, $session){
        Session::addUser($session, $request->all());
    }
}
