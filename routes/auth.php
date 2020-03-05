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
$router->post('/users', [
    'as' => 'users.store', 'uses' => 'UserController@store'
]);

$router->get('users/{id}', [
    'as' => 'users.show', 'uses' => 'UserController@update'
]);
$router->get("users/{id}/edit", [
    'as' => 'users.edit', 'uses' => 'UserController@edit'
]);
$router->put('users/{id}', [
    'as' => 'users.update', 'uses' => 'UserController@update'
]);
$router->put('users/{id}', [
    'as' => 'users.update', 'uses' => 'UserController@update'
]);
