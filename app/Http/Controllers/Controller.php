<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\API;
use App\User;
use Illuminate\Database\Connection;
class Controller extends BaseController
{
    public $data = [];
    public function __construct(Request $request)
    {
        $this->data['title'] = $request->route()[1]['as'] ?? 'Title';
        $this->data['display'] = (object) [];
        $this->data['display']->app = $request->ajax() ? 'app-xhr' : 'app';
        User::auth($request);
    }

    public function index(Request $request)
    {
        $users = User::index();
        $this->data['users'] = $users;
        return view('home', $this->data);
    }
}
