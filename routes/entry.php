<?php
$router->get('/login', [
    'as' => 'loginForm', 'uses' => 'AuthController@loginForm'
]);

$router->post('/login', [
    'as' => 'login', 'uses' => 'AuthController@login'
]);

$router->get('/login/recovery', [
    'as' => 'login.recovery', 'uses' => 'AuthController@recovery'
]);

$router->get('/login/{key}', [
    'as' => 'loginKeyForm', 'uses' => 'AuthController@loginKeyForm'
]);

$router->post('/login/{key}', [
    'as' => 'loginKeyForm', 'uses' => 'AuthController@loginKey'
]);

$router->get('/register', [
    'as' => 'register', 'uses' => 'AuthController@register'
]);
