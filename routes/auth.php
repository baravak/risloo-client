<?php
$router->get(null, [
    'uses' => 'HomeController@index'
]);
$router->get('/users', [
    'as' => 'users.index', 'uses' => 'UserController@index'
]);

$router->get('/users/create', [
    'as' => 'users.create', 'uses' => 'UserController@create'
]);

