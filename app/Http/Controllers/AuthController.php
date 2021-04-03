<?php

namespace App\Http\Controllers;

use App\BulkSample;
use Illuminate\Http\Request;

class AuthController extends _AuthController
{

    public function authTheoryPayment($request, $auth, $response){
        if($auth->response('status') == 'fail'){
            return $this->view($request, 'auth.theory.paymentFail');
        }
        if($auth->response('status') == 'success'){
            return $this->view($request, 'auth.theory.payment');
            return $response;
        }
        $response['direct'] = true;
        $response['redirect'] = $auth->response('redirect');
        return $response;
    }
    public function authTheorySample($request, $auth, $response)
    {
        $response['direct'] = true;
        $response['redirect'] = urldecode(route('samples.form', substr($auth->response('key'), 1)));
        return $response;
    }
    public function authTheoryResultSample($request, $auth)
    {
        return redirect(urldecode(route('samples.form', substr($auth->response('key'), 1))));
    }
    public function authTheoryJoinUser($request, $auth, $response)
    {
        return $this->authTheory($request, $auth->response('key'));
    }

    public function authTheoryResultSampleLogin(Request $request, $auth){
        $bulk = new BulkSample((array) $auth->response('bulk_sample'));
        $this->data->bulk = $bulk;
    }

    public function authTheoryRoom($request, $auth, $response){
        parse_str(parse_url(request()->headers->get('referer'), PHP_URL_QUERY), $query);
        $response = [];
        $response['direct'] = true;
        if($query['create_case'] == 1){
            $response['redirect'] = route('dashboard.room.cases.create',['room' => $auth->response('key'), 'client' => $auth->response('data')->id]);
        }else{
            $response['redirect'] = route('dashboard.room.users.index',$auth->response('key'));
        }
        return $response;
    }
    public function authTheoryCenter($request, $auth, $response){
        $response = [];
        $response['direct'] = true;
        $response['redirect'] = route('dashboard.center.users.index',$auth->response('key'));
        return $response;
    }
}
