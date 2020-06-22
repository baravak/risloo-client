<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/$/{sample}', 'SampleFormController@form')->middleware('auth')->name('samples.create');
Route::post('/$/{sample}/items', 'SampleFormController@storeItems')->middleware('auth')->name('samples.storeItems');
