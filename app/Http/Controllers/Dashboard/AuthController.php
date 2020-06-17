<?php

namespace App\Http\Controllers;

class AuthController extends _AuthController
{
    public function authTheorySample($request, $auth, $response)
    {
        $response['direct'] = true;
        $response['redirect'] = urldecode(route('samples.create', substr($auth->response('key'), 1)));
        return $response;
    }
}
