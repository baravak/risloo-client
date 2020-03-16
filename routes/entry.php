<?php
$router->get('/auth', [
    'as' => 'authForm', 'uses' => 'AuthController@authForm'
]);

$router->post('/auth', [
    'as' => 'auth', 'uses' => 'AuthController@auth'
]);

$router->get('/auth/recovery', [
    'as' => 'auth.recoveryForm', 'uses' => 'AuthController@recoveryForm'
]);

$router->post('/auth/recovery', [
    'as' => 'auth.recovery', 'uses' => 'AuthController@recovery'
]);

$router->get('/auth/verification', [
    'as' => 'auth.verificationForm', 'uses' => 'AuthController@verificationForm'
]);

$router->post('/auth/verification', [
    'as' => 'auth.verification', 'uses' => 'AuthController@verification'
]);

$router->get('/auth/theory/{key}', [
    'as' => 'auth.theoryForm', 'uses' => 'AuthController@authTheoryForm'
]);

$router->post('/auth/theory/{key}', [
    'as' => 'auth.theory', 'uses' => 'AuthController@authTheory'
]);

$router->get('/register', [
    'as' => 'registerForm', 'uses' => 'AuthController@registerForm'
]);
$router->post('/register', [
    'as' => 'register', 'uses' => 'AuthController@register'
]);
