<?php

namespace App\Http\Controllers\Dashboard;

use App\Practice;
use App\Session;
use Illuminate\Http\Request;

class PracticeController extends Controller
{
    public function index(Request $request, $session)
    {
        $practices = $this->data->practices = Practice::apiIndex($session, $request->all());
        $session = $this->data->session = $practices->parentModel;
        return $this->view($request, 'dashboard.practices.index');
    }

    public function create(Request $request, Session $session)
    {
        $this->data->global->title = __('Create new practice');
        $this->data->session = $session;
        $case = $this->data->case = $session->case;
        $room = $this->data->room = $case->room;
        $center = $this->data->center = $room->center;
        $this->authorize('dashboard.sessions.practices.create', $session);
        return $this->view($request, 'dashboard.practices.create');
    }
    public function store(Request $request, $session)
    {
        Practice::apiStore($session, $request->all(), 'POST');
        return [
            'redirect' => route('dashboard.sessions.show', $session)
        ];
    }

    public function update(Request $request, $practice)
    {
        $response = Practice::apiUpdate($practice, $request->all());
        if($request->headers->get('data-xhr-base') == 'raw')
        {
            return $this->view($request, 'dashboard.practices.listRaw', ['practi$practice' => $response]);
        }
        return $response->response()->json(['redirect' => route('dashboard.practices.index')]);
    }

    public function show(Request $request, $session, $practice){
        $practice = $this->data->practice = Practice::apiShow($session, $practice, $request->all());
        return $this->view($request, 'dashboard.practices.show');
    }

    public function storeHomework(Request $request, $session, $practice){
        $practice = Practice::homeworkStore($session, $practice, $request->all());
            return $this->view($request, 'dashboard.sessions.practiceRaw', ['practice' => $practice, 'session' => $practice->parentModel]);
    }
}
