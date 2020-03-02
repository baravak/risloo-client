<?php
$router->get(null, [
    'as' => 'dashboard', 'uses' => 'HomeController@index'
]);
