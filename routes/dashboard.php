<?php

use Illuminate\Support\Facades\Route;


Route::resource('samples', 'SampleController', ['except' => ['delete', 'edit', 'update']]);
Route::resource('assessments', 'AssessmentController', ['except' => ['destroy', 'create', 'store', 'update']]);
Route::resource('relationships', 'RelationshipController', ['except' => ['destroy', 'show']]);
Route::resource('relationships/{relationship}/users', 'RelationshipUserController', ['except' => ['destroy', 'show', 'edit'], 'as' => 'relationship']);
Route::put('relationship-users/{relationshipUser}', 'RelationshipUserController@update')->name('relationship.users.update');

Route::resource('centers', 'CenterController', ['except' => ['destroy', 'update', 'edit', 'store', 'create']]);
Route::post('centers/request', 'CenterController@request')->name('centers.request');
Route::post('centers/accept', 'CenterController@accept')->name('centers.accept');

Route::resource('rooms', 'RoomController');
Route::resource('rooms/{room}/users', 'RoomUserController', ['except' => ['destroy', 'show', 'edit'], 'as' => 'room']);


Route::resource('cases', 'CaseController');

Route::post('users/request', 'UserController@request')->name('users.request');
Route::post('users/accept', 'UserController@accept')->name('users.accept');

Route::post( 'samples/{sample}/scoring', 'SampleController@scoring')->middleware('auth')->name('samples.scoring');


Route::get('reserves/calendar', 'ReserveController@calendar')->name('reserves.calendar');
Route::resource('reserves', 'ReserveController');
