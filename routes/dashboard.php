<?php

use Illuminate\Support\Facades\Route;


Route::resource('samples', 'SampleController', ['except' => ['delete', 'show']]);
Route::resource('assessments', 'AssessmentController', ['except' => ['destroy', 'create', 'store', 'update']]);
Route::resource('relationships', 'RelationshipController', ['except' => ['destroy', 'show']]);
Route::resource('relationships/{relationship}/users', 'RelationshipUserController', ['except' => ['destroy', 'show', 'edit'], 'as' => 'relationship']);
Route::put('relationship-users/{relationshipUser}', 'RelationshipUserController@update')->name('relationship.users.update');

Route::resource('clinics', 'ClinicController', ['except' => ['destroy', 'update', 'edit', 'store', 'create']]);
Route::post('clinics/request', 'ClinicController@request')->name('clinics.request');
