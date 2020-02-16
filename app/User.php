<?php
namespace App;

use Symfony\Component\HttpFoundation\Cookie;

class User extends API
{
    public static $me;
    public function callAuth($request)
    {
        if ($request->cookie('token')) {
            API::$token = $request->cookie('token');
            try {
                $me = $this->callMe();
            } catch (\Throwable $th) {
                return redirect()->route('login')->withCookies([new Cookie('token', null)])->send();
            }
            User::$me = $me;
        }
    }

    public function callMe()
    {
        return $this->execute("me");
    }
    public function callLogin($params = [])
    {
        $auth = $this->execute('login', $params, 'post');
        if(isset($auth->url))
        {
            $auth->url = $this->localUrl($auth->url);
        }
        return $auth;
    }

    public function callLoginKey($password, $key)
    {
        $auth = $this->execute("login/$key", ['password' => $password], 'post');
        return $auth;
    }

    public function callTest()
    {
        return $this->execute('ssdafsdf');
    }
}
