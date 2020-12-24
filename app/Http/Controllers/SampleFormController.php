<?php

namespace App\Http\Controllers;

use App\Sample;
use Illuminate\Http\Request;

class SampleFormController extends Controller
{
    public function form(Request $request, $serial)
    {
        $sample = $this->data->sample = Sample::apiShow($serial);
        $this->data->global->title = $sample->scale->title . '-' . $sample->edition;
        $js = '[';
        foreach ($this->data->sample->items as $key => $value) {
            $this->jsObjectGenerate(null, $value, $js);
            $js .= ',';
        }
        $js = preg_replace("#,$#", '', $js);
        $js .= '];';
        $this->data->items = $js;

        $js = 'null';
        if($this->data->sample->prerequisites)
        {
            $js = '[';
            foreach ($this->data->sample->prerequisites as $key => $value) {
                $this->jsObjectGenerate(null, $value, $js);
                $js .= ',';
            }
            $js = preg_replace("#,$#", '', $js);
            $js .= ']';
        }
        $this->data->prerequisites = $js;

        if($sample->status == 'closed')
        {
            return $this->view($request, 'samples.closed');
        }
        return $this->view($request, 'samples.form');
    }

    public function jsObjectGenerate($key, $value, &$js)
    {
        if(is_object($value))
        {
            $js .= $key ? "\"$key\":{" : '{';
                foreach ($value as $k => $v) {
                    $this->jsObjectGenerate($k, $v, $js);
                    $js .=',';
                }
            $js = preg_replace("#,$#", '', $js);
            $js .= "}";
        } elseif (is_array($value)) {
            $js .= $key ? "\"$key\":[" : '[';
            foreach ($value as $k => $v) {
                $this->jsObjectGenerate(false, $v, $js);
                $js .= ',';
            }
            $js = preg_replace("#,$#", '', $js);
            $js .= "]";
        }
        elseif(is_string($value)){
            $js .= $key ? "\"$key\" : \"$value\"" : "\"$value\"";
        }elseif(is_null($value)){
            $js .= $key ? "\"$key\" : null": "null";
        }elseif($value === false){
            $js .= $key ? "\"$key\" : false" : "false";

        } elseif ($value === true) {
            $js .= $key ? "\"$key\" : true" : "true";

        }elseif(is_integer($value) || is_float($value)){
            $js .= $key ? "\"$key\" : $value" : "$value";
        }
    }

    public function storeItems(Request $request, $serial)
    {
        $sync = Sample::postItems($serial, $request->all());
        return $sync->response()->json();
    }

    public function close(Request $request, $serial)
    {
        $close = Sample::close($serial);
        return $close->response()->json([
            'redirect' => route('dashboard.samples.index'),
            // 'redirect' => urldecode(route('samples.form', $serial)),
            'direct' => true
        ]);
    }
}
