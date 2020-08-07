<?php

namespace App\Http\Controllers;

class AuthController extends _AuthController
{
    public function authTheorySample($request, $auth, $response)
    {
        $response['direct'] = true;
        $response['redirect'] = urldecode(route('samples.form', substr($auth->response('key'), 1)));
        return $response;
    }
    public function authTheoryJoinUser($request, $auth, $response)
    {
        return $this->authTheory($request, $auth->response('key'));
    }
}
