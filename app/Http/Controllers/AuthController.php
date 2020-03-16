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
        $this->data['layouts']->app = $request->ajax() ? 'auth.xhr' : 'auth.app';
        if (User::$token && in_array($request->route()[1]['as'], ['registerForm', 'auth.verificationForm', 'auth.verifyForm', 'auth.recoveryForm'])) {
            if($request->ajax())
            {
                response()->json([
                    'redirect' => route('home'),
                    'direct' => true
                ])->send();
                exit();
            }
            return redirect()->route('home')->send();
        }
    }
    public function authForm(Request $request)
    {
        return $this->view($request, 'auth.login');
    }

    public function authParse($auth, $request)
    {
        $theory = [];
        if ($auth->response('theory')) {
            $theory['form'] = $auth->response('theory');
        }
        if ($auth->response('callback')) {
            $theory['callback'] = $auth->response('callback');
        }
        if ($auth->response('key')) {
            $theory['key'] = $auth->response('key');
        }
        $response = [
            'redirect' => $auth->response('theory') || $auth->response('callback')
            ? $auth->response('theory') == 'auth' && !$auth->response('key') ? route('auth', ['callback' => $auth->response('callback')]) : route('auth.theory', $theory)
            : route('dashboard'),
            'direct' => $auth->response('theory') || $auth->response('callback') ? false : true
        ];
        $json = response()->json($response);
        if ($auth->response('token')) {
            $response['message'] = __('Welcome :*');
            $response['message_text'] = __('Welcome :*');
            $json->withCookie(new Cookie('token', $auth->response('token')));
        }
        return $json;
    }

    public function auth(Request $request)
    {
        return $this->authParse(User::auth($request->all()), $request);

    }

    public function authTheoryForm(Request $request, $key)
    {
        $form = $request->form != 'auth' || $request->user() ? '.'.$request->form : '';
        if($form == '.auth')
        {
            try {
                $auth = User::authTheory($key);
                $this->data['message'] = $auth->message_text;
            } catch (APIException $e) {
                $this->data['message'] = $e->message_text;
            }
        }
        return $this->view($request, 'auth.theory'.$form);
    }

    public function authTheory(Request $request, $key)
    {
        try {
            return $this->authParse(User::authTheory($key, $request->all()), $request);
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
            elseif ($e->statusCode() == 404)
            {
                return response()->json([
                    'is_ok' => false,
                    'message' => 'THEORY_NOT_FOUND',
                    'message_text' => __('THEORY_NOT_FOUND'),
                    'redirect' => route('auth')
                ]);
            }
            else
            {
                return $e->json();
            }
        }
    }

    public function verificationForm(Request $request)
    {
        return $this->view($request, 'auth.verification');
    }

    public function verification(Request $request)
    {
        return $this->authParse(User::verification($request->all()), $request);
    }

    public function recoveryForm(Request $request)
    {
        return $this->view($request, 'auth.recovery');
    }

    public function recovery(Request $request)
    {
        return $this->authParse(User::recovery($request->all()), $request);
    }

    public function logout(Request $request)
    {
        $logout = (new User)->execute('logout', [], 'post');
        return response()->json(array_merge_recursive($logout->response()->toArray(), [
            'redirect' => '/',
            'direct' => true
        ]))
            ->withCookie(new Cookie('token', null));
    }

    public function registerForm(Request $request)
    {
        return $this->view($request, 'auth.register');
    }

    public function register(Request $request)
    {
        return $this->authParse(User::register($request->all()), $request);
    }

    public function authAs(Request $request, $user)
    {
        return $this->authParse(User::authAs($user), $request);
    }
    public function authBack(Request $request)
    {
        return $this->authParse(User::authBack(), $request);
    }
}
