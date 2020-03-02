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
$router->group([
    'prefix' => 'dashboard',
    'namespace' => 'Dashbaord',
    'middleware' => ['auth:force'],
], function() use ($router){
    include('auth.php');
});
