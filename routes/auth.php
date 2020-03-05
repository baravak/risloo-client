<?php
$router->get(null, [
    'uses' => 'HomeController@index'
]);

$router->group([
    'as' => 'users'
], function() use($router){
    $router->get('/users', [
        'as' => 'index', 'uses' => 'UserController@index'
    ]);

    $router->get('/users/create', [
        'as' => 'create', 'uses' => 'UserController@create'
    ]);
    $router->post('/users', [
        'as' => 'store', 'uses' => 'UserController@store'
    ]);
    $router->get('users/{id}', [
        'as' => 'show', 'uses' => 'UserController@update'
    ]);
    $router->get("users/{id}/edit", [
        'as' => 'edit', 'uses' => 'UserController@edit'
    ]);
    $router->put('users/{id}', [
        'as' => 'update', 'uses' => 'UserController@update'
    ]);
    $router->put('users/{id}', [
        'as' => 'update', 'uses' => 'UserController@update'
    ]);
});

$router->group([
    'as' => 'documents'
], function () use ($router) {
    $router->get('/documents', [
        'as' => 'index', 'uses' => 'DocumentController@index'
    ]);

    $router->get('/documents/create', [
        'as' => 'create', 'uses' => 'DocumentController@create'
    ]);
    $router->post('/documents', [
        'as' => 'store', 'uses' => 'DocumentController@store'
    ]);
    $router->get('documents/{id}', [
        'as' => 'show', 'uses' => 'DocumentController@update'
    ]);
    $router->get("documents/{id}/edit", [
        'as' => 'edit', 'uses' => 'DocumentController@edit'
    ]);
    $router->put('documents/{id}', [
        'as' => 'update', 'uses' => 'DocumentController@update'
    ]);
    $router->put('documents/{id}', [
        'as' => 'update', 'uses' => 'DocumentController@update'
    ]);
});
