<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Symfony\Component\HttpFoundation\Cookie;

class AuthController extends Controller
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
        if (User::$me) {
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
        return response()->json($login)->withCookie(new Cookie('login_name', null))
            ->withCookie(new Cookie('login_username', null));

    }

    public function loginKey(Request $request, $key)
    {
        $login = User::loginKey($request->password, $key);
        $login->redirect = '/';
        return response()->json($login)
        ->withCookie(new Cookie('token', $login->token))
        ->withCookie(new Cookie('login_name', null))
        ->withCookie(new Cookie('login_username', null));
    }
}
