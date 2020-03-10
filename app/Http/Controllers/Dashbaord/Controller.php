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
        $title = '';
        switch ($this->data['module']->action) {
            case 'index':
                $title = __(ucfirst($this->data['module']->result));
                break;
            case 'create':
                $title = __('Create new '. $this->data['module']->result);
                break;
            case 'edit':
                $title = __('Edit ' . $this->data['module']->result);
                break;
            case 'show':
                $title = __('Show ' . $this->data['module']->result);
                break;
        }
        $this->data['global']->title = $title;
    }
}
