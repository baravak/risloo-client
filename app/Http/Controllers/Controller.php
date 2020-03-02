<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\API;
use App\User;

class Controller extends BaseController
{
    public $data = [];
    public function __construct(Request $request)
    {
        $this->data['title'] = $request->route()[1]['as'] ?? 'Title';
        $this->data['description'] = $request->route()[1]['as'] ?? 'Description';
        $this->data['display'] = (object) [];
        $this->data['display']->app = $request->ajax() ? 'layouts.app-xhr' : 'layouts.app';
    }
}
