<?php

namespace App\Http\Controllers\Dashbaord;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as BaseController;
use App\API;
use App\User;

class Controller extends BaseController
{
    public $data = [];
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->data['display']->app = $request->ajax() ? 'layouts.app-xhr' : 'layouts.app';
        $this->data['display']->dashboard = $request->ajax() ? 'dashboard.xhr' : 'dashboard.app';
    }
}
