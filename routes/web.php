<?php
$router->group([
    'middleware' => ['auth'],
], function() use ($router){
    include('entry.php');
    $router->get('/',[
        'as' => 'home', 'uses' => 'HomeController@index'
    ]);
});

$router->post('/logout', [
    'middleware' => ['auth:force'],
    'as' => 'logout', 'uses' => 'AuthController@logout'
]);
$router->get('login/user/{id}', [
    'middleware' => ['auth:force'],
    'as' => 'login.as', 'uses' => 'AuthController@loginAs'
]);
$router->post('logout/login', [
    'middleware' => ['auth:force'],
    'as' => 'login.to', 'uses' => 'AuthController@loginTo'
]);

$router->group([
    'prefix' => 'dashboard',
    'namespace' => 'Dashbaord',
    'as' => 'dashboard',
    'middleware' => ['auth:force'],
], function() use ($router){
    include('auth.php');
});

$router->get('info', function(){
    phpinfo();
});
