<?php
$router->get(null, [
    'as' => 'dashboard', 'uses' => 'HomeController@index'
]);
$router->get('/users', [
    'as' => 'users', 'uses' => 'UserController@index'
]);
