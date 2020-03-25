<?php

use Illuminate\Support\Facades\Route;


Route::resource('samples', 'SampleController', ['except' => ['delete', 'show']]);
Route::resource('assessments', 'AssessmentController', ['except' => ['delete', 'create', 'delete', 'store', 'update']]);
