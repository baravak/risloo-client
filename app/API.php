<?php
namespace App;

use App\Models\ApiResponse;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use App\Exceptions\APIException;

class API extends Models\ApiResponse
{
    public static $token;
    protected $path, $data;
    public function path()
    {
        return env('SERVER_URL', 'http://risloo.local/api/');
    }

    public function execute($endpoint, $data = [], $method = 'GET')
    {
        $method = strtoupper($method);
        $url = $pure_url = $this->path() . trim($endpoint, '\/');
        if ($method == 'GET' && !empty($data))
        {
            $parse_url = parse_url($pure_url);

            $parse_url['query'] = isset($parse_url['query']) ? $parse_url['query'] . '&' . http_build_query($data) : http_build_query($data);
            $url = $parse_url['scheme']
            . '://'
            . $parse_url['host']
            . (isset($parse_url['port']) ? ':'. $parse_url['port'] : '')
            . (isset($parse_url['path']) ? $parse_url['path'] : '/')
            . (isset($parse_url['query']) ? '?' . $parse_url['query'] : '');
        }
        $headers       = array(
            'Accept: application/json',
            'Content-Type: application/json',
            'charset: utf-8'
        );
        if(isset(static::$token))
        {
            $headers[] = 'Authorization: Bearer ' . static::$token;
        }
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        if($method != 'GET')
        {
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data ? json_encode($data) : null);
        }

        $response     = curl_exec($curl);
        $code         = $this->code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $content_type = $this->content_type = curl_getinfo($curl, CURLINFO_CONTENT_TYPE);
        $curl_errno   = $this->errno = curl_errno($curl);
        $curl_error   = $this->error = curl_error($curl);
        if ($curl_errno) {
            throw new \Exception($curl_error);
        }
        $json_response = json_decode($response);
        if ($code != 200 && is_null($json_response)) {
            throw new \Exception("Request have errors");
        } else {
            $this->response = $json_response;
            $this->curl = $json_response;
            if ($code != 200) {
                throw new APIException($this);
            }
            $this->data();
            return $this->response;
        }
    }

    public function callIndex($params = [])
    {
        $path = $this->path ?? Str::snake(Str::pluralStudly(class_basename($this)));
        $this->execute($path, $params, 'GET');
        return $this->data;
    }

    public function callShow($id, $params = [])
    {
        $path = $this->path ?? Str::snake(Str::pluralStudly(class_basename($this))) . '/' . $id;
        $this->execute($path, $params, 'GET');
        return $this->data;
    }

    public static function __callStatic($name, $arguments)
    {
        $name = "call" . ucfirst($name);
        $class = new static;
        return $class->$name(...$arguments);
    }

    public function localUrl($url)
    {
         return str_replace($this->path(), app('request')->getSchemeAndHttpHost() . '/', $url);
    }
}
