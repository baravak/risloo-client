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
$router->get('auth/as/{id}', [
    'middleware' => ['auth:force'],
    'as' => 'auth.as', 'uses' => 'AuthController@authAs'
]);
$router->post('auth/admin/back', [
    'middleware' => ['auth:force'],
    'as' => 'auth.back', 'uses' => 'AuthController@authBack'
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
