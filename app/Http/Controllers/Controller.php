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

        $as = $request->route()[1]['as'];
        $paths = explode('.', $as);
        $this->data['module'] = new \stdClass;
        $this->data['layouts'] = new \stdClass;
        $this->data['global'] =  new \stdClass;

        $this->data['module']->resource = join('.', array_splice($paths, 0, -1));
        $this->data['module']->name = $as;
        $this->data['module']->action = last($paths);
        $this->data['module']->header = __($as);
        $this->data['module']->desc = __($as . '.desc');
        $this->data['module']->icons = [
            'index' => 'fas fa-list-alt',
            'create' => 'fas fa-plus-square',
            'edit' => 'fas fa-edit',
            'show' => 'fas fa-atom'
        ];

        $this->data['global']->title = $request->route()[1]['as'] ?? 'Title';
        $this->data['global']->description = '';



        $this->data['layouts']->mode = 'html';
        $this->data['layouts']->app = $request->ajax() ? 'layouts.app-xhr' : 'layouts.app';
        $this->data['layouts']->dashboard = $request->ajax() ? 'dashboard.xhr' : 'dashboard.app';
    }

    public function view($request, $name)
    {
        if ($request->ajax() && !strstr($request->header('accept'), 'application/json')) {
            $this->data['layouts']->mode = $request->header('data-xhr-base') ?: 'xhr';
        } elseif ($request->ajax() && strstr($request->header('accept'), 'application/json')) {
            $this->data['layouts']->mode = 'json';
        }

        $view = $as = $request->route()[1]['as'];
        $views = method_exists($this, 'views') ? $this->views() : (isset($this->views) ? $this->views : [
            $this->data['module']->resource . '.index' => $this->data['module']->resource . '.index',
            $this->data['module']->resource . '.show' => $this->data['module']->resource . '.show',
            $this->data['module']->resource . '.create' => $this->data['module']->resource . '.create',
            $this->data['module']->resource . '.edit' => $this->data['module']->resource . '.create'
        ]);

        if (isset($views[$as])) {
            $view = $views[$as];
        }

        if($this->data['layouts']->mode != 'html' && view()->exists($views[$as] . '-' . $this->data['layouts']->mode))
        {
            $view = $views[$as] . '-' . $this->data['layouts']->mode;
        }

        $response = response(view($view, $this->data));
        if($this->data['layouts']->mode == 'xhr') {
            $content = $response->getContent();
            $data = json_encode($this->data['global']);
            $content = "$data\n$content";
            $response->setContent($content);
        }
        return $response;
    }
}
