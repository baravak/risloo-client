<?php

use Illuminate\Support\Facades\Route;


Route::resource('samples', 'SampleController', ['except' => ['delete', 'show']]);
Route::resource('assessments', 'AssessmentController', ['except' => ['destroy', 'create', 'store', 'update']]);
Route::resource('relationships', 'RelationshipController', ['except' => ['destroy', 'show']]);
Route::resource('relationships/{relationship}/users', 'RelationshipUserController', ['except' => ['destroy', 'show'], 'as' => 'relationship']);
