<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('api/global-data', 'GlobalDataController@index');

Route::resource('api/accounts', 'AccountsController', ['except' => ['index', 'create', 'show', 'edit']]);
Route::resource('api/movements', 'MovementsController', ['except' => ['create', 'edit']]);
Route::resource('api/transfers', 'TransfersController', ['only' => 'store']);

Route::get('api/payments/current', 'PaymentsController@current');
