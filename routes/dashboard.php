<?php

use Illuminate\Support\Facades\Route;

Route::post('users/{user}/public-key', 'UserController@publicKey')->name('users.publicKey');

Route::resource('samples', 'SampleController', ['except' => ['delete', 'edit']]);
Route::resource('assessments', 'AssessmentController', ['except' => ['destroy', 'create', 'store', 'update', 'show']]);
// Route::resource('relationships', 'RelationshipController', ['except' => ['destroy', 'show']]);
// Route::resource('relationships/{relationship}/users', 'RelationshipUserController', ['except' => ['destroy', 'show', 'edit'], 'as' => 'relationship']);
// Route::put('relationship-users/{relationshipUser}', 'RelationshipUserController@update')->name('relationship.users.update');

Route::resource('centers', 'CenterController', ['except' => ['destroy']]);
Route::post('centers/{center}/avatar', 'CenterController@avatarStore')->name('centers.avatar.store');
Route::post('centers/{center}/request', 'CenterController@request')->name('centers.request');

Route::get('centers/{center}/users', 'CenterUserController@index')->name('center.users.index');
Route::put('centers/{center}/users/{user}', 'CenterUserController@update')->name('center.users.update');
Route::post('centers/{center}/users', 'CenterUserController@store')->name('center.users.store');
Route::get('centers/{center}/users/create', 'CenterUserController@create')->name('center.users.create');
Route::get('centers/{center}/users/{user}', 'CenterUserController@show')->name('center.users.show');
Route::get('centers/{center}/users/{user}/edit', 'CenterUserController@edit')->name('center.users.edit');
Route::get('centers/{center}/schedules', 'ScheduleController@center')->name('center.schedules.index');

Route::resource('rooms', 'RoomController', ['except' => ['store', 'create']]);
Route::get('centers/{center}/rooms/create', 'RoomController@create')->name('center.rooms.create');
Route::post('centers/{center}/rooms', 'RoomController@store')->name('center.rooms.store');

Route::resource('rooms/{room}/users', 'RoomUserController', ['except' => ['destroy', 'show', 'edit'], 'as' => 'room']);


Route::resource('cases', 'CaseController', ['except' => 'create', 'store']);
Route::get('rooms/{room}/cases/create', 'CaseController@create')->name('room.cases.create');
Route::post('rooms/{room}/cases', 'CaseController@store')->name('room.cases.store');

Route::resource('cases/{case}/users', 'CaseUserController', ['except' => ['destroy', 'show', 'edit'], 'as' => 'case']);
Route::post('users/request', 'UserController@request')->name('users.request');
Route::post('users/accept', 'UserController@accept')->name('users.accept');

Route::post( 'samples/{sample}/scoring', 'SampleController@scoring')->middleware('auth')->name('samples.scoring');
Route::get('samples/{sample}/scoring', 'SampleController@scoreResult')->middleware('auth')->name('samples.scoring.show');
Route::put('samples/{sample}/close', 'SampleController@close')->middleware('auth')->name('samples.close');
Route::put('samples/{sample}/open', 'SampleController@open')->middleware('auth')->name('samples.open');
Route::get('live/samples-status-check', 'SampleController@statuCheck')->middleware('auth');

Route::resource('sessions', 'SessionController', ['except' => ['create']]);


Route::resource('documents', 'DocumentController');

Route::resource('sessions/{session}/report', 'SessionReportController', ['as' => 'sessions']);

Route::resource('/sessions/{session}/practices', 'PracticeController', ['as' => 'sessions']);
Route::post('/sessions/{session}/practices/{practice}', 'PracticeController@storeHomework')->name('sessions.practices.homework.store');
// Route::get('/sessions/{session}/practices/{practice}', 'PracticeController@createData')->name('sessions.practices.attachments.create');
Route::get('/bulk-samples', 'BulkSampleController@index')->name('bulk-samples.index');
Route::get('/bulk-samples/{bulkSample}', 'BulkSampleController@show')->name('bulk-samples.show');
Route::get('/treasuries', 'LocalController@index')->name('treasuries.index');

Route::get('rooms/{room}/schedules', 'ScheduleController@create')->name('room.schedules.create');
Route::post('rooms/{room}/schedules', 'ScheduleController@store')->name('room.schedules.store');

Route::get('cases/{case}/schedules', 'ScheduleController@caseCreate')->name('case.schedules.create');

if(config('app.env') == 'local'){
    Route::get('/payments', 'LocalController@index');
    Route::get('/billings', 'LocalController@billings');
    Route::get('/billings/items', 'LocalController@billingItems');
    Route::get('/transactions', 'LocalController@transactions');
    Route::get('/treasuries', 'LocalController@treasuries');
    Route::get('/schedules', 'LocalController@schedules');
    Route::get('/schedules/show', 'LocalController@schedulesShow');
}
