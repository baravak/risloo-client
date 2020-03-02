<?php

namespace App\Http\Controllers;

use App\Exceptions\APIException;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Cookie;
use App\User;

class AuthController extends Controller
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->data['display']->app = $request->ajax() ? 'auth.xhr' : 'auth.app';
        if (User::$token) {
            return redirect()->route('home')->send();
        }
    }
    public function loginForm(Request $request)
    {
        return view('auth.login', $this->data);
    }

    public function loginKeyForm(Request $request)
    {
        return view('auth.loginKey', $this->data);
    }

    public function login(Request $request)
    {
        $login = User::login($request->all());
        return response()->json($login->response())->withCookie(new Cookie('login_name', null))
            ->withCookie(new Cookie('login_username', null));

    }

    public function loginKey(Request $request, $key)
    {
        try {
            $login = User::loginKey($request->password, $key);
            $login->redirect = '/';
            return $login->response()->json(['redirect' => route('dashboard'), 'direct' => true])
            ->withCookie(new Cookie('token', $login->response('token')))
            ->withCookie(new Cookie('login_name', null))
            ->withCookie(new Cookie('login_username', null));
        } catch (APIException $e) {
            if($e->statusCode() == 403)
            {
                return response()->json([
                    'is_ok' => true,
                    'message' => $e->message,
                    'message_text' => $e->message_text,
                    'redirect' => route('login', ['username' => $request->cookie('login_username')])
                ])
                    ->withCookie(new Cookie('login_name', null))
                    ->withCookie(new Cookie('login_username', null));
            }
            else
            {
                return $e->json();
            }
        }
    }
}
