<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

use App\Models\ApiResponse;
use App\Models\ApiCollection;
use App\Models\ApiPaginator;

class API extends Model
{
    protected $response, $endpoint;
    protected static $_cache = [];

    public function __construct(array $attributes = [], ApiResponse $response = null)
    {
        parent::__construct($attributes);
        $this->response = $response;
    }

    public function response($key = null)
    {
        return $key ? $this->response->$key : $this->response;
    }

    public function isOK()
    {
        return $this->response('is_ok');
    }

    public function message($text = null)
    {
        return $text ? $this->response('messageText') : $this->response('message');
    }

    public static function path()
    {
        return trim(env('SERVER_URL', 'http://risloo.local/api/'), '/') . '/';
    }

    public function endpoint($endpoint = null, array $data = [], $method = 'GET')
    {
        if($this->endpoint)
        {
            return $this->endpoint;
        }
        $endpoint = $endpoint ? (substr($endpoint, 0, 2) == '%s' ? $this->getTable() . substr($endpoint, 2) : $endpoint) : $this->getTable();
        $method = strtoupper($method);
        $this->endpoint = $pure_url = static::path() . trim($endpoint, '\/');
        if ($method == 'GET' && !empty($data)) {
            $parse_url = parse_url($pure_url);

            $parse_url['query'] = isset($parse_url['query']) ? $parse_url['query'] . '&' . http_build_query($data) : http_build_query($data);
            $this->endpoint = $parse_url['scheme']
                . '://'
                . $parse_url['host']
                . (isset($parse_url['port']) ? ':' . $parse_url['port'] : '')
                . (isset($parse_url['path']) ? $parse_url['path'] : '/')
                . (isset($parse_url['query']) ? '?' . $parse_url['query'] : '');
        }
        return $this->endpoint;
    }

    public function execute($endpoint = null, array $data = [], $method = 'GET')
    {

        $endpoint = $this->endpoint(...func_get_args());

        $headers       = array(
            'Accept: application/json',
            'Content-Type: application/json',
            'charset: utf-8'
        );
        if(User::$token)
        {
            $headers[] = 'Authorization: Bearer ' . User::$token;
        }
        $curl = curl_init($endpoint);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, strtoupper($method));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        if($method != 'GET')
        {
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data ? json_encode($data) : null);
        }

        $response     = new ApiResponse($curl, curl_exec($curl));
        if (is_array($response->data))
        {
            $items = [];
            foreach ($response->data as $key => $value) {
                $items[] = new static((array) $value);
            }
            if($response->links)
            {
                $paginator = new ApiPaginator($response, $items, $response->meta->total, $response->meta->per_page, $response->meta->current_page);
                $parse_url = parse_url($response->meta->path);
                $path = app('request')->getSchemeAndHttpHost() . substr($parse_url['path'], 4);
                $paginator->withPath($path);
                return $paginator;
            }
            return new ApiCollection($response, $items);
        }
        else
        {
            return new static((array) $response->data, $response);
        }

        return $response;
    }

    public function cache(...$parameters)
    {
        $url = md5($this->endpoint(...$parameters));
        if(isset(static::$_cache[$url]))
        {
            return static::$_cache[$url];
        }
        static::$_cache[$url] = $this->execute(...$parameters);
        return static::$_cache[$url];
    }

    public function flush($opr, ...$parameters)
    {
        $url = md5($this->endpoint(...$parameters));
        if (isset(static::$_cache[$url])) {
            unset(static::$_cache[$url]);
        }
        return $this->cache(...$parameters);
    }

    public static function apiIndex(array $params = [])
    {
        return (new static)->cache(null, $params);
    }

    public static function apiShow($id, array $params = [])
    {
        return (new static)->cache('%s' .$id, $params);
    }

    public static function apiUpdate($id, array $params = [])
    {
        return (new static)->cache('%s' .$id, $params, 'put');
    }

    public static function apitStore($id, array $params = [])
    {
        return (new static)->cache(null, $params, 'post');
    }

    public static function apiDelete($id, array $params = [])
    {
        return (new static)->execute('%s' .$id, $params, 'delete');
    }

    public function __call($method, $parameters)
    {
        if(substr($method, 0, 5) == 'flush')
        {
            return $this->flush(lcfirst(substr($method, 5)), ...$parameters);
        }
        return parent::__call($method, $parameters);
    }
}
