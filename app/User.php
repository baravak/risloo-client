<?php
namespace App;

class User extends API
{
    public static $me;
    public function callAuth($request)
    {
        if ($request->cookie('token')) {
            API::$token = $request->cookie('token');
            $me = $this->callMe();
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
