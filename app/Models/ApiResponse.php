<?php
namespace App\Models;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
class ApiResponse
{
    public function isOk()
    {
        return $this->response->is_ok;
    }

    public function statusCode()
    {
       return $this->code;
    }

    public function message()
    {
        return isset($this->response->message) ? $this->response->message : null;
    }

    public function messageText()
    {
        return isset($this->response->message_text) ? $this->response->message_text : null;
    }

    public function data()
    {
        $data = isset($this->response->data) ? $this->response->data : null;
        if(is_array($data) && isset($this->response->links))
        {
            $collection = new Collection($data);
            $paginator = new LengthAwarePaginator($collection, $this->response->meta->total, $this->response->meta->per_page, $this->response->meta->current_page);
            $parse_url = parse_url($this->response->meta->path);
            $path = app('request')->getSchemeAndHttpHost() . substr($parse_url['path'], 4);
            $paginator->withPath($path);
            $data = $paginator;
        }
        elseif(is_object($data))
        {
            $data = $data;
        }
        $this->data = $data;
    }

    public function __get($name)
    {
        return isset($this->data->$name) ? $this->data->$name : null;
    }
}
