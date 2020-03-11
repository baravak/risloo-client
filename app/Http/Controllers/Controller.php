<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $this->data['module']->resource = join('.', array_slice($paths, 0, -1));
        $this->data['module']->name = isset($paths[1]) ? $paths[1] : $as;
        $this->data['module']->route = $as;
        $this->data['module']->action = last($paths);
        $this->data['module']->result = isset($paths[1]) ? (last($paths) == 'index' ? $paths[1] : Str::singular($paths[1])) : $as;
        $this->data['module']->header = __($as);
        $this->data['module']->desc = __($as . '.desc');

        $this->data['global']->title = $request->route()[1]['as'] ?? 'Title';
        $this->data['global']->description = '';



        $this->data['layouts']->mode = 'html';
        $this->data['layouts']->app = $request->ajax() ? 'layouts.app-xhr' : 'layouts.app';
        $this->data['layouts']->dashboard = $request->ajax() ? 'dashboard.xhr' : 'dashboard.app';
    }

    public function view($request, $name = null)
    {
        if ($request->ajax() && strstr($request->header('accept'), 'application/json')) {
            return isset($this->data[$this->data['module']->result]) ? $this->data[$this->data['module']->result] : $this->data;
        }
        if(!$name)
        {
            if ($request->ajax() && !strstr($request->header('accept'), 'application/json')) {
                $this->data['layouts']->mode = $request->header('data-xhr-base') ?: 'xhr';
            }

            $view = $as = $request->route()[1]['as'];
            $default = [
                $this->data['module']->resource . '.index' => $this->data['module']->resource . '.index',
                $this->data['module']->resource . '.show' => $this->data['module']->resource . '.show',
                $this->data['module']->resource . '.create' => $this->data['module']->resource . '.create',
                $this->data['module']->resource . '.edit' => $this->data['module']->resource . '.create'
            ];
            $views = method_exists($this, 'views') ? $this->views() : (isset($this->views) ? array_merge($default, $this->views) : $default);

            if (isset($views[$as])) {
                $view = $views[$as];
            }

            if($this->data['layouts']->mode != 'html' && view()->exists($views[$as] . '-' . $this->data['layouts']->mode))
            {
                $view = $views[$as] . '-' . $this->data['layouts']->mode;
            }
        }
        $response = response(view($name ?: $view, $this->data));
        if($this->data['layouts']->mode == 'xhr') {
            $content = $response->getContent();
            $data = json_encode($this->data['global']);
            $content = "$data\n$content";
            $response->setContent($content);
        }
        return $response;
    }
}
