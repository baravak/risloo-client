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
Route::get('sessions/{session}/users/create', 'SessionController@createUser')->name('session.users.create');
Route::post('sessions/{session}/users', 'SessionController@storeUser')->name('session.users.store');
Route::put('sessions/{session}/users/{user}', 'SessionController@updateUser')->name('session.users.update');


Route::resource('documents', 'DocumentController');

Route::resource('sessions/{session}/report', 'SessionReportController', ['as' => 'sessions']);

Route::resource('/sessions/{session}/practices', 'PracticeController', ['as' => 'sessions']);
Route::post('/sessions/{session}/practices/{practice}', 'PracticeController@storeHomework')->name('sessions.practices.homework.store');
// Route::get('/sessions/{session}/practices/{practice}', 'PracticeController@createData')->name('sessions.practices.attachments.create');
Route::get('/bulk-samples', 'BulkSampleController@index')->name('bulk-samples.index');
Route::get('/bulk-samples/{bulkSample}', 'BulkSampleController@show')->name('bulk-samples.show');
Route::resource('/treasuries', 'TreasuryController');

Route::get('rooms/{room}/schedules', 'ScheduleController@room')->name('room.schedules.index');
Route::get('rooms/{room}/schedules/create', 'ScheduleController@create')->name('room.schedules.create');
Route::post('rooms/{room}/schedules', 'ScheduleController@store')->name('room.schedules.store');

Route::get('cases/{case}/schedules', 'ScheduleController@caseCreate')->name('case.schedules.create');

Route::get('schedules/{schedule}', 'ScheduleController@show')->name('schedules.show');
Route::post('schedules/{schedule}/booking', 'ScheduleController@booking')->name('schedules.booking');

Route::get('/payments', 'PaymentController@index')->name('payments.index');
Route::post('/payments', 'PaymentController@store')->name('payments.sotre');

Route::post('/billings/{billing}/final', 'BillingController@doFinal')->name('billings.final');
Route::resource('/billings', 'BillingController');

Route::get('client-reports/all/{serial}', 'ClientReportController@index')->name('client-reports.index');
Route::post('client-reports/{serial}', 'ClientReportController@store')->name('client-reports.store');
Route::get('client-reports/create/{serial}', 'ClientReportController@create')->name('client-reports.create');
Route::get('client-report/{report}', 'ClientReportController@show')->name('client-reports.show');
Route::get('client-report/{report}/edit', 'ClientReportController@edit')->name('client-reports.edit');
Route::match(['put', 'patch'],'client-report/{report}', 'ClientReportController@update')->name('client-reports.update');

Route::get('centers/{center}/settings/session-platforms', 'SessionPlatformController@center')->name('center.setting.session-platforms.center');
Route::get('centers/{center}/settings/session-platforms/create', 'SessionPlatformController@create')->name('center.setting.session-platforms.create');
Route::post('centers/{center}/settings/session-platforms', 'SessionPlatformController@store')->name('center.setting.session-platforms.store');
Route::put('centers/{center}/settings/session-platforms/{platform}', 'SessionPlatformController@update')->name('center.setting.session-platforms.update');

if(config('app.env') == 'local'){
    // Route::get('/billings', 'LocalController@billings');
    Route::get('/billings/items', 'LocalController@billingItems');
    Route::get('/transactions', 'LocalController@transactions');
    // Route::get('/treasuries', 'LocalController@treasuries');
    Route::get('/schedules', 'LocalController@schedules');
    Route::get('/schedules/show', 'LocalController@schedulesShow');
    Route::get('/transactions/create', 'LocalController@create');
}
