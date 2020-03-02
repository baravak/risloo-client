<?php
namespace App;

use Symfony\Component\HttpFoundation\Cookie;

class User extends API
{
    protected $guarded = [];
    public static $token;

    public static function me()
    {
        return (new static)->cache('me');
    }

    public static function login($params = [])
    {
        return (new static)->execute('login', $params, 'post');
    }

    public static function loginKey($password, $key)
    {
        return (new static)->execute("login/$key", ['password' => $password], 'post');
    }
}
