<?php

namespace App\Http\Controllers\Dashbaord;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as BaseController;
use App\API;
use App\User;
use Illuminate\Support\Str;

class Controller extends BaseController
{
    public $data = [];
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->data['layouts']->app = $request->ajax() ? 'layouts.app-xhr' : 'layouts.app';
        $this->data['layouts']->dashboard = $request->ajax() ? 'dashboard.xhr' : 'dashboard.app';
        $namespace = null;
        $name = null;
        $action = null;
        $this->data['titles'] = (object) [];
        if(isset($request->route()[1]['as']))
        {
            $module = explode('.', $request->route()[1]['as']);
            $namespace = $module[0];
            $name = isset($module[1]) ? $module[1] : null;
            $action = isset($module[2]) ? $module[2] : null;
        }

        $this->data['module']->name = $name;
        $this->data['module']->action = $action;
        $this->data['module']->moduleAction = Str::singular($name) . '.' . $action;

        $title = '';
        switch ($action) {
            case 'index':
                $title = __(ucfirst($name));
                break;
            case 'create':
                $title = __('Create new '. $name);
                break;
            case 'edit':
                $title = __('Edit ' . $name);
                break;
            case 'show':
                $title = __('Show ' . $name);
                break;
        }
        $this->data['global']->title = $title;
    }
}
