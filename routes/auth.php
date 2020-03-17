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
    $router->post('/users/{id}/avatar', [
        'as' => 'store.avatar', 'uses' => 'UserController@avatar'
    ]);

    $router->get('users/{id}', [
        'as' => 'show', 'uses' => 'UserController@show'
    ]);
    $router->get("me", [
        'as' => 'me', 'uses' => 'UserController@me'
    ]);
    $router->get("users/{id}/edit", [
        'as' => 'edit', 'uses' => 'UserController@edit'
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
        'as' => 'show', 'uses' => 'DocumentController@show'
    ]);
    $router->get("documents/{id}/edit", [
        'as' => 'edit', 'uses' => 'DocumentController@edit'
    ]);
    $router->put('documents/{id}', [
        'as' => 'update', 'uses' => 'DocumentController@update'
    ]);
});

$router->group([
    'as' => 'terms'
], function () use ($router) {
    $router->get('/terms', [
        'as' => 'index', 'uses' => 'TermController@index'
    ]);
    $router->get('/terms/create', [
        'as' => 'create', 'uses' => 'TermController@create'
    ]);
    $router->post('/terms', [
        'as' => 'store', 'uses' => 'TermController@store'
    ]);
    $router->get('terms/{id}', [
        'as' => 'show', 'uses' => 'TermController@show'
    ]);
    $router->get("terms/{id}/edit", [
        'as' => 'edit', 'uses' => 'TermController@edit'
    ]);
    $router->put('terms/{id}', [
        'as' => 'update', 'uses' => 'TermController@update'
    ]);
});

$router->group([
    'as' => 'samples',
    'prefix' => '$/samples/'
], function () use ($router) {
    $router->get('/', [
        'as' => 'index', 'uses' => 'SampleController@index'
    ]);
    $router->get('/create', [
        'as' => 'create', 'uses' => 'SampleController@create'
    ]);
    $router->post('/', [
        'as' => 'store', 'uses' => 'SampleController@store'
    ]);
});

$router->group([
    'as' => 'assessments',
    'prefix' => '$'
], function () use ($router) {
    $router->get('/', [
        'as' => 'index', 'uses' => 'AssessmentController@index'
    ]);
    $router->get('/{id}', [
        'as' => 'show', 'uses' => 'AssessmentController@show'
    ]);
});

